
@extends('layouts.template')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Image Post</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/post">Post</a></li>
            <li class="breadcrumb-item active">Edit Image Post</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
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

                <form action="{{ route('imagepost.update') }}"
                enctype="multipart/form-data" method="post">
                @csrf
                <input name="id" type="hidden" value="{{$data->id}}" class="form-control">
                <div class="form-group">
                    <label class="control-label mb-1">Edit Image</label>
                    <img id="previewImg" style="max-width: 450px;margin-top: 10px;margin-bottom: 10px" alt="profile image">
                    <input name="file" type="file" value="{{$data->image}}" class="form-control" onchange="previewFile(this)" required>

                    <label class="control-label mb-1">Previous Image</label>
                    <img src="{{asset('images/img_post')}}/{{$data->image}}" style="max-width: 250px;margin-top: 10px;margin-bottom: 10px">
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
