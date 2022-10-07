@extends('admin._index')

@section('title','Classes Table')

@section('style')
<link rel="stylesheet" href="../../back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Classes Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Classes Table</li>
            </ol>
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
              <div class="card-header">

                @if(count($errors) > 0 )
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <ul class="p-0 m-0" style="list-style: none;">
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                  </ul>
                </div>
                @endif

                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <ul class="p-0 m-0" style="list-style: none;">
                    <li>{{ session()->get('message') }}</li>
                  </ul>
                </div>
                @endif

                <h3 class="card-title">Classes List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                @if (count($classes) < 1)
                <h2 style="text-align: center"> No Class Level Exists.</h2>
                @else
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Class Level Name</th>
                      <th>Section</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($classes as $class)
                    <tr>
                      <td>{{ $class->name }}</td>
                      <td>{{ $class->section }}</td>
                      <td style="text-align: center; display: flex">
                        <button class="btn btn-info"><a href="{{ Route('classLevels.show', ['classLevel' => $class->id]) }}" style="font-style: none; color: white">Details</a></button>
                        <button class="btn btn-primary"><a href="{{ Route('classLevels.edit', ['classLevel' => $class->id]) }}" style="font-style: none; color: white">Update</a></button>
                        <button class="btn btn-danger" onclick="showModal({{$class->id}})" data-userid="{{$class->id}}">Delete</button>
                      </td>
                    </tr>
                    <div id="applicantDeleteModal-{{$class->id}}" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                      <div class="modal-dialog" style="width:55%;">
                          <div class="modal-content">
                              <form action="{{ Route('classLevels.destroy', ['classLevel' => $class->id]) }}" method="POST" class="remove-record-model">
                                @csrf
                                {{ method_field('delete') }}
                                <div class="modal-header">
                                    <h4 class="modal-title text-center" id="custom-width-modalLabel">Delete Alert</h4>
                                </div>
                                <div class="modal-body">
                                    <h4>Delete This ClassLevel.?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">NO</button>
                                    <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">Delete</button>
                                </div>
                              </form>
                          </div>
                      </div>
                    </div>
                    </tr>
                    @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Class Level Name</th>
                    <th>Section</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
                @endif

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
    <!-- /.content -->
  </div>
@endsection

@section('script')
<script src="../../back/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../back/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../back/plugins/jszip/jszip.min.js"></script>
<script>
  function showModal(id) {
    $(`#applicantDeleteModal-${id}`).modal('show');
  }
</script>
<script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>
@endsection
