@extends('layouts._index')
@section('title','Teachers')

@section('content')
    <div class="page-header-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <header class="entry-header">
                            <h1 style="color: rgb(67, 255, 67)">Teachers</h1>
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
                    <h2 class="entry-title">Meet Our Teachers</h2>
                    <p>Teachers are the driving force for creative and gentle nation</p>
                </div><!-- .team-heading -->
            </div><!-- .col -->

            @foreach ($frontTeachersModel->teachers as $teacher)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="team-member">
                    @if ($teacher->img != null)
                    <img src="{{ $teacher->img }}" alt="">
                    @else
                    <img src="/front/images/team-1.jpg" alt="">
                    @endif

                    <h3>{{ $teacher->name }}</h3>
                    <h4>{{ $teacher->designation }}</h4>
                    <h4><i class="fa fa-phone"></i>: {{ $teacher->phone }}</h4>
                    <footer class="entry-footer read-more">
                        <a href="{{ Route('showTeacherToUsers', ['id' => $teacher->id]) }}"><button type="button" class="btn btn-primary">Details</button></a>
                    </footer>
                </div><!-- .team-member -->
            </div><!-- .col -->
            @endforeach

        </div><!-- .row -->
    </div><!-- .container -->
@endsection
