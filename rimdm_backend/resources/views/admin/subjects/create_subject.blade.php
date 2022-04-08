@extends('admin._index')

@section('title','createSubject')

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
            <h1>Subject Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subject Form</li>
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
                <h3 class="card-title">Add New Subject</h3>
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

              <form action="{{Route('subjects.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputName1">Subject Name</label>
                        <input type="text" class="form-control" placeholder="Enter Subject Name" name="name" value="{{old('name')}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Select Class</label>
                        <select class="form-control select1" style="width: 100%;" name="class" value="{{old('class')}}" required>
                          @foreach ($CreateSubjectModel->classes as $classLevel)
                          <option value="{{$classLevel->id}}">{{ $classLevel->name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Select Teacher(Not Mandatory)</label>
                        <select class="form-control select1" style="width: 100%;" name="teacher" value="{{old('teacher')}}">
                            <option value="">Assign a Teacher</option>
                            @foreach ($CreateSubjectModel->teachers as $teacher)
                            <option value="{{$teacher->id}}">{{ $teacher->name }} <span style="height: 20px, width: 20px"><img src="{{ $teacher->img }}" alt=""></span></option>
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
