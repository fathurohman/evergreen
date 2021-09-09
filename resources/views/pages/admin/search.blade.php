
@extends('layouts.template')

@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Searching Applicant</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="container-fluid">
    <div class="col-md-12">
    <div class="card">
    <div class="card-body">

    <div clas="row">
            <div class="col-sm-12">
                <form action="{{ route('search.pelamar') }}" method="GET">
                    <div class="form-group">
                        <label class="control-label mb-1">Search Nik</label>
                        <input name="search" type="text" class="form-control" required>
                    </div>
                </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                             <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-search"></i> Search </button>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('/search') }}" class="btn btn-info btn-block"><i class="fas fa-recycle"></i> Reset </a>
                       </div>
                    </form>
                    </div>
        </div>

  </div>
  </div>
    </div>
  </div>


  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="card-body">
                <table id="example1s" class="table table-bordered table-striped">
                    <thead>
                    <tr align="center">
                      <th>Photo</th>
                      <th>Nik</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($data)


                    @foreach ($data as $index=>$item)
                    <tr align="center">
                      <td><img src="{{asset('/images/photos')}}/{{$item->file_photo}}" style="max-width: 100px;margin-top: 10px;margin-bottom: 10px">
                      </td>
                      <td>{{$item->id_card_number}}</td>
                      <td>{{$item->personal_name}}</td>
                      <td><a onclick="return confirm('Are you sure you want to delete the data ?');" class="btn btn-danger" href="/delete_pelamar/{{ $item->id }}"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td col="3">blank</td>

                    </tr>


                    @endif

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

        </div>
       </div>
    </div>
 </div>
  </section>
  @endsection

