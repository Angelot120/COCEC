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
                <h1 class="title">Contact Us</h1>
                <h4 class="sub-title">
                    <span class="home">
                        <a href="index.html">
                            <span>Home</span>
                        </a>
                    </span>
                    <span class="icon">/</span>
                    <span class="inner">
                        <span>Contact Us</span>
                    </span>
                </h4>
            </div>
        </div>
    </section>
    <!-- ./ page-header -->

    <section class="contact-section pt-130 pb-130">
        <div class="container">
            <div class="row gy-lg-0 gy-5">
                <div class="col-lg-7">
                    <div class="blog-contact-form">
                        <h2 class="title mb-0">Comment peut-ont vous aider ?</h2>
                        <p class="mb-30 mt-10">Fill-up The Form and Message us of your amazing question</p>
                        <div class="request-form">
                            <form action="mail.php" method="post" id="ajax_contact" class="form-horizontal">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-item">
                                            <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Votre Nom Complet">
                                            <div class="icon"><i class="fa-regular fa-user"></i></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-item">
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Votre Email">
                                            <div class="icon"><i class="fa-sharp fa-regular fa-envelope"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-item">
                                            <div class="nice-select select-control form-control country" tabindex="0"><span class="current">Select Subject</span>
                                                <ul class="list">
                                                    <li data-value="" class="option selected focus">Sélectionnez un sujet</li>
                                                    <li data-value="vdt" class="option">Plan One</li>
                                                    <li data-value="can" class="option">Plan Two</li>
                                                    <li data-value="uk" class="option">Plan Three</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-item message-item">
                                            <textarea id="message" name="message" cols="30" rows="5" class="form-control address" placeholder="Votre Méssage ici"></textarea>
                                            <div class="icon"><i class="fa-light fa-messages"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-btn">
                                    <button id="submit" class="bz-primary-btn" type="submit">Envoyer le message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="contact-content">
                        <div class="contact-top">
                            <h3 class="title">Office Information</h3>
                            <p>Completely recapitalize 24/7 communities via standards compliant metrics whereas.</p>
                        </div>
                        <div class="contact-list">
                            <div class="list-item">
                                <div class="icon">
                                    <i class="fa-sharp fa-solid fa-phone"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">Numéro de Téléphone & Email</h4>
                                    <span><a href="tel:+22822270551">(00228) 22 27 05 51 /</a><a href="tel:+22898422473">98 42 24 73</a></span>
                                    <span><a href="mailto:cocec@cocectogo.org">cocec@cocectogo.org</a></span>
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="icon">
                                    <i class="fa-sharp fa-solid fa-location-dot"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">Notre Siège Social</h4>
                                    <p>Quartier KANYIKOPE à 50m du Lycée FOLLY-BEBE <br>en allant vers KAGOME</p>
                                </div>
                            </div>
                            <div class="list-item">
                                <div class="icon">
                                    <i class="fa-sharp fa-solid fa-clock"></i>
                                </div>
                                <div class="content">
                                    <h4 class="title">Heures d'ouvertures</h4>
                                    <span>Lundi - Vendredi: 09:00 - 20:00</span>
                                    <span>Samedi & Dimanche: 10:30 - 22:00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ contact-section -->
    @include('includes.main.scroll')
    @include('includes.main.footer')
</body>
@endsection