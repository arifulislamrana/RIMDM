@extends('layouts._index')
@section('title','Apply')

@section('content')
<div class="page-header-overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h1>Apply</h1>
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
                <li>Apply</li>
            </ul>
        </div><!-- .breadcrumbs -->
    </div><!-- .col -->
</div><!-- .row -->
@if (session('success'))
  <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong> {{ session('success') }} </strong>
  </div>
@endif
<div class="row justify-content-between">
    <div class="col-12 col-lg-12">
        <div class="contact-form">
            <h3>Application Form</h3>
            <form action="{{Route('apply.post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" placeholder="Your Name" name="name">
                <input type="email" placeholder="Your Email" name="email">
                <input type="text" placeholder="Father Name" name="fname">
                <input type="text" placeholder="Mother Name" name="mname">
                <textarea placeholder="Your Address" rows="4" name="address"></textarea>
                <input type="submit" value="Apply">
            </form>
        </div><!-- .contact-form -->
    </div><!-- .col -->
</div><!-- .row -->
</div><!-- .container -->
@endsection
