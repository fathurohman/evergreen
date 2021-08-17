<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>HRD System | Poster</title>

    <!-- Bootstrap core CSS -->
<link href="{{asset('print_assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{asset('print_assets/style.css')}}" rel="stylesheet">
  </head>
  <body>


<main role="main" class="container">

    <div class="jumbotron-edit" style="background-image: url('{{asset('/images/img/ever1.jpg')}}')">
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
                    <td>
                        <p class="deskripsi-p">{{$deskripsi }}
                        </p>
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


    <div class="footer">
      <p>Send Your Resumes in English
          to recriutment

      </p>
    </div>


</main><!-- /.container -->




  </body>
</html>
