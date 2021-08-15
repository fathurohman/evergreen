
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
                        <i class="fa fa-plus"></i> Add </button>
                     </p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Image</th>
                      <th>Bagian</th>
                      <th>Judul</th>
                      <th>Tanggal Akhir</th>
                      <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data_post as $index=>$item)
                    <tr align="center">
                      <td>{{$index+1 }}</td>
                      <td>
                        <img src="{{asset('/images/img_post')}}/{{$item->image}}" style="max-width: 250px;margin-top: 10px;margin-bottom: 10px"> <br>
                        <a class="btn btn-primary" href="/edit_imagepost/{{ $item->id }}"><i class="fa fa-edit"></i> Edit Image</a>
                      </td>
                      <td>{{$item->nama_bagian }}</td>
                      <td>{{$item->judul }}</td>
                      <td>
                        <?php
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
                                ?>
                    </td>

                      <td>
                        @php
                            $jumlah_pelamar  = DB::table('data_pelamar')
                                            ->where('id_post_lowongan', $item->id)
                                            ->Count();
                        @endphp

                          <a class="btn btn-primary" href="/sub_post/{{ $item->id }}"><i class="fa fa-share"></i> @if($jumlah_pelamar) <b>{{$jumlah_pelamar}}</b> @else  @endif</a>
                          <a class="btn btn-primary" href="/edit_post/{{ $item->id }}"><i class="fa fa-edit"></i></a>
                          <a onclick="return confirm('Hapus data ?');" class="btn btn-danger" href="/delete_post/{{ $item->id }}"><i class="fa fa-trash"></i></a>
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
                 <h4 class="modal-title">Add Post</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>

                 <!-- Ini adalah Bagian Body Modal -->
         <div class="modal-body">
              <div class="card-body">
       <!-- Credit Card -->
       <div id="">
           <div class="card-body">
               <form action="{{ route('post.store')}}"
                   enctype="multipart/form-data" method="post">
                   @csrf
                    <input name="id" type="hidden" class="form-control" aria-required="true" aria-invalid="false">

                    <div class="form-group">
                        <label class="control-label mb-1">Image</label>
                        <img id="previewImg" style="max-width: 450px;margin-top: 10px;margin-bottom: 10px" alt="profile image">
                        <input name="file" type="file" class="form-control" onchange="previewFile(this)" required>

                    </div>
                    <div class="form-group">
                        <label class="control-label mb-1">Bagian</label>
                           <select name='id_bagian' class="form-control" required>
                                    <option value="" selected>- Pilih -</option>
                                    @foreach ($dd_bagian as $rows)
                                    <option value="{{ $rows->id}}">{{ $rows->nama_bagian}}</option>
                                    @endforeach
                           </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label mb-1">Judul</label>
                        <input name="judul" type="text" class="form-control" required>
                        {{-- <h6>*kosongkan jika tidak ada</h6> --}}
                    </div>

                    <div class="form-group">
                        <label class="control-label mb-1">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" required></textarea>
                        {{-- <h6>*kosongkan jika tidak ada</h6> --}}
                    </div>

                    <div class="form-group">
                        <label class="control-label mb-1">Kualifikasi</label>
                        <textarea name="kualifikasi" class="form-control" required></textarea>
                        {{-- <h6>*kosongkan jika tidak ada</h6> --}}
                    </div>

                    <div class="form-group">
                        <label class="control-label mb-1">Tanggal Akhir</label>
                        <input name="tanggal_akhir" type="date" class="form-control" required>
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

