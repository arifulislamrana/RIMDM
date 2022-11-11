@extends('layouts._index')
@section('title','Classes')

@section('content')
<div class="page-header-overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h1 style="color: rgb(67, 255, 67)">Classes</h1>
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
                <li>Classes</li>
            </ul>
        </div><!-- .breadcrumbs -->
    </div><!-- .col -->
</div><!-- .row -->

<div class="row">
    <div class="col-12 col-lg-12">
        <div class="featured-courses courses-wrap">
            <div class="row mx-m-25">
                @foreach ($classes as $class)
                <div class="col-12 col-md-6 col-lg-4 px-25">
                    <div class="course-content">
                        <figure class="course-thumbnail">
                            <a href="{{ Route('showClass', ['id' => $class->id]) }}"><img src="/front/images/classLevel.jpg" alt=""></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="{{ Route('showClass', ['id' => $class->id]) }}">Class: {{ $class->name }}</a></h2>

                                <div class="entry-meta flex align-items-center">
                                    <div class="course-author"><a href="#">Total Subjects </a></div>
                                    <div class="course-date">{{ count($class->subjects) }}</div>
                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->
                @endforeach
            </div><!-- .row -->
        </div><!-- .featured-courses -->
    </div><!-- .col -->
</div><!-- .row -->
</div><!-- .container -->
@endsection
