@extends('admin._index')

@section('title','UpdateTeacher')

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
            <h1>Teacher Update Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Form</li>
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
                <h3 class="card-title">Update Teacher</h3>
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

              <form action="{{Route('teachers.update', ['teacher' => $updateTeacherModel->teacher->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputName1">Teacher Name</label>
                        <input type="text" class="form-control" placeholder="Enter Student Name" name="name" value="{{$updateTeacherModel->teacher->name}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputName1">Designation</label>
                        <input type="text" class="form-control" placeholder="Enter Designation" name="designation" value="{{$updateTeacherModel->teacher->designation}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputName1">Qualification</label>
                        <input type="text" class="form-control" placeholder="Enter Qualification" name="qualification" value="{{$updateTeacherModel->teacher->designation}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputMobile1">Mobile no.</label>
                        <input type="text" class="form-control" placeholder="Enter Student Mobile no." name="phone" value="{{$updateTeacherModel->teacher->phone}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{$updateTeacherModel->teacher->email}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputFile">Select Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
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
