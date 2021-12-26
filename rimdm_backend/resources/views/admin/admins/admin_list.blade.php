@extends('admin._index')

@section('title','Admins Table')

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
            <h1>Admins Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admins Table</li>
            </ol>
          </div>
        </div>
        {{-- <form action="#" id="form-1" method="GET" enctype="multipart/form-data">
          @csrf
          <div class="card-body row">
              <div class="form-group col-md-4">
                <label>Select Class</label>
                <select class="form-control select1" style="width: 100%;" name="class" value="{{old('class')}}"  onchange="submitForm()" required>
                  <option>Select class for students list</option>
                  @foreach ($StudentTableModel->classes as $classLevel)
                  <option value="{{$classLevel->id}}">{{ $classLevel->name }}</option>
                  @endforeach
                </select>
              </div>
          </div>
        </form> --}}
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
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif

                <h3 class="card-title">Admins  &  Super Admins</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Image</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($adminList->allAdmins as $admin)
                    <tr>
                      <td>{{ $admin->name }}</td>
                      <td>{{ $admin->email }}</td>
                      <td>{{ $admin->role }}</td>
                      <td> <img src="{{$admin->img}}" alt="" style="border-radius: 50%; height: 50px; width: 65px"> </td>
                      <td style="text-align: center; display: flex">
                        <button class="btn btn-info"><a href="#" style="font-style: none; color: white">Details</a></button>
                        <button class="btn btn-primary"><a href="#" style="font-style: none; color: white">Update</a></button>
                        <button class="btn btn-danger" onclick="showModal({{$admin->id}})" data-userid="{{$admin->id}}">Remove</button>
                      </td>
                    </tr>
                    <div id="applicantDeleteModal-{{$admin->id}}" class="modal modal-danger fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                      <div class="modal-dialog" style="width:55%;">
                          <div class="modal-content">
                              <form action="#" method="POST" class="remove-record-model">
                                @csrf
                                {{ method_field('delete') }}
                                <div class="modal-header">
                                    <h4 class="modal-title text-center" id="custom-width-modalLabel">Remove Alert</h4>
                                </div>
                                <div class="modal-body">
                                    <h4>Remove This Admin?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">NO</button>
                                    <button type="submit" class="btn btn-danger waves-effect remove-data-from-delete-form">Delete</button>
                                </div>
                              </form>
                          </div>
                      </div>
                    </div>
                    @endforeach

                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Image</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
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
