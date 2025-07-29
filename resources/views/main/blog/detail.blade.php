@extends('layout.main')

@section('content')

<body>
    @include('includes.main.loading')
    <!-- ./ preloader -->

    @include('includes.main.header')

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