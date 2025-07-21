@extends('layout.main')

@section('content')

<body>
    @include('includes.main.loading')
    <!-- ./ preloader -->

    @include('includes.main.header')

    <br><br><br><br>

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



    <section class="page-header">
        <div class="bg-img" data-background="assets/img/bg-img/page-header-bg.jpg"></div>
        <div class="overlay"></div>
        <div class="shapes">
            <div class="shape shape-1"><img src="assets/img/shapes/pager-header-shape-1.png" alt="shape"></div>
            <div class="shape shape-2"><img src="assets/img/shapes/pager-header-shape-2.png" alt="shape"></div>
        </div>
        <div class="container">
            <div class="page-header-content">
                <h1 class="title">Détails du blog</h1>
                <h4 class="sub-title">
                    <span class="home">
                        <a href="{{ route('index') }}">
                            <span>Accueil</span>
                        </a>
                    </span>
                    <span class="icon">/</span>
                    <span class="inner">
                        <span>Blog</span>
                    </span>
                    <span class="icon">/</span>
                    <span class="inner">
                        <span>Détails du blog</span>
                    </span>
                </h4>
            </div>
        </div>
    </section>
    <!-- ./ page-header -->

    <section class="blog-details pt-130 pb-130">
        <div class="container">
            <div class="row gy-5">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-wrap">
                        <div class="blog-details-img mb-40">
                            <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('assets/images/blog.jpg') }}" alt="{{ $blog->title }}">
                        </div>
                        <ul class="post-meta">
                            <li><i class="fa-regular fa-calendar"></i>24 Feb, 2024</li>
                            <li><i class="fa-regular fa-user"></i>by admin</li>
                        </ul>
                        <div class="blog-details-content">
                            <h2 class="details-title mb-25">{{ $blog->title }}</h2>
                            <p>
                                {{ $blog->short_description }}
                            </p>

                            {!! $blog->long_description !!}
                        </div>

                        <div class="comments-area">
                            <div class="section-heading">
                                <h2 class="section-title">3 Comments</h2>
                            </div>
                            <div class="comment-item">
                                <div class="comment-thumb">
                                    <img src="assets/img/blog/comment-thumb-1.jpg" alt="author">
                                </div>
                                <div class="comment-info">
                                    <div class="comments-meta">
                                        <span>10 Dec, 2023 </span>
                                    </div>
                                    <h3 class="author">Daniel Adam </h3>
                                    <p>
                                        Collaboratively empower multifunctional e-commerce for prospective applications. Seamlessly productivate plug and play markets whereas synergistic scenarios.
                                    </p>
                                    <button class="reply">Reply<i class="fa-solid fa-reply"></i></button>
                                </div>
                            </div>
                            <div class="comment-item item-2">
                                <div class="comment-thumb">
                                    <img src="assets/img/blog/comment-thumb-2.jpg" alt="author">
                                </div>
                                <div class="comment-info">
                                    <div class="comments-meta">
                                        <span>10 Dec, 2023 </span>
                                    </div>
                                    <h3 class="author">Jhon Smith </h3>
                                    <p>
                                        Collaboratively empower multifunctional e-commerce for prospective applications. Seamlessly productivate.
                                    </p>
                                    <button class="reply">Reply<i class="fa-solid fa-reply"></i></button>
                                </div>
                            </div>
                            <div class="comment-item">
                                <div class="comment-thumb">
                                    <img src="assets/img/blog/comment-thumb-3.jpg" alt="author">
                                </div>
                                <div class="comment-info">
                                    <div class="comments-meta">
                                        <span>10 Dec, 2023 </span>
                                    </div>
                                    <h3 class="author">Zenelia Lozhe </h3>
                                    <p>
                                        Collaboratively empower multifunctional e-commerce for prospective applications. Seamlessly productivate plug and play markets whereas synergistic scenarios.
                                    </p>
                                    <button class="reply">Reply<i class="fa-solid fa-reply"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- ./ comments-area -->
                        <div class="form-wrap pt-70">
                            <div class="blog-contact-form">
                                <h2 class="title">Leave A Reply</h2>
                                <div class="request-form">
                                    <form action="mail.php" method="post" id="ajax_contact" class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <div class="form-item">
                                                    <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Your Name">
                                                    <div class="icon"><i class="fa-regular fa-user"></i></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-item">
                                                    <input type="email" id="email" name="email" class="form-control" placeholder="Your Email">
                                                    <div class="icon"><i class="fa-sharp fa-regular fa-envelope"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="form-item message-item">
                                                    <textarea id="message" name="message" cols="30" rows="5" class="form-control address" placeholder="Message"></textarea>
                                                    <div class="icon"><i class="fa-light fa-messages"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="submit-btn">
                                            <button id="submit" class="bz-primary-btn" type="submit">Submit Message</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ./ form-wrap -->
                    </div>
                </div>
                <!-- Sidebar Widgets -->
                <div class="col-lg-4">
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
                        @foreach ($blogs as $blog)
                        @if (!$blog)
                        <p>Aucun autre poste</p>
                        @endif
                        <div class="sidebar-post">
                            <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('assets/images/blog.jpg') }}" alt="{{ $blog->title }}">
                            <div class="post-content">
                                <ul class="post-meta">
                                    <li><i class="fa-light fa-circle-user"></i>by David Smith</li>
                                </ul>
                                <h3 class="title"><a href="#">{{ $blog->title }}</a></h3>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ Blog Details -->
    @include('includes.main.scroll')
    @include('includes.main.footer')
</body>
@endsection