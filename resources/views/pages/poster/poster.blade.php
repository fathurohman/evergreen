<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>{{$judul}}</title>

    <!-- Bootstrap core CSS -->
<link href="{{asset('print_assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="{{asset('print_assets/style.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('print_assets/print.css')}}" type="text/css" media="print" rel="stylesheet">
  </head>
  <body>


<main role="main" class="container">

    <div class="jumbotron-edit" style="background-image: url('{{asset('/images/img_post')}}/{{$image}}')">
        {{-- <h1 class="display-4">Hello, world!</h1> --}}
        <p class="wearehiring">WE ARE <br> HIRING!</p>
        <br><br>
        {{-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> --}}

        <p class="evergreen-text">PT. EVERGREEN SHIPPING AGENCY INDONESIA<br>
                {{$nama_bagian }}
        </p>

      </div>

        <div class="deskripsi">
            <table align="center">
                <tr>
                    <td>@foreach ($data_position as $index=>$items)
                        <p class="deskripsi-p">{{$index+1 }}. {{$items->nama_posisi}}
                        </p>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="kualifikasi-p">
                            QUALIFICATIONS
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="deskripsi-text">{{$kualifikasi }}
                        </p>
                    </td>
                </tr>
            </table>
        </div>
        <br><br>




  {{-- <div class="starter-template">
    <h1>Bootstrap starter template</h1>
    <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
  </div> --}}


    <div class="footer"><p>Please register at the following link
        <b>post/form/{{ $id }}</b> </p>
    </div>


</main><!-- /.container -->


<script type="text/javascript">
    window.print();
</script>

  </body>
</html>
