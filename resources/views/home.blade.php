{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.template')

@section('content')


  {{-- <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Home</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="#">Home</a></li>

          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section> --}}
<br>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-file-alt"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Jobs Posting</span>
                      <span class="info-box-number">{{$allpost}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Total Applicants</span>
                      <span class="info-box-number">{{$allpelamar}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-building"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Department</span>
                      <span class="info-box-number">{{$alldepartment}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <!-- /.col -->
                {{-- <div class="col-md-3 col-sm-6 col-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Likes</span>
                      <span class="info-box-number">93,139</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div> --}}
                <!-- /.col -->

              </div>
              <!-- /.row -->
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <div class="row">

        <div class="col-md-12">
            <div class="row">
                @foreach ($data_post as $index=>$item)
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                      <span class="info-box-icon bg-success"><i class="fas fa-bullhorn"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">{{$item->judul }}</span><br>
                        <span class="info-box-number">{{$item->nama_bagian }}</span><br>
                        @php
                              $data_position = DB::table('position')
                                            ->where('id_post_lowongan' , $item->id)
                                            ->get();
                          @endphp
                        <span class="info-box-text">Position :</span>
                        @foreach ($data_position as $index=>$items)
                            <span class="info-box-text"> {{$index+1}}. {{$items->nama_posisi}} </span>
                        @endforeach
                        <br>
                        <span class="info-box-text">End Date : </span>
                        <span class="info-box-number">
                            <?php
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
                                ?>

                            </span><br>

                            @php
                            $jumlah_pelamar  = DB::table('data_pelamar')
                                            ->where('id_post_lowongan', $item->id)
                                            // ->where('status_accepted', 'acc')
                                            ->Count();
                            $jumlah_pelamar_acc  = DB::table('data_pelamar')
                                            ->where('id_post_lowongan', $item->id)
                                            ->where('status_accepted', 'acc')
                                            ->Count();
                            @endphp

                            <span class="info-box-text">Total Applicant : </span>
                            <span class="info-box-number"><i class="fa fa-user-plus"></i> {{$jumlah_pelamar}}</span>
                            <br>
                            <span class="info-box-text">Applicants Pass Selection : </span>
                            <span class="info-box-number"><i class="fa fa-user-check"></i> {{$jumlah_pelamar_acc}}</span>

                      </div>
                      <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>
                @endforeach


              </div>
              <!-- /.row -->
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->



@endsection
