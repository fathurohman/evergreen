
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
                    <th>Title</th>
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
                    <th>Qualification</th>
                </tr>
                <tr align="left">
                    <td><p style="white-space: pre-line">@foreach ($data_position as $index=>$data){{$index+1 }}. {{$data->nama_posisi}} <br> @endforeach</p></td>

                    <td><p style="white-space: pre-line">{{$item->kualifikasi}}</p></td>
                </tr>
                <tr>
                    <td colspan="2"> <b>End Date :</b> <?php
                        $tanggal = $item->tanggal_akhir;
                            $daftar_hari = array(
                                            'Sunday' => 'Sunday',
                                            'Monday' => 'Monday',
                                            'Tuesday' => 'Tuesday',
                                            'Wednesday' => 'Wednesday',
                                            'Thursday' => 'Thursday',
                                            'Friday' => 'Friday',
                                            'Saturday' => 'Saturday'
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

                 <table id="examplenot" class="table table-bordered">
                    <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Photo</th>
                      {{-- <th>Informasi</th> --}}
                      <th>Info</th>
                      <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data_pelamar_acc as $index=>$item)
                   <tr align="center">
                      <td>{{$index +1 }}</td>
                      <td><img src="{{asset('/images/photos')}}/{{$item->file_photo}}" style="max-width: 200px;margin-top: 10px;margin-bottom: 10px">
                      </td>

                      <td>{{-- <a class="btn btn-primary" href="/download_foto/{{ $item->id }}"><i class="fa fa-download"></i> Download</a> --}}
                        <table>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>
                                <td>{{$item->id_card_number }}</td>
                            </tr>
                            <tr>
                                <td>Personal Name</td>
                                <td>:</td>
                                <td>{{$item->personal_name }}</td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td>:</td>
                                <td>{{$item->email }}</td>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td>:</td>
                                <td>{{$item->age }}</td>
                            </tr>


                        </table>
                    </td>
                      {{-- <td>
                        </td> --}}

                        @php

                            $data_psikotest = DB::table('psikotest')
                                            ->leftjoin('data_pelamar', 'data_pelamar.id','=','psikotest.id_data_pelamar')
                                            ->where('psikotest.id_data_pelamar', $item->id)
                                            ->get();

                            $data_binggris = DB::table('b_inggris')
                                        ->leftjoin('data_pelamar', 'data_pelamar.id','=','b_inggris.id_data_pelamar')
                                        ->where('b_inggris.id_data_pelamar', $item->id)
                                        ->get();

                        @endphp

                     <td>
                        @if ($data_psikotest->isEmpty())
                            <span class="badge badge-warning"> Haven't filled out the psychotest yet</span>
                        @else
                            <a target="_blank" class="btn btn-primary" href="/result_psikotest/{{ $item->id }}"><i class="fa fa-print"></i> Psychological Test</a>
                        @endif

                        @if ($data_binggris->isEmpty())
                            <span class="badge badge-warning"> Haven't filled out the English test yet</span>
                        @else
                            <a target="_blank" class="btn btn-primary" href="/result_english/{{ $item->id }}"><i class="fa fa-print"></i> English Test</a>
                        @endif


                        <br>
                        <a class="btn btn-info" href="/detail_applicants/{{ $item->id }}"><i class="fa fa-info"></i> Detail</a>
                        <a onclick="return confirm('Cancel Acc ?');" class="btn btn-danger" href="/cancel_acc_1/{{ $item->id }}"><i class="fa fa-times-circle"></i> Cancel Acc</a>

                     </td>

                    </tr>

                    @endforeach
                    </tbody>
                  </table>
                  <br>
                  <div class="row justify-content-center">
                    {{ $data_pelamar->links() }}

                </div>

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
