@extends('layouts._index')
@section('title','Contact')

@section('content')
<div class="page-header-overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h1>Class: {{ $class->name }}</h1>
                </header><!-- .entry-header -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header-overlay -->
</div><!-- .page-header -->

<div class="container">
<div class="row">
    <div class="col-12">
        <div class="breadcrumbs">
            <ul class="flex flex-wrap align-items-center p-0 m-0">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li>class: {{ $class->name }}</li>
            </ul>
        </div><!-- .breadcrumbs -->
    </div><!-- .col -->
</div><!-- .row -->

<div class="row justify-content-between">

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Subject</th>
            <th scope="col">Teacher</th>
            <th scope="col">Image</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($class->subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->teacher->name }}</td>
                <td style="height: 80px; width:90px;">
                    <img style="height: 100%; width: 100%; border-radius:50%" src="{{$subject->teacher->img}}" alt="image of teacher">
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
</div><!-- .row -->
</div><!-- .container -->
@endsection
