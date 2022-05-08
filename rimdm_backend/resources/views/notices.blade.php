@extends('layouts._index')
@section('title','Notice')

@section('content')
<div class="page-header-overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h1 style="color: rgb(67, 255, 67)">Notice</h1>
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
                <li>Notice</li>
            </ul>
        </div><!-- .breadcrumbs -->
    </div><!-- .col -->
</div><!-- .row -->

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="single-course-wrap">
                <div class="single-course-accordion-cont mt-3">
                    <div class="entry-contents">
                        <div class="accordion-wrap type-accordion">
                            @foreach ($notices as $notice)
                            <h3 class="entry-title flex flex-wrap justify-content-between align-items-lg-center">
                                <span class="arrow-r"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></span>
                                <span class="lecture-group-title">{{ $notice->heading }}</span>
                                <span class="total-lectures-time">{{ date('Y-m-d', strtotime($notice->created_at ))}}</span>
                                <span class="number-of-lectures"><a href="{{ Route('notice.details', ['notice' => $notice->id]) }}">See more..</a></span>
                            </h3>
                            @endforeach
                        </div>
                    </div><!-- .entry-contents -->
                </div><!-- .single-course-accordion-cont  -->
            </div><!-- .single-course-wrap -->
        </div><!-- .col -->
    </div><!-- .row -->
</div><!-- .container -->
</div><!-- .container -->
@endsection
