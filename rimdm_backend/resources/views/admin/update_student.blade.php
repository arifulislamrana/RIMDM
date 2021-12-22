@extends('admin._index')

@section('title','UpdateStudent')

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
            <h1>Student Update Form</h1>
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
                <h3 class="card-title">Update Student</h3>
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

              <form action="{{Route('student.update', ['id' => $updateStudentModel->student->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputName1">Student Name</label>
                        <input type="text" class="form-control" placeholder="Enter Student Name" name="name" value="{{$updateStudentModel->student->name}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputNumber1">Roll no.</label>
                        <input type="number" class="form-control" placeholder="Enter Student Roll no." name="roll" value="{{$updateStudentModel->student->roll}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputName1">Father Name</label>
                        <input type="text" class="form-control" placeholder="Enter Father Name" name="fname" value="{{$updateStudentModel->student->f_name}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputName1">Mother Name</label>
                        <input type="text" class="form-control" placeholder="Enter Mother Name" name="mname" value="{{$updateStudentModel->student->m_name}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputMobile1">Mobile no.</label>
                        <input type="text" class="form-control" placeholder="Enter Student Mobile no." name="phone" value="{{$updateStudentModel->student->phone}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="{{$updateStudentModel->student->email}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputDate1">Date of Birth</label>
                        <input type="date" class="form-control" id="reservationdate" placeholder="Enter email" name="dob" value="{{$updateStudentModel->student->dob}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Select Class</label>
                        <select class="form-control select1" style="width: 100%;" name="class" required>
                          @foreach ($updateStudentModel->classes as $classLevel)
                          @if ($classLevel->id == $updateStudentModel->student->class_level_id)
                          <option selected="selected" value="{{$classLevel->id}}">{{ $classLevel->name }}</option>
                          @endif
                          <option value="{{$classLevel->id}}">{{ $classLevel->name }}</option>
                          @endforeach
                        </select>
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
                    <div class="form-group col-md-6">
                      <label for="exampleInputText1">Home address</label>
                      <textarea id="exampleInputEmail1" style="width: 100%;" name="address">{{$updateStudentModel->student->address}}</textarea>
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
