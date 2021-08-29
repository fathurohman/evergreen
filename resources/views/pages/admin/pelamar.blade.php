
@extends('layouts.template')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Pelamar</h1>
        </div>
        {{-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Daftar tamu </li>
          </ol>
        </div> --}}
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            {{-- <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div> --}}
            <!-- /.card-header -->

            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <div class="card">
            {{-- <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div> --}}
            <!-- /.card-header -->
            <div class="card-body">

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
                    <th>Deskripsi</th>
                    <th>Kualifikasi</th>
                </tr>
                <tr align="left">
                    <td><p style="white-space: pre-line">{{$item->deskripsi}}</p></td>
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
                <br><br>

                {{-- <p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_besar">
                      Tambah Hadir Tamu </button>
                       @foreach ($data_tamu as $index=>$item)
                      <a href="/data_subtamu/cetak_pdf/{{$item->id}}" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> CETAK PDF</a>
                      @endforeach
                     </p> --}}

                 <table id="example3" class="table table-bordered">
                    <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Foto KTP</th>
                      <th>Informasi</th>
                      <th>CV</th>
                      <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data_pelamar as $index=>$item)
                   <tr align="center">
                      <td>{{$index +1 }}</td>
                      <td> <img src="{{asset('/images/foto_ktp')}}/{{$item->foto_ktp}}" style="max-width: 250px;margin-top: 10px;margin-bottom: 10px"><br>
                        <a class="btn btn-primary" href="/download_foto/{{ $item->id }}"><i class="fa fa-download"></i> Download</a>

                    </td>
                      <td>{{$item->nik }} <br>
                          {{$item->nama }} <br>
                          {{$item->umur }} Tahun
                        </td>
                      <td><a class="btn btn-primary" href="/download_cv/{{ $item->id }}"><i class="fa fa-download"></i> Download cv</a>
                      </td>
                     <td>
                        <a onclick="return confirm('Acc data ?');" class="btn btn-info" href="/acc/{{ $item->id }}"><i class="fa fa-check"></i> Acc</a>
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
  </section>
  @endsection
