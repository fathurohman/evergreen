
@extends('layouts.template')

@section('content')



<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Post Lowongan</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="card-body">
                {{-- @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                       </button>
                        {{Session::get('success')}}
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-error" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                       </button>
                        {{Session::get('error')}}
                    </div>
                @endif --}}

                <p align="right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_besar">
                       Tambah Presensi </button>
                     </p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Bulan/Tahun</th>
                      <th>Masuk</th>
                      <th>Tidak Masuk</th>
                      <th>PJ</th>
                      <th>Status Berkas</th>
                      <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data_presensi as $index=>$item)
                    <tr align="center">
                      <td>{{$index+1 }}</td>
                      <td>{{$item->bulan }} {{$item->tahun }} </td>
                      <td>{{$item->masuk }}</td>
                      <td>{{$item->tidak_masuk }}</td>
                      <td>{{$item->name }}</td>
                      <td>
                          @if ($item->status == 'staff')
                          <span class="badge badge-info">STAFF</span>
                          @endif
                          @if ($item->status == 'atasan')
                          <span class="badge badge-success">ATASAN</span>
                          @endif
                          <br>

                          @if ($item->status_berkas == NULL)
                          <span class="badge badge-secondary">Belum Dikirim</span>
                          @endif
                          @if ($item->status_berkas == 'proses')
                          <span class="badge badge-primary">PROSES</span>
                          @endif
                      </td>
                      <td>
                        @php
                            $jumlah_subpresensi  = DB::table('sub_presensi')
                                            ->where('presensi_id', $item->id)
                                            ->Count();
                        @endphp

                          <a onclick="return confirm('Yakin Kirim presensi ?');" class="btn btn-info" href="/send_presensi/{{ $item->id }}"><i class="fa fa-paper-plane"></i></a>
                          <a class="btn btn-primary" href="/sub_presensi/{{ $item->id }}"><i class="fa fa-share"></i> @if($jumlah_subpresensi) <b>{{$jumlah_subpresensi}}</b> @else  @endif</a>
                          <a class="btn btn-primary" href="/edit_presensi/{{ $item->id }}"><i class="fa fa-edit"></i></a>
                          <a onclick="return confirm('Hapus data ?');" class="btn btn-danger" href="/delete_presensi/{{ $item->id }}"><i class="fa fa-trash"></i></a>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <!-- MODAL TAMBAH --->
    <div class="modal fade" id="modal_besar">
        <div class="modal-dialog modal-lg">
                 <div class="modal-content">

                 <!-- Ini adalah Bagian Header Modal -->
                   <div class="modal-header">
                 <h4 class="modal-title">Tambah Post</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>

                 <!-- Ini adalah Bagian Body Modal -->
         <div class="modal-body">
              <div class="card-body">
       <!-- Credit Card -->
       <div id="">
           <div class="card-body">
               <form action="{{ route('presensi.store')}}"
                   enctype="multipart/form-data" method="post">
                   @csrf
                    <input name="id" type="hidden" class="form-control" aria-required="true" aria-invalid="false">
                    <input name="user_id" type="hidden" value="{{ Auth::user()->id }}" class="form-control" aria-required="true" aria-invalid="false">
                    <input name="nama" type="hidden" value="{{ Auth::user()->name }}"  class="form-control">

                    <div class="form-group">
                        <label class="control-label mb-1">Perusahaan</label>
                        <input name="perusahaan" type="text" value="-" class="form-control" required>
                        <h6>*kosongkan jika tidak ada</h6>
                    </div>

                    <div class="form-group">
                        <label class="control-label mb-1">Lokasi tugas</label>
                           <select name='lokasi_tugas' class="form-control">
                                   <option value="MPP" selected>MPP</option>
                                   <option value="Kantor DPMPTSP">Kantor DPMPTSP</option>
                           </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-1">Bulan</label>
                           <select name='bulan' class="form-control">
                                   <option value="Januari" selected>Januari</option>
                                   <option value="Februari">Februari</option>
                                   <option value="Maret">Maret</option>
                                   <option value="April">April</option>
                                   <option value="Mei">Mei</option>
                                   <option value="Juni">Juni</option>
                                   <option value="Juli">Juli</option>
                                   <option value="Agustus">Agustus</option>
                                   <option value="September">September</option>
                                   <option value="Oktober">Oktober</option>
                                   <option value="November">November</option>
                                   <option value="Desember">Desember</option>
                           </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label mb-1">Tahun</label>
                           <select name='tahun' class="form-control">
                                   <option value="2021" selected>2021</option>
                                   <option value="2022">2022</option>
                                   <option value="2023">2023</option>

                           </select>
                    </div>
                    {{-- <div class="form-group">
                        <label class="control-label mb-1">Masuk</label>
                        <input name="masuk" type="text" value="-" class="form-control" required>
                        <h6>*kosongkan jika tidak ada</h6>
                    </div>

                    <div class="form-group">
                        <label class="control-label mb-1">Tidak Masuk</label>
                        <input name="tidak_masuk" type="text" value="-" class="form-control"required>
                        <h6>*kosongkan jika tidak ada</h6>
                    </div> --}}

                    <div class="form-group">
                        <label class="control-label mb-1">Penanggung Jawab</label>
                           <select name='validator_id' class="form-control" required>
                                    <option value="" selected>- Pilih -</option>
                                    @foreach ($dd_validator as $rows)
                                    <option value="{{ $rows->id}}">{{ $rows->name}}</option>
                                    @endforeach
                           </select>
                    </div>
                   <div>
                       <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                           <i class="fa fa-plus"></i>&nbsp;
                           <span id="payment-button-amount">Tambah</span>
                       </button>
                   </div>
               </form>
           </div>
       </div>

   </div>
        </div>
       </div>
    </div>
 </div>
  </section>
  @endsection

