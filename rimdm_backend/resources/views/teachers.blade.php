@extends('layouts._index')
@section('title','About')

@section('content')
    <div class="page-header-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <header class="entry-header">
                            <h1 style="color: rgb(67, 255, 67)">ABOUT</h1>
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
                        <li>Teachers</li>
                    </ul>
                </div><!-- .breadcrumbs -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="team-heading">
                    <h2 class="entry-title">Meet Our Team</h2>
                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
                </div><!-- .team-heading -->
            </div><!-- .col -->

            <div class="col-12 col-md-6 col-lg-3">
                <div class="team-member">
                    <img src="/front/images/team-1.jpg" alt="">

                    <h3>Mr. John Wick</h3>
                    <h4>Materials</h4>

                    <ul class="p-0 m-0 d-flex justify-content-center align-items-center">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div><!-- .team-member -->
            </div><!-- .col -->

            <div class="col-12 col-md-6 col-lg-3">
                <div class="team-member">
                    <img src="/front/images/team-2.jpg" alt="">

                    <h3>Michelle Golden</h3>
                    <h4>WordPress</h4>

                    <ul class="p-0 m-0 d-flex justify-content-center align-items-center">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div><!-- .team-member -->
            </div><!-- .col -->

            <div class="col-12 col-md-6 col-lg-3">
                <div class="team-member">
                    <img src="/front/images/team-3.jpg" alt="">

                    <h3>Ms. Lucius</h3>
                    <h4>Data Analysis</h4>

                    <ul class="p-0 m-0 d-flex justify-content-center align-items-center">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div><!-- .team-member -->
            </div><!-- .col -->

            <div class="col-12 col-md-6 col-lg-3">
                <div class="team-member">
                    <img src="/front/images/team-4.jpg" alt="">

                    <h3>Ms. Lara Croft </h3>
                    <h4>HTML CSS</h4>

                    <ul class="p-0 m-0 d-flex justify-content-center align-items-center">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div><!-- .team-member -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
@endsection
