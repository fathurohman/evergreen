
@extends('layouts.template')

@section('content')



<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Position</h1>
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
                <table id="example4" class="table table-bordered"><!-- diedit -->
                    <thead>
                    <tr align="center">
                        <th>Judul</th>
                        <th>Department</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data_post as $index=>$item)
                    <tr align="center">
                        <td>{{$item->judul }}</td>
                        <td>{{$item->nama_bagian }}</td>
                    </tr>
                    <tr align="center">
                        <th>Position</th>
                        <th>Kualifikasi</th>
                    </tr>
                    <tr align="left">

                        <td><p style="white-space: pre-line">@foreach ($data_position as $index=>$data){{$index+1 }}. {{$data->nama_posisi}} <br> @endforeach</p></td>


                        <td><p style="white-space: pre-line">{{$item->kualifikasi}}</p></td>
                    </tr>
                    <tr>
                        <td colspan="2"> <b>Batas Waktu :</b> <?php
                            $tanggal = $item->tanggal_akhir;
                                $daftar_hari = array(
                                                'Sunday' => 'Minggu',
                                                'Monday' => 'Senin',
                                                'Tuesday' => 'Selasa',
                                                'Wednesday' => 'Rabu',
                                                'Thursday' => 'Kamis',
                                                'Friday' => 'Jumat',
                                                'Saturday' => 'Sabtu'
                                                );

                                            $namahari = date('l', strtotime($tanggal));

                                    echo $daftar_hari[$namahari];
                                    echo date(', d-M-Y', strtotime($tanggal));
                                    ?></td>

                    </tr>
                    @endforeach
                    </tbody>
                  </table>

                <p align="right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_besar">
                        <i class="fa fa-plus"></i> Add </button>
                     </p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Position Name</th>
                      <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data_position as $index=>$item)
                    <tr align="center">
                      <td>{{$index+1 }}</td>
                      <td>{{$item->nama_posisi }}</td>
                      <td>
                          <a class="btn btn-primary" href="/edit_position/{{ $item->id }}"><i class="fa fa-edit"></i></a>
                          <a onclick="return confirm('Are you sure you want to delete the data ? ');" class="btn btn-danger" href="/delete_position/{{ $item->id }}"><i class="fa fa-trash"></i></a>
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
                 <h4 class="modal-title">Add Department</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>

                 <!-- Ini adalah Bagian Body Modal -->
         <div class="modal-body">
              <div class="card-body">
       <!-- Credit Card -->
       <div id="">
           <div class="card-body">
               <form action="{{ route('position.store')}}"
                   enctype="multipart/form-data" method="post">
                   @csrf
                   @php
                    $id_post_lowongan = request()->segment(2);
                   @endphp
                    <input name="id" type="hidden" class="form-control" aria-required="true" aria-invalid="false">
                    <input name="id_post_lowongan" type="hidden" value="{{$id_post_lowongan}}" class="form-control" aria-required="true" aria-invalid="false">


                    <div class="form-group">
                        <label class="control-label mb-1">Position Name</label>
                        <input name="nama_posisi" type="text" class="form-control" required>
                        {{-- <h6>*kosongkan jika tidak ada</h6> --}}
                    </div>
                   <div>
                       <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                           <i class="fa fa-plus"></i>&nbsp;
                           <span id="payment-button-amount">Submit</span>
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

