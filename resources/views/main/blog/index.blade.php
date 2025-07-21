@extends('layout.main')

@section('content')

<body>
    @include('includes.main.loading')
    <!-- ./ preloader -->

    @include('includes.main.header')

    <div id="popup-search-box">
        <div class="box-inner-wrap d-flex align-items-center">
            <form id="form" action="#" method="get" role="search">
                <input id="popup-search" type="text" name="s" placeholder="Type keywords here...">
            </form>
            <div class="search-close"><i class="fa-sharp fa-regular fa-xmark"></i></div>
        </div>
    </div>
    <!-- /#popup-search-box -->

    <div id="sidebar-area" class="sidebar-area">
        <button class="sidebar-trigger close">
            <svg
                class="sidebar-close"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px"
                y="0px"
                width="16px"
                height="12.7px"
                viewBox="0 0 16 12.7"
                style="enable-background: new 0 0 16 12.7"
                xml:space="preserve">
                <g>
                    <rect
                        x="0"
                        y="5.4"
                        transform="matrix(0.7071 -0.7071 0.7071 0.7071 -2.1569 7.5208)"
                        width="16"
                        height="2"></rect>
                    <rect
                        x="0"
                        y="5.4"
                        transform="matrix(0.7071 0.7071 -0.7071 0.7071 6.8431 -3.7929)"
                        width="16"
                        height="2"></rect>
                </g>
            </svg>
        </button>
        <div class="side-menu-content">
            <div class="side-menu-logo">
                <a href="index.html"><img src="assets/img/logo/logo-2.png" alt="logo"></a>
            </div>
            <div class="side-menu-wrap"></div>
            <div class="side-menu-about">
                <div class="side-menu-header">
                    <h3>About Us</h3>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud nisi ut aliquip ex ea commodo consequat.</p>
                <a href="contact.html" class="bz-primary-btn">Contact Us</a>
            </div>
            <div class="side-menu-contact">
                <div class="side-menu-header">
                    <h3>Contact Us</h3>
                </div>
                <ul class="side-menu-list">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Valentin, Street Road 24, New York, </p>
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        <a href="tel:+000123456789">+000 123 (456) 789</a>
                    </li>
                    <li>
                        <i class="fas fa-envelope-open-text"></i>
                        <a href="mailto:runokcontact@gmail.com">bizancontact@gmail.com</a>
                    </li>
                </ul>
            </div>
            <ul class="side-menu-social">
                <li class="facebook"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li class="instagram"><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li class="behance"><a href="#"><i class="fab fa-behance"></i></a></li>
                <li class="g-plus"><a href="#"><i class="fab fa-fab fa-google-plus"></i></a></li>
            </ul>
        </div>
    </div>
    <!--/.sidebar-area-->

    <section class="page-header-pro">
        {{-- L'image de fond est appliquée via CSS pour plus de flexibilité --}}
        <div class="page-header-overlay"></div>
        <div class="container">
            <div class="page-header-content-pro" data-aos="fade-up">
                <h1 class="title-pro">Blog</h1>

                {{-- Utilisation d'une structure sémantique pour le fil d'Ariane --}}
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb-pro">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- ./ page-header -->

    <section class="blog-section pt-120 pb-120 fade-wrapper">
        <div class="container">
            <div class="row gy-lg-0 gy-5">
                <div class="col-lg-8 col-md-12">

                    @foreach ($blogs as $blog)
                    <div class="post-card post-inner fade-top">
                        <a href="{{ route('blogs.show', $blog->id) }}">
                            <div class="post-thumb">
                                <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('assets/images/blog.jpg') }}" alt="{{ $blog->title }}">

                            </div>
                        </a>
                        <div class="post-content-wrap">
                            <div class="post-content">
                                <ul class="post-meta">
                                    <li><i class="fa-regular fa-calendar"></i>24 Feb, 2024</li>
                                    <li><i class="fa-regular fa-user"></i>by admin</li>
                                </ul>
                                <h3 class="title"><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h3>
                                <p>
                                    {{ $blog->short_description }}
                                </p>
                            </div>
                            <div class="post-bottom">
                                <a class="read-more" href="{{ route('blogs.show', $blog->id) }}">Lire plus<i class="fa-solid fa-chevrons-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <ul class="pagination-wrap mt-20">
                        <li><a href="#">1</a></li>
                        <li><a href="#" class="active">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fa-sharp fa-regular fa-arrow-right"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-widget">
                        <div class="search-form">
                            <form action="contact.php" class="search-form">
                                <input type="text" class="form-control" placeholder="Enter Keyword">
                            </form>
                            <button class="search-btn" type="button">
                                <i class="fa-regular fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Recent Posts</h3>
                        <div class="sidebar-post">
                            <img src="assets/img/blog/sidebar-thumb-1.png" alt="post">
                            <div class="post-content">
                                <ul class="post-meta">
                                    <li><i class="fa-light fa-circle-user"></i>by David Smith</li>
                                </ul>
                                <h3 class="title"><a href="#">Achieving Business Objectives
                                        with Consultancy</a></h3>
                            </div>
                        </div>
                        <div class="sidebar-post">
                            <img src="assets/img/blog/sidebar-thumb-2.png" alt="post">
                            <div class="post-content">
                                <ul class="post-meta">
                                    <li><i class="fa-light fa-circle-user"></i>by David Smith</li>
                                </ul>
                                <h3 class="title"><a href="#">Consultancy Strategies for Adapting to Change</a></h3>
                            </div>
                        </div>
                        <div class="sidebar-post">
                            <img src="assets/img/blog/sidebar-thumb-3.png" alt="post">
                            <div class="post-content">
                                <ul class="post-meta">
                                    <li><i class="fa-light fa-circle-user"></i>by David Smith</li>
                                </ul>
                                <h3 class="title"><a href="#">Role of Business Consultancy in Driving Innovation
                                    </a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h3 class="widget-title">Categories</h3>
                        <ul class="category-list">
                            <li class="active"><a href="#">Cleaning Services <i class="fa-sharp fa-regular fa-arrow-right"></i></a></li>
                            <li><a href="#">IT Services <i class="fa-sharp fa-regular fa-arrow-right"></i></a></li>
                            <li><a href="#">Business Services <i class="fa-sharp fa-regular fa-arrow-right"></i></a></li>
                            <li><a href="#">Strategic Services <i class="fa-sharp fa-regular fa-arrow-right"></i></a></li>
                            <li><a href="#">Branding Services <i class="fa-sharp fa-regular fa-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ blog-section -->
    @include('includes.main.scroll')
    @include('includes.main.footer')

</body>
@endsection