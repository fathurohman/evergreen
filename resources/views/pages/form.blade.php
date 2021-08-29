
@foreach ($data_post as $index=>$data)
@php
$status = date('Y-m-d'); @endphp

@if ($data->tanggal_akhir >= $status)


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Form | {{$data->judul}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <img class="img-fluid" src="">
      {{-- <img class="img-fluid" src="{{asset('/images/img/evergreen1.png')}}"> --}}
    <a href=""><b>Form</b>Lamaran</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post" enctype="multipart/form-data" action="{{ route('form.store') }}">
      @csrf
      @php
          $id_post_lowongan = request()->segment(3);
      @endphp
        <input name="id" type="hidden" class="form-control" aria-required="true" aria-invalid="false">
        <input name="id_post_lowongan" type="hidden" value="{{$id_post_lowongan}}" class="form-control">

         <div class="form-group">
            <input name="bagian" type="text" class="form-control" placeholder="Bagian" id="bagian">
                @error('bagian')
                <div class="text-danger mt-2">
                {{ $message }}
                </div>
                @enderror
          </div>

          <div class="form-group">
            <input name="nik" type="number" class="form-control" placeholder="Nik" id="nik" value="{{old("nik")}}" >
                @error('nik')
                <div class="text-danger mt-2">
                {{ $message }}
                </div>
                @enderror
          </div>

        <div class="form-group">
          <input name="nama" type="text" class="form-control" placeholder="Nama" id="nama">
            @error('nama')
            <div class="text-danger mt-2">
            {{ $message }}
            </div>
            @enderror
        </div>

         <div class="form-group">
          <input name="umur" type="number" class="form-control" placeholder="Umur" id="umur">
            @error('umur')
            <div class="text-danger mt-2">
            {{ $message }}
            </div>
            @enderror
        </div>

        <div class="form-group">
          <input name="ktp" type="file" class="form-control" id="ktp" >
          <div class="text-info mt-2">*file must .jpg,.jpeg,.png | max:2mb</div>
                @error('ktp')
                <div class="text-danger mt-2">
                {{ $message }}
                </div>
                @enderror
          </div>

          <div class="form-group">
            <input name="cv" type="file" class="form-control" id="cv" >
            <div class="text-info mt-2">*file must .pdf | max:2mb</div>
                @error('cv')
                <div class="text-danger mt-2">
                {{ $message }}
                </div>
                @enderror
          </div>

        <div class="row">
          <div class="col-4">
            <a onclick="window.location.reload(true);" class="btn btn-danger btn-block"><font color="white">Reset</font></a>
          </div>
          <!-- /.col -->
          <div class="col-8">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
<script>
    $(function(){

        @if(Session::has('success'))
            Swal.fire({
            // position: 'top-end',
            icon: 'success',
            title: '{{ Session::get("success") }}',
            showConfirmButton: false,
            timer: 1500
        })
        @endif
    });
    </script>

<script>
    $(function(){

        @if(Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: '{{ Session::get("error") }}',
            showConfirmButton: false,
            timer: 1500
        })
        @endif
    });
    </script>

</body>
</html>

@else

@include('welcome')

@endif
@endforeach
