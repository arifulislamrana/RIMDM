@extends('admin._index')

@section('title','createPost')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Post Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Post Form</li>
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
                <h3 class="card-title">Add New Post</h3>
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

              <form action="{{Route('posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                    <div class="form-group col-md-6">
                        <label>Select Class</label>
                        <select class="form-control select1" style="width: 100%;" name="class" value="{{old('class')}}" required>
                          @foreach ($classes as $classLevel)
                          <option value="{{$classLevel->id}}">{{ $classLevel->name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-10">
                        <label for="exampleInputName1">Post Heading</label>
                        <input type="text" class="form-control" placeholder="Enter heading" name="heading" value="{{old('heading')}}" required>
                    </div>
                    <div class="form-group col-md-10">
                        <label for="exampleFormControlTextarea1" >Post Description</label>
                        <textarea class="form-control tinymce-editor" name="body" id="exampleFormControlTextarea1"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputFile">Select File</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
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
<script src="https://cdn.tiny.cloud/1/2v1c7jjb931y7wiy2as5ket8cl5sxkgoc1tzzlwzoq2ga9zi/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script type="text/javascript">
    tinymce.init({
    selector: 'textarea.tinymce-editor',
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
     ],
     toolbar: 'undo redo | formatselect | ' +
    'bold italic backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat | help',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    height: 300,
    content_css: '//www.tiny.cloud/css/codepen.min.css'
    });

    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

@endsection
