@extends('layouts._index')
@section('title','Home')

@section('content')
    <div class="hero-content-overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-content-wrap flex flex-column justify-content-center align-items-start">
                        <header class="entry-header">
                            <h4>A Family of Learning</h4>
                            <h1>Rongmala Islamia<br/>Mohila Dakhil Madrasa</h1>
                        </header><!-- .entry-header -->

                        <div class="entry-content">
                            <p>A community with high expectation and high academic achievement</p>
                        </div><!-- .entry-content -->

                        <footer class="entry-footer read-more">
                            <a href="{{ Route('about') }}">read more</a>
                        </footer><!-- .entry-footer -->
                    </div><!-- .hero-content-wrap -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .hero-content-hero-content-overlay -->
</div><!-- .hero-content -->

    <div class="icon-boxes">
        <div class="container-fluid">
            <div class="flex flex-wrap align-items-stretch">
                <div class="icon-box">
                    <header class="entry-header">
                        <h2 class="entry-title">Learn With The Experts</h2>
                    </header><!-- .entry-header -->

                    <div class="icon">
                        <span class="ti-user"> {{ $homeModel->totalTeachers }}</span>
                    </div><!-- .icon -->

                    <div class="entry-content">
                        <p>Our Teachers are highly qualified and certified. They are very student friendly. They always try to support students</p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer read-more">
                        <a href="#">read more<i class="fa fa-long-arrow-right"></i></a>
                    </footer><!-- .entry-footer -->
                </div><!-- .icon-box -->

                <div class="icon-box">
                    <header class="entry-header">
                        <h2 class="entry-title">Total Passed Students</h2>
                    </header><!-- .entry-header -->

                    <div class="icon">
                        <span class="ti-user"> 10k+</span>
                    </div><!-- .icon -->

                    <div class="entry-content">
                        <p>We have 100% of pass record in SSC and PSC. Our students also place in govt. scolarship list </p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer read-more">
                        <a href="#">read more<i class="fa fa-long-arrow-right"></i></a>
                    </footer><!-- .entry-footer -->
                </div><!-- .icon-box -->

                <div class="icon-box">
                    <header class="entry-header">
                        <h2 class="entry-title">Levels</h2>
                    </header><!-- .entry-header -->

                    <div class="icon">
                        <span class="ti-book">  {{ $homeModel->totalClasses }}</span>
                    </div><!-- .icon -->

                    <div class="entry-content">
                        <p>From play group to 10th standard ipsum dolor sit amet consectetur. Lorem ipsum dolor sit.</p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer read-more">
                        <a href="#">read more<i class="fa fa-long-arrow-right"></i></a>
                    </footer><!-- .entry-footer -->
                </div><!-- .icon-box -->

                <div class="icon-box">
                    <header class="entry-header">
                        <h2 class="entry-title">CurrentStudents</h2>
                    </header><!-- .entry-header -->

                    <div class="icon">
                        <span class="ti-user"> {{ $homeModel->totalStudents }}</span>
                    </div><!-- .icon -->

                    <div class="entry-content">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dolorum dolorem minima. </p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer read-more">
                        <a href="#">read more<i class="fa fa-long-arrow-right"></i></a>
                    </footer><!-- .entry-footer -->
                </div><!-- .icon-box -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </div><!-- .icon-boxes -->
    <section class="featured-courses horizontal-column courses-wrap">
        <div class="container">
            <h3><b>Welcome Message from the Principal</b></h3>
            <div style="display: flex; justify-content: space-between;">
                <p style="text-align: justify">
                    Welcome to the official website of Pabna University of Science and Technology (PUST). I hope your visit to this website will give you insights into the many advantages the University has to offer and it will allow you to visit PUST virtually no matter wherever you stay.

                    The present era is the era of science and technology. To keep pace with the progressed world and to meet the global challenges, the government is stepping forward with the promise of establishing Digital Bangladesh. As part of its vision of Digital Bangladesh and with a view to imparting science and technology oriented knowledge, Pabna University of Science and Technology was established in 2008. Since its inception, the University has made steady progress within a very short period of time. The University is growing rapidly in terms of activity, quality, research and reputation. It provides multidisciplinary education with five faculties namely Engineering and Technology, Science, Business Studies, Humanities and Social Science and Life and Earth Science.
                </p>
                <a href="" style="text-align: center">
                    <img src="/front/images/1.jpg" alt="" style="padding: 2%">
                    <h6>Principal, RIMDM</h6>
                </a>
            </div>
            <div>
                <p style="text-align: justify">
                    Now the University has 21 departments under five faculties. Through creating and disseminating knowledge, PUST is trying to promote excellence in higher education by producing skilled manpower and enlightened citizen based on science and technology. Each and every member of this University is working hard to ensure quality education and thereby to accomplish its mission – producing quality graduates to meet the national and global challenges. As a Vice-Chancellor of this university, I dream of producing qualitative and research oriented manpower to solve the existing, long term and newly arisen problems that the country faces every day.
                    I strongly believe that after completing their education, the PUST graduates will be enlightened citizens and turn into assets for the country and will be able to play a significant role in establishing a Digital Bangladesh and Bangabandhu’s ‘Sonar Bangla’ free from hunger, poverty and corruption.

                    I seek your wholehearted cooperation to discharge the noble responsibility that has been assigned to me to improve this University further to attain a sustainable development that would be dedicated to the enlightenment of the people all over the country.
                </p>
                <p class="wellcome_msg">
                    Md. Ashfaq Ali Khan<br>
                    <small>Honorable Principal <br> Rongmala Islamia Mohila Dakhil Madrasa</small>
                </p>
            </div>
        </div><!-- .container -->
        <hr>
    </section><!-- .courses-wrap -->

    <section class="featured-courses horizontal-column courses-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="heading flex justify-content-between align-items-center">
                        <h2 class="entry-title">Recent Activities</h2>

                        <a class="btn mt-4 mt-sm-0" href="#">view all</a>
                    </header><!-- .heading -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6">
                    <div class="course-content flex flex-wrap justify-content-between align-content-lg-stretch">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="/front/images/1.jpg" alt=""></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <div class="course-ratings flex align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div><!-- .course-ratings -->

                                <h2 class="entry-title"><a href="#">The Complete Android Developer Course</a></h2>

                                <div class="entry-meta flex flex-wrap align-items-center">
                                    <div class="course-author"><a href="#">Ms. Lara Croft </a></div>

                                    <div class="course-date">July 21, 2018</div>
                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    <span class="free-cost">Free</span>
                                </div><!-- .course-cost -->
                            </footer><!-- .entry-footer -->
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6">
                    <div class="course-content flex flex-wrap justify-content-between align-content-lg-stretch">
                        <figure class="course-thumbnail">
                            <a href="#"><img src="/front/images/2.jpg" alt=""></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="course-content-wrap">
                            <header class="entry-header">
                                <div class="course-ratings flex align-items-center">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-o"></span>

                                    <span class="course-ratings-count">(4 votes)</span>
                                </div><!-- .course-ratings -->

                                <h2 class="entry-title"><a href="#">Learn Photoshop, Web Design & Profitable</a></h2>

                                <div class="entry-meta flex flex-wrap align-items-center">
                                    <div class="course-author"><a href="#">Mr. John Wick</a></div>

                                    <div class="course-date">Aug 21, 2018</div>
                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->

                            <footer class="entry-footer flex justify-content-between align-items-center">
                                <div class="course-cost">
                                    $32 <span class="price-drop">$59</span>
                                </div><!-- .course-cost -->
                            </footer><!-- .entry-footer -->
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .courses-wrap -->

    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 align-content-lg-stretch">
                    <header class="heading">
                        <h2 class="entry-title">About Us</h2>

                        <p>Rongmala Islamia Mohila Dakhil Madrasah is the only madrashah in this locality. This institute is producing talents since 2010. We have highly qualified teachers and unique way of teaching our students. We have so many achievements.</p>
                    </header><!-- .heading -->

                    <div class="entry-content ezuca-stats">
                        <div class="stats-wrap flex flex-wrap justify-content-lg-between">
                            <div class="stats-count">
                                <span>{{ $homeModel->totalStudents }}</span>
                                <p>STUDENTS LEARNING</p>
                            </div><!-- .stats-count -->

                            <div class="stats-count">
                                <span>{{ $homeModel->totalClasses }}</span>
                                <p>ACTIVE Class Level</p>
                            </div><!-- .stats-count -->

                            <div class="stats-count">
                                <span>{{ $homeModel->totalTeachers }}</span>
                                <p>Teachers</p>
                            </div><!-- .stats-count -->

                            <div class="stats-count">
                                50<span>+</span>
                                <p>achievements</p>
                            </div><!-- .stats-count -->
                        </div><!-- .stats-wrap -->
                    </div><!-- .ezuca-stats -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6 flex align-content-center mt-5 mt-lg-0">
                    <div class="ezuca-video position-relative">
                        <img src="/front/images/mainBG.jpg" alt="">
                    </div><!-- .ezuca-video -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .about-section -->

    <section class="testimonial-section">
        <!-- Swiper -->
        <div class="swiper-container testimonial-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6 order-2 order-lg-1 flex align-items-center mt-5 mt-lg-0">
                                <figure class="user-avatar">
                                    <img src="/front/images/user-1.jpg" alt="">
                                </figure><!-- .user-avatar -->
                            </div><!-- .col -->

                            <div class="col-12 col-lg-6 order-1 order-lg-2 content-wrap h-100">
                                <div class="entry-content">
                                    <p>Together as teachers, students and universities we can help make this education available for everyone.</p>
                                </div><!-- .entry-content -->

                                <div class="entry-footer">
                                    <h3 class="testimonial-user">Russell Stephens - <span>University in UK</span></h3>
                                </div><!-- .entry-footer -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .swiper-slide -->

                <div class="swiper-slide">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6 order-2 order-lg-1 flex align-items-center mt-5 mt-lg-0">
                                <figure class="user-avatar">
                                    <img src="/front/images/user-2.jpg" alt="">
                                </figure><!-- .user-avatar -->
                            </div><!-- .col -->

                            <div class="col-12 col-lg-6 order-1 order-lg-2 content-wrap h-100">
                                <div class="entry-content">
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div><!-- .entry-content -->

                                <div class="entry-footer">
                                    <h3 class="testimonial-user">Robert Stephens - <span>University in Oxford</span></h3>
                                </div><!-- .entry-footer -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .swiper-slide -->

                <div class="swiper-slide">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6 flex order-2 order-lg-1 align-items-center mt-5 mt-lg-0">
                                <figure class="user-avatar">
                                    <img src="/front/images/user-3.jpg" alt="">
                                </figure><!-- .user-avatar -->
                            </div><!-- .col -->

                            <div class="col-12 col-lg-6 order-1 order-lg-2 content-wrap h-100">
                                <div class="entry-content">
                                    <p>Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                                </div><!-- .entry-content -->

                                <div class="entry-footer">
                                    <h3 class="testimonial-user">James Stephens - <span>University in Cambridge</span></h3>
                                </div><!-- .entry-footer -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .swiper-slide -->
            </div><!-- .swiper-wrapper -->

            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                        <div class="swiper-pagination position-relative flex justify-content-center align-items-center"></div>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .testimonial-slider -->
    </section><!-- .testimonial-section -->

    <section class="featured-courses vertical-column courses-wrap">
        <div class="container">
            <div class="row mx-m-25">
                <div class="col-12 px-25">
                    <header class="heading flex flex-wrap justify-content-between align-items-center">
                        <h2 class="entry-title">Our Class Level</h2>
                    </header><!-- .heading -->
                </div><!-- .col -->

                @foreach ($homeModel->classes as $class)
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
                                    <div class="course-date">{{ count($class->Subjects )}}</div>
                                </div><!-- .course-date -->
                            </header><!-- .entry-header -->
                        </div><!-- .course-content-wrap -->
                    </div><!-- .course-content -->
                </div><!-- .col -->
                @endforeach

                <div class="col-12 px-25 flex justify-content-center">
                    <a class="btn" href="{{ Route('classes') }}">view all classes</a>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .courses-wrap -->

    <section class="latest-news-events">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="heading flex justify-content-between align-items-center">
                        <h2 class="entry-title">Latest Notices</h2>
                    </header><!-- .heading -->
                </div><!-- .col -->

                @foreach ($homeModel->recentNotices as $notice)
                <div class="col-12 col-lg-6">
                    <div class="featured-event-content">
                        <figure class="event-thumbnail position-relative m-0">
                            <a href="{{ Route('notice.details', ['notice' => $notice->id]) }}"> <embed src="{{$notice->file}}" width="500px" height="400px" /></a>
                        </figure><!-- .event-thumbnail -->

                        <header class="entry-header flex flex-wrap align-items-center">
                            <h2 class="entry-title"><a href="{{ Route('notice.details', ['notice' => $notice->id]) }}">{{$notice->heading}}</a></h2>

                            <div class="event-duration"><i class="fa fa-calendar"></i>{{ date('Y-m-d', strtotime($notice->created_at ))}}</div>
                        </header><!-- .entry-header -->
                    </div><!-- .featured-event-content -->
                </div><!-- .col -->
                @endforeach
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .latest-news-events -->
<hr>
    @endsection
