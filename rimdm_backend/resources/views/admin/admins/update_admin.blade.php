@extends('admin._index')

@section('title','UpdateAdmin')

@section('style')
<link rel="stylesheet" href="../../back/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="../../back/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Teacher Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if(count($errors) > 0 )
              <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert">
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

              <form action="{{Route('admins.update', ['admin' => $editAdminModel->teacher->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body row">
                    <div class="form-group col-md-6">
                        <label>Edit Role</label>
                        <select class="form-control select1" style="width: 100%;" name="role" value="{{old('role')}}" required>
                          @foreach ($editAdminModel->roles as $role)
                            @if ($editAdminModel->teacher->role->name == $role->name)
                            <option value="{{$role->id}}" selected="selected">{{ $role->name }}</option>
                            @else
                            <option value="{{$role->id}}">{{ $role->name }}</option>
                            @endif
                          @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('script')
<script src="../../back/plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    })
</script>
@endsection
