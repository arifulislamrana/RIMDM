@extends('layouts._index')
@section('title','Contact')

@section('content')
<div class="page-header-overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h1>CONTACT</h1>
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
                <li>Contact</li>
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

    <div class="col-12 col-lg-6">
        <div class="contact-form">
            <h3>Contact Form</h3>
            <form action="{{Route('contact.qa')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" placeholder="Your Name" name="name">
                <input type="email" placeholder="Your Email" name="email">
                <input type="text" placeholder="Subject" name="subject">
                <textarea placeholder="Your Message" rows="4" name="message"></textarea>
                <input type="submit" value="Send Message">
            </form>
        </div><!-- .contact-form -->
    </div><!-- .col -->

    <div class="col-12 col-lg-6">
        <div class="contact-info">
            <h3>Contact Information</h3>

            <p>If you have any query or suggestion, please feel free to contact. </p>

            <ul class="p-0 m-0">
                <li><span>Location:</span>Musapur, Compangpnj, Noakhali, Bangladesh</li>
                <li><span>Email:</span><a href="#">rimdmadrasah@gmail.com</a></li>
                <li><span>Phone:</span><a href="#">01629846484</a></li>
            </ul>
        </div><!-- .contact-info -->
    </div><!-- .col -->
</div><!-- .row -->
</div><!-- .container -->
@endsection
