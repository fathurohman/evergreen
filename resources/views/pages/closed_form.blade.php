<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Form | {{$data->judul}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{asset('images/evergreen_logo.png')}}" rel="icon">
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

  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">


</head>

<body class="hold-transition login-page">
<div class="container">
  <div class="login-logo">
    <br>
      <img class="img-fluid" src="">
      {{-- <img class="img-fluid" src="{{asset('/images/img/evergreen1.png')}}"> --}}
    <a href=""><b></b></a>
    <br><br>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body">
        <p align="center"><img style="max-width: 150px;margin-top: 10px;margin-bottom: 10px" src="{{asset('images/evergreen_logo.png')}}"></p><br>
      <p align="center"><font color="#DE6262" size="5px"><b>Sorry the job has been closed</b></font></p><br>



      <div class="row">
        <div class="col-lg-12">
            <p class="copyright text-center">All Rights Reserved. &copy; <?php echo date("Y"); ?> <a href="https://www.evergreen-line.com/" target="_blank">PT. Evergreen Shipping Agency Indonesia</a> Developed By:
                <a href="https://erfadigital.com" target="_blank">ERFA Digital Creative</a>
            </p>
        </div>
    </div>
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

<!-- DataTables -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

  <script>

    $(function(){

        @if(Session::has('warning'))
                Swal.fire({
                icon: 'error',
                title: '{{ Session::get("warning") }}',
                showClass: {
                popup: 'animate__animated animate__fadeInDown'
        },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
    }
  })
        @endif
    });
</script>

<script>

    $(function(){

        @if(Session::has('success'))
                Swal.fire({
                icon: 'success',
                title: '{{ Session::get("success") }}',
                showClass: {
                popup: 'animate__animated animate__fadeInDown'
        },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
    }
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
    <script>
        $(document).ready(function() {
    $('table.table').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": false,
        "autoWidth": true,
        "responsive": true,
    });
    } );
    </script>



</body>
</html>

