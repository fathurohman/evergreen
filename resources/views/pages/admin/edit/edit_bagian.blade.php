
@extends('layouts.template')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Department</h1>
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

                <form action="{{ route('department.update') }}"
                enctype="multipart/form-data" method="post">
                @csrf
                <input name="id" type="hidden" value={{$data->id}} class="form-control" aria-required="true" aria-invalid="false">

                <div class="form-group">
                    <label class="control-label mb-1">Department</label>
                    <input name="nama_bagian" type="text" value="{{$data->nama_bagian}}" class="form-control" required>
                    {{-- <h6>*kosongkan jika tidak ada</h6> --}}
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
