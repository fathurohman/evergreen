
@extends('layouts.template')

@section('content')



<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Department</h1>
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
                {{-- @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                       </button>
                        {{Session::get('success')}}
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-error" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                       </button>
                        {{Session::get('error')}}
                    </div>
                @endif --}}

                <p align="right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_besar">
                        <i class="fa fa-plus"></i> Add </button>
                     </p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Department</th>
                      <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data_bagian as $index=>$item)
                    <tr align="center">
                      <td>{{$index+1 }}</td>
                      <td>{{$item->nama_bagian }}</td>
                      <td>
                          <a class="btn btn-primary" href="/edit_department/{{ $item->id }}"><i class="fa fa-edit"></i></a>
                          {{-- <a onclick="return confirm('Hapus data ?');" class="btn btn-danger" href="/delete_bagian/{{ $item->id }}"><i class="fa fa-trash"></i></a> --}}
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
    <div class="modal fade" id="modal_besar">
        <div class="modal-dialog modal-lg">
                 <div class="modal-content">

                 <!-- Ini adalah Bagian Header Modal -->
                   <div class="modal-header">
                 <h4 class="modal-title">Add Department</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>

                 <!-- Ini adalah Bagian Body Modal -->
         <div class="modal-body">
              <div class="card-body">
       <!-- Credit Card -->
       <div id="">
           <div class="card-body">
               <form action="{{ route('department.store')}}"
                   enctype="multipart/form-data" method="post">
                   @csrf
                    <input name="id" type="hidden" class="form-control" aria-required="true" aria-invalid="false">

                    <div class="form-group">
                        <label class="control-label mb-1">Department</label>
                        <input name="nama_bagian" type="text" class="form-control" required>
                        {{-- <h6>*kosongkan jika tidak ada</h6> --}}
                    </div>
                   <div>
                       <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                           <i class="fa fa-plus"></i>&nbsp;
                           <span id="payment-button-amount">Submit</span>
                       </button>
                   </div>
               </form>
           </div>
       </div>

   </div>
        </div>
       </div>
    </div>
 </div>
  </section>
  @endsection

