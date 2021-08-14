

@extends('layouts.template')

@section('content')


<!-- Main content --><br>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Change Password</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ route('passwords.edit')}}" method="post">
                @csrf
                @method("PATCH")
              <div class="card-body">

                {{-- @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                       </button>
                        {{Session::get('success')}}
                    </div>
                @endif --}}
            <div class="form-group">
                <label for="old_password" class="col-sm-6 col-form-label">Old Password</label>
                <div class="col-sm-10">
                  <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Old Password">
                  @error('old_password')
                  <div class="text-danger mt-2">
                  {{ $message }}
                  </div>
                @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-sm-6 col-form-label">New Password</label>
                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
                  @error('password')
                  <div class="text-danger mt-2">
                  {{ $message }}
                  </div>
                @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="password_confirmation" class="col-sm-6 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                  <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder=" Confirm Password">
                </div>
              </div>
              <br>
              <div class="form-group">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>

              <!-- /.card-body -->
            </form>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  @endsection
