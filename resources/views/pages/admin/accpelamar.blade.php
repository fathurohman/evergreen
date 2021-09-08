
@extends('layouts.template')

@section('content')



<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Applicants pass selection</h1>
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
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Department</th>
                      <th>Title</th>
                      <th>Position</th>
                      <th>End Date</th>
                      <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data_post as $index=>$item)
                    <tr align="center">
                      <td>{{$index+1 }}</td>
                      <td>{{$item->nama_bagian }}</td>
                      <td>{{$item->judul }}</td>
                      <td>
                          @php
                              $data_position = DB::table('position')
                                            ->where('id_post_lowongan' , $item->id)
                                            ->get();
                          @endphp
                        @foreach ($data_position as $index=>$items)
                            {{$index+1}}. {{$items->nama_posisi}} <br>
                        @endforeach

                      </td>
                      <td>
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
                    </td>

                      <td>
                        @php
                            $jumlah_pelamar  = DB::table('data_pelamar')
                                            ->where('id_post_lowongan', $item->id)
                                            ->where('status_accepted', 'acc')
                                            ->Count();
                            $jumlah_position  = DB::table('position')
                                            ->where('id_post_lowongan', $item->id)
                                            ->Count();
                        @endphp

                          {{-- <a target="_blank" class="btn btn-primary" href="/poster/{{ $item->id }}">Poster <i class="fa fa-file-image"></i></a> --}}
                          <a class="btn btn-success" href="/applicant_acc/{{ $item->id }}">Applicant <i class="fa fa-user-check"></i> @if($jumlah_pelamar) <b>{{$jumlah_pelamar}}</b> @else  @endif</a>
                          <br><br>
                          {{-- <a class="btn btn-info" href="/position/{{ $item->id }}">Position <i class="fa fa-male"></i> @if($jumlah_position) <b>{{$jumlah_position}}</b> @else  @endif</a>
                          <a class="btn btn-primary" href="/edit_post/{{ $item->id }}"><i class="fa fa-edit"></i></a>
                          <a onclick="return confirm('Hapus data ?');" class="btn btn-danger" href="/delete_post/{{ $item->id }}"><i class="fa fa-trash"></i></a> --}}
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

  </section>
  @endsection

