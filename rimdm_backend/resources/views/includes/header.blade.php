<header class="site-header">
    <div class="top-header-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                    <div class="header-bar-email d-flex align-items-center">
                        <i class="fa fa-envelope"></i><a href="#">rimdmadrasah@gmail.com</a>
                    </div><!-- .header-bar-email -->

                    <div class="header-bar-text lg-flex align-items-center">
                        <p><i class="fa fa-phone"></i>01629846484 </p>
                    </div><!-- .header-bar-text -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                    <div class="header-bar-search">
                        <form class="flex align-items-stretch">
                            <input type="search" placeholder="What would you like to learn?">
                            <button type="submit" value="" class="flex justify-content-center align-items-center"><i class="fa fa-search"></i></button>
                        </form>
                    </div><!-- .header-bar-search -->

                    <div class="header-bar-menu">
                        <ul class="flex justify-content-center align-items-center py-2 pt-md-0">
                            <li><a href="#">Apply</a></li>
                            <li><a href="#">Login</a></li>
                        </ul>
                    </div><!-- .header-bar-menu -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </div><!-- .top-header-bar -->

    <div class="nav-bar">
        <div class="container">
            <div class="row">
                <div class="col-9 col-lg-3">
                    <div class="site-branding">
                        <h1 class="site-title"><a href="{{ Route('index') }}" rel="home"><span>{{ config('app.name') }}</span></a></h1>
                    </div><!-- .site-branding -->
                </div><!-- .col -->

                <div class="col-3 col-lg-9 flex justify-content-end align-content-center">
                    <nav class="site-navigation flex justify-content-end align-items-center">
                        <ul class="flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                            <li class="current-menu-item"><a href="index.html">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Classes</a></li>
                            <li><a href="#">Teachers</a></li>
                            <li><a href="#">Notice</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>

                        <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- .hamburger-menu -->

                        <div class="header-bar-cart">
                            <a href="#" class="flex justify-content-center align-items-center"><span aria-hidden="true" class="icon_bag_alt"></span></a>
                        </div><!-- .header-bar-search -->
                    </nav><!-- .site-navigation -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .nav-bar -->
</header><!-- .site-header -->
