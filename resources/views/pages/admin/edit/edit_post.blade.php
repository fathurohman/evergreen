
@extends('layouts.template')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1>Edit Post</h1>
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

                <form action="{{ route('post.update') }}"
                enctype="multipart/form-data" method="post">
                @csrf
                <input name="id" type="hidden" value="{{$data->id}}" class="form-control">

                <div class="form-group">
                    <label class="control-label mb-1">Department</label>
                       <select name='id_bagian' class="form-control">
                               @foreach ($data2 as $item)
                               <option value="{{$item->id_bagian}}" selected>Previous choice : {{$item->nama_bagian}}</option>
                               @endforeach
                               @foreach ($dd_bagian as $rows)
                               <option value="{{ $rows->id}}">{{ $rows->nama_bagian}}</option>
                               @endforeach
                       </select>
                    </div>


                <div class="form-group">
                    <label class="control-label mb-1">Title</label>
                    <input name="judul" value="{{$data->judul}}" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="control-label mb-1">Qualification</label>
                    <textarea rows="8" cols="50" name="kualifikasi" class="form-control" required>{{$data->kualifikasi}}</textarea>
                </div>
                <div class="form-group">
                    <label class="control-label mb-1">End Date</label>
                    <input name="tanggal_akhir" value="{{$data->tanggal_akhir}}" type="date" class="form-control" required>
                </div>

                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        <i class="fa fa-edit"></i>&nbsp;
                        <span id="payment-button-amount">Submit</span>
                    </button>
                </div>
            </form>

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
