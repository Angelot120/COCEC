@extends('layout.main')

@section('content')
<body>
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

    <div id="sidebar-area" class="sidebar-area" style="--bz-color-theme-primary: #EC281C">
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
                <a href="index.html"><img src="assets/main/img/logo/logo-3.png" alt="logo"></a>
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

    <div id="preloader">
        <div class="loading" data-loading-text="Bizan"></div>
    </div>
    <!-- ./ preloader -->

    <section class="hero-section-3" data-background="assets/main/img/bg-img/hero-bg-3.jpg">
        <div class="shapes">
            <div class="shape shape-1"><img src="assets/main/img/shapes/hero-bg-shape-2.png" alt="shape"></div>
            <div class="shape shape-2"><img src="assets/main/img/shapes/hero-bg-shape-3.png" alt="shape"></div>
        </div>
        <div class="container-2">
            <div class="hero-content hero-content-3">
                <div class="section-heading mb-40 red-content">
                    <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Most Innovative Business Solution</h4>
                    <h2 class="section-title text-animation-effect">The Best Solution For Run <br>Successful Business</h2>
                    <p>We specialize in providing comprehensive solutions to help businesses tackle their most pressing issues and unlock new opportunities for growth.</p>
                </div>
                <div class="hero-btn-wrap" style="--bz-color-theme-primary: #EC281C">
                    <a href="contact.html" class="bz-primary-btn">Contact With Us <i class="fa-regular fa-arrow-right"></i></a>
                    <a href="service.html" class="bz-primary-btn hero-btn">Our Services</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ hero-section -->

    <section class="promo-section pb-120">
        <div class="container-2">
            <div class="row gy-lg-0 gy-4 justify-content-center fade-wrapper">
                <div class="col-lg-4 col-md-6">
                    <div class="promo-item white-content">
                        <div class="bg-items">
                            <div class="bg-img"><img src="assets/main/img/images/promo-1.png" alt="promo"></div>
                            <div class="overlay"></div>
                            <div class="overlay-2"></div>
                        </div>
                        <h3 class="title">Customized Methodologies</h3>
                        <p>Libero feugiat erat pharetra, que molestie fames leo quam nec magnis malesda. Inceptos sodales magna nunc scelerisque convallis.</p>
                        <a href="about.html" class="bz-primary-btn red-btn">Read Details <i class="fa-regular fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="promo-item white-content">
                        <div class="bg-items">
                            <div class="bg-img"><img src="assets/main/img/images/promo-2.png" alt="promo"></div>
                            <div class="overlay"></div>
                            <div class="overlay-2"></div>
                        </div>
                        <h3 class="title">Integrated Solutions</h3>
                        <p>Libero feugiat erat pharetra, que molestie fames leo quam nec magnis malesda. Inceptos sodales magna nunc scelerisque convallis.</p>
                        <a href="about.html" class="bz-primary-btn red-btn">Read Details <i class="fa-regular fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="promo-item white-content">
                        <div class="bg-items">
                            <div class="bg-img"><img src="assets/main/img/images/promo-3.png" alt="promo"></div>
                            <div class="overlay"></div>
                            <div class="overlay-2"></div>
                        </div>
                        <h3 class="title">Continuous Support</h3>
                        <p>Libero feugiat erat pharetra, que molestie fames leo quam nec magnis malesda. Inceptos sodales magna nunc scelerisque convallis.</p>
                        <a href="about.html" class="bz-primary-btn red-btn">Read Details <i class="fa-regular fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ promo-section -->

    <section class="about-section-3 pb-120">
        <div class="container-2">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img-3 img-reveal">
                        <div class="img-overlay overlay-2"></div>
                        <img src="assets/main/img/images/about-img-5.png" alt="about">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content-3 fade-wrapper">
                        <div class="section-heading red-content mb-20">
                            <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>About Our Company</h4>
                            <h2 class="section-title" data-text-animation data-split="word" data-duration="1">Your Master Business Need More Care</h2>
                        </div>
                        <p class="fade-top">Appropriately empower dynamic leadership skills after business portals. Globally myocardinate interactive supply chains with distinctive quality vectors.</p>
                        <ul class="about-list fade-top">
                            <li><span class="number">01</span>Clear goals and a compelling vision guide decision-making and inspire teams toward a common purpose.</li>
                            <li><span class="number">02</span>Clear goals and a compelling vision guide decision-making and inspire teams toward a common purpose.</li>
                        </ul>
                        <div class="about-btn fade-top">
                            <a href="contact.html" class="bz-primary-btn red-btn">Contact With Us <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ about-section -->

    <section class="service-section-3 pt-120 pb-120">
        <div class="bg-shape"><img src="assets/main/img/shapes/service-bg-shape.png" alt="img"></div>
        <div class="container-2">
            <div class="section-heading text-center red-content">
                <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Our Services</h4>
                <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">We will help to grow business</h2>
            </div>
            <div class="row gy-lg-0 gy-4 justify-content-center fade-wrapper">
                <div class="col-lg-4 col-md-6">
                    <div class="service-item-3 fade-top">
                        <div class="service-thumb">
                            <img class="img-item" src="assets/main/img/service/service-img-1.png" alt="service">
                            <div class="icon"><img src="assets/main/img/icon/service-1.png" alt="icon"></div>
                        </div>
                        <div class="service-content">
                            <h3 class="title"><a href="service-deetails.html">Operational Excellence</a></h3>
                            <p>Your operations and processes are fundamental to your company’s ability to deliver value to get you where you want to.</p>
                            <a href="service-details.html" class="bz-primary-btn red-btn">Read Details <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item-3 fade-top">
                        <div class="service-thumb">
                            <img class="img-item" src="assets/main/img/service/service-img-2.png" alt="service">
                            <div class="icon"><img src="assets/main/img/icon/service-1.png" alt="icon"></div>
                        </div>
                        <div class="service-content">
                            <h3 class="title"><a href="service-deetails.html">Technology Integration</a></h3>
                            <p>Your operations and processes are fundamental to your company’s ability to deliver value to get you where you want to.</p>
                            <a href="service-details.html" class="bz-primary-btn red-btn">Read Details <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item-3 fade-top">
                        <div class="service-thumb">
                            <img class="img-item" src="assets/main/img/service/service-img-3.png" alt="service">
                            <div class="icon"><img src="assets/main/img/icon/service-1.png" alt="icon"></div>
                        </div>
                        <div class="service-content">
                            <h3 class="title"><a href="service-deetails.html">Human Resources</a></h3>
                            <p>Your operations and processes are fundamental to your company’s ability to deliver value to get you where you want to.</p>
                            <a href="service-details.html" class="bz-primary-btn red-btn">Read Details <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ service-section -->

    <section class="cta-section cta-2 pt-120 pb-120">
        <div class="bg-img"><img src="assets/main/img/bg-img/cta-bg.jpg" alt="img"></div>
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container-2">
            <div class="cta-wrap">
                <div class="cta-content">
                    <div class="section-heading mb-0 white-content">
                        <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Book Appointment Now</h4>
                        <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">Get Any Kind Of Consultancy Service <br>Feel Free To Contact Us.</h2>
                    </div>
                </div>
                <div class="cta-btn-wrap">
                    <a href="contact.html" class="bz-primary-btn red-btn">Get Our Service</a>
                    <div class="video-btn">
                        <a
                            class="video-popup venobox"
                            data-autoplay="true"
                            data-vbtype="video"
                            href="https://youtu.be/Hh3MjLaDNG8?feature=shared">
                            <div class="play-btn">
                                <i class="fa-sharp fa-solid fa-play"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ cta-section -->

    <section class="process-section-2 pt-120 pb-120">
        <div class="container-2">
            <div class="section-heading text-center red-content">
                <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>How We Works</h4>
                <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">We will help to grow business</h2>
            </div>
            <div class="row gy-lg-0 gy-4 fade-wrapper">
                <div class="col-lg-3 col-md-6">
                    <div class="process-item fade-top">
                        <div class="process-thumb img-reveal">
                            <div class="img-overlay overlay-2"></div>
                            <img src="assets/main/img/images/process-img-1.png" alt="process">
                            <span>step 1</span>
                        </div>
                        <div class="process-content">
                            <h3 class="title">Assessment</h3>
                            <p>Your company’s ability to deliver value to get you...</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-item fade-top">
                        <div class="process-thumb img-reveal">
                            <div class="img-overlay overlay-2"></div>
                            <img src="assets/main/img/images/process-img-2.png" alt="process">
                            <span>step 2</span>
                        </div>
                        <div class="process-content">
                            <h3 class="title">Strategy Build</h3>
                            <p>Your company’s ability to deliver value to get you...</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-item fade-top">
                        <div class="process-thumb img-reveal">
                            <div class="img-overlay overlay-2"></div>
                            <img src="assets/main/img/images/process-img-3.png" alt="process">
                            <span>step 3</span>
                        </div>
                        <div class="process-content">
                            <h3 class="title">Implementation</h3>
                            <p>Your company’s ability to deliver value to get you...</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="process-item fade-top">
                        <div class="process-thumb img-reveal">
                            <div class="img-overlay overlay-2"></div>
                            <img src="assets/main/img/images/process-img-4.png" alt="process">
                            <span>step 4</span>
                        </div>
                        <div class="process-content">
                            <h3 class="title">Monitoring</h3>
                            <p>Your company’s ability to deliver value to get you...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ process-section -->

    <section class="strength-section">
        <div class="bg-item">
            <div class="bg-img" data-background="assets/main/img/bg-img/strength-bg.png"></div>
            <div class="overlay"></div>
            <div class="shapes">
                <div class="shape"><img src="assets/main/img/shapes/strength-shape-1.png" alt="img"></div>
                <div class="shape-2"></div>
            </div>
            <div class="strength-mask-img">
                <div class="mask-overlay"></div>
                <img src="assets/main/img/images/strength-img-1.png" alt="img">
            </div>
        </div>
        <div class="container-2">
            <div class="row strength-wrap fade-wrapper">
                <div class="col-lg-6 col-md-12">
                    <div class="strength-content pt-120 pb-120">
                        <div class="section-heading mb-20 white-content red-content">
                            <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Team Strength</h4>
                            <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">Meet The Amazing Bizan <br>Success Stats</h2>
                        </div>
                        <p class="fade-top">Energetically vesiculate an expanded array of meta-services after cross-media strategic theme areas. Interactively simplify interactive customer service before fully tested relationship parallel task high standards...</p>
                        <div class="strength-items">
                            <div class="strength-item fade-top">
                                <h3 class="title"><span class="odometer" data-count="89">0</span>%</h3>
                                <p>Program Expenditure</p>
                            </div>
                            <div class="strength-item fade-top">
                                <h3 class="title"><span class="odometer" data-count="98">0</span>%</h3>
                                <p>Successful transport</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="strength-man">
                        <img class="men" src="assets/main/img/images/strength-man.png" alt="man">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ process-section -->

    <section class="team-section-3 pt-120 pb-120">
        <div class="container-2">
            <div class="section-heading text-center red-content">
                <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Team Members</h4>
                <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">Meet The Expert Team Members</h2>
            </div>
            <div class="row gy-xl-0 gy-4 justify-content-center fade-wrapper">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-card fade-top">
                        <div class="overlay"></div>
                        <div class="team-member">
                            <img src="assets/main/img/team/team-5.png" alt="png">
                        </div>
                        <div class="team-content">
                            <h4 class="title"><a href="team-details.html">Daniel Matthew</a></h4>
                            <span>Sr. Marketer</span>
                        </div>
                        <div class="hover-content-wrap">
                            <div class="hover-content">
                                <h4 class="title"><a href="team-details.html">Daniel Matthew</a></h4>
                                <span>Sr. Marketer</span>
                                <p>Global business consultancy serves as a strategic partner and trusted advisor to organizations navigating the complexities of international commerce.</p>
                                <ul class="team-social">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="google"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#" class="behance"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li><a href="#" class="pinterest"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-card fade-top">
                        <div class="overlay"></div>
                        <div class="team-member">
                            <img src="assets/main/img/team/team-6.png" alt="png">
                        </div>
                        <div class="team-content">
                            <h4 class="title"><a href="team-details.html">Michael Robert</a></h4>
                            <span>Sr. Marketer</span>
                        </div>
                        <div class="hover-content-wrap">
                            <div class="hover-content">
                                <h4 class="title"><a href="team-details.html">Michael Robert</a></h4>
                                <span>Sr. Marketer</span>
                                <p>Global business consultancy serves as a strategic partner and trusted advisor to organizations navigating the complexities of international commerce.</p>
                                <ul class="team-social">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="google"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#" class="behance"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li><a href="#" class="pinterest"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-card fade-top">
                        <div class="overlay"></div>
                        <div class="team-member">
                            <img src="assets/main/img/team/team-7.png" alt="png">
                        </div>
                        <div class="team-content">
                            <h4 class="title"><a href="team-details.html">Thomas Anthony</a></h4>
                            <span>Sr. Marketer</span>
                        </div>
                        <div class="hover-content-wrap">
                            <div class="hover-content">
                                <h4 class="title"><a href="team-details.html">Thomas Anthony</a></h4>
                                <span>Sr. Marketer</span>
                                <p>Global business consultancy serves as a strategic partner and trusted advisor to organizations navigating the complexities of international commerce.</p>
                                <ul class="team-social">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="google"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#" class="behance"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li><a href="#" class="pinterest"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-card fade-top">
                        <div class="overlay"></div>
                        <div class="team-member">
                            <img src="assets/main/img/team/team-8.png" alt="png">
                        </div>
                        <div class="team-content">
                            <h4 class="title"><a href="team-details.html">Mark Thomas</a></h4>
                            <span>Sr. Marketer</span>
                        </div>
                        <div class="hover-content-wrap">
                            <div class="hover-content">
                                <h4 class="title"><a href="team-details.html">Mark Thomas</a></h4>
                                <span>Sr. Marketer</span>
                                <p>Global business consultancy serves as a strategic partner and trusted advisor to organizations navigating the complexities of international commerce.</p>
                                <ul class="team-social">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="google"><i class="fab fa-behance"></i></a></li>
                                    <li><a href="#" class="behance"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a></li>
                                    <li><a href="#" class="pinterest"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ team-section -->

    <section class="cta-section-3">
        <div class="container-2">
            <div class="cta-wrap-3">
                <div class="shapes">
                    <div class="shape-1">
                        <img src="assets/main/img/shapes/cta-shape-1.png" alt="cta">
                    </div>
                    <div class="shape-2">
                        <img src="assets/main/img/shapes/cta-shape-2.png" alt="cta">
                    </div>
                </div>
                <div class="cta-mask-img">
                    <div class="overlay"></div>
                    <img src="assets/main/img/images/cta-img-1.png" alt="cta">
                </div>
                <h3 class="title">Open Positions</h3>
                <p>Interactively simplify interactive customer service before fully <br> tested relationship parallel task high standards...</p>
            </div>
        </div>
    </section>
    <!-- ./ cta-section -->

    <section class="testimonial-section-3 overflow-hidden pb-120" data-background="assets/img/bg-img/testi-bg-2.png">
        <div class="container-2">
            <div class="section-heading text-center red-content">
                <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Clients Feedbacks</h4>
                <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">Amazing Feedback Say <br>About Services</h2>
            </div>
            <div class="testi-carousel-2 swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testi-item-2">
                            <div class="testi-top">
                                <div class="testi-author">
                                    <img src="assets/main/img/testi/testi-author-1.png" alt="testi">
                                    <h3 class="name">Benjamin William <span>Manager, IIT Docs</span></h3>
                                </div>
                                <ul class="review">
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                            <p>We engaged with Bizan to help us navigate a challenging period of growth and expansion. Their team provided invaluable insights, strategic guidance.”</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-item-2">
                            <div class="testi-top">
                                <div class="testi-author">
                                    <img src="assets/main/img/testi/testi-author-2.png" alt="testi">
                                    <h3 class="name">Alex Doremon <span>Manager, IIT Docs</span></h3>
                                </div>
                                <ul class="review">
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                            <p>We engaged with Bizan to help us navigate a challenging period of growth and expansion. Their team provided invaluable insights, strategic guidance.”</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testi-item-2">
                            <div class="testi-top">
                                <div class="testi-author">
                                    <img src="assets/main/img/testi/testi-author-3.png" alt="testi">
                                    <h3 class="name">Richard Michael <span>Manager, IIT Docs</span></h3>
                                </div>
                                <ul class="review">
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                            <p>We engaged with Bizan to help us navigate a challenging period of growth and expansion. Their team provided invaluable insights, strategic guidance.”</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination" style="--bz-color-theme-primary: #EC281C"></div>
            </div>
        </div>
    </section>
    <!-- ./ testimonial-section -->

    <section class="blog-section-3 pt-120 pb-120">
        <div class="container-2">
            <div class="blog-top heading-space">
                <div class="section-heading red-content mb-0">
                    <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Our Blog Posts</h4>
                    <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">Insights from our experts & <br>newsz from the industry</h2>
                </div>
                <a href="blog-grid.html" class="bz-primary-btn red-btn">View All Posts <i class="fa-regular fa-arrow-right"></i></a>
            </div>
            <div class="row gy-lg-0 gy-4 fade-wrapper">
                <div class="col-md-6">
                    <div class="post-card-3 fade-top" style="--bz-color-theme-primary: #EC281C">
                        <div class="post-thumb img-reveal">
                            <div class="img-overlay"></div>
                            <img src="assets/main/img/blog/post-6.png" alt="post">
                        </div>
                        <div class="post-content">
                            <ul class="post-meta">
                                <li><i class="fa-regular fa-calendar"></i>24 Feb, 2024</li>
                                <li><i class="fa-regular fa-user"></i>by admin</li>
                            </ul>
                            <h3 class="title"><a href="blog-details.html">The Transformative Journey of Crafting Unique and Impactful Brand</a></h3>
                            <a href="blog-details.html" class="blog-btn"><i class="fa-regular fa-arrow-right"></i>Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="post-card-3 fade-top" style="--bz-color-theme-primary: #EC281C">
                        <div class="post-thumb img-reveal">
                            <div class="img-overlay"></div>
                            <img src="assets/main/img/blog/post-7.jpg" alt="post">
                        </div>
                        <div class="post-content">
                            <ul class="post-meta">
                                <li><i class="fa-regular fa-calendar"></i>24 Feb, 2024</li>
                                <li><i class="fa-regular fa-user"></i>by admin</li>
                            </ul>
                            <h3 class="title"><a href="blog-details.html">The Transformative Journey of Crafting Unique and Impactful Brand</a></h3>
                            <a href="blog-details.html" class="blog-btn"><i class="fa-regular fa-arrow-right"></i>Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ blog-section -->

    <div class="sponsor-section pb-120">
        <div class="container">
            <h3 class="sponsor-text-wrap">
                <span></span>
                <span class="sponsor-text">We Have THe 200+ Trusted Companies Who are trusting Bizan</span>
                <span></span>
            </h3>
            <div class="sponsor-carousel swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="assets/main/img/sponsor/sponsor-1.png" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="assets/main/img/sponsor/sponsor-2.png" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="assets/main/img/sponsor/sponsor-3.png" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="assets/main/img/sponsor/sponsor-4.png" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="assets/main/img/sponsor/sponsor-5.png" alt="sponsor"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ sponsor-section -->
    @include('includes.main.footer')

</body>