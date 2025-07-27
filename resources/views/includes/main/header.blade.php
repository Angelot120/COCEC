        <!-- header-area-start -->
        <header class="header header-3 sticky-active" style="--bz-color-theme-primary: #EC281C">
            <div class="overlay"></div>
            <div class="top-bar">
                <div class="container-2">
                    <div class="top-bar-inner">
                        <ul class="top-bar-list">
                            <li><i class="fa-sharp fa-regular fa-phone"></i><a href="tel:+22822270551">(+228) 22 27 05 51</a></li>
                            <li><i class="fa-sharp fa-regular fa-location-dot"></i><span>KANYIKOPE près du Lycée FOLLY-BEBE</span></li>
                            <li><i class="fa-sharp fa-regular fa-envelope"></i><a href="mailto:cocec@cocectogo.org">cocec@cocectogo.org</a></li>
                        </ul>
                        <ul class="social-list">
                            <li>
                                <a href="https://www.facebook.com/COCEC-105458737978835" target="_blank">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.me/22891126471" target="_blank">
                                    <i class="fa-brands fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="primary-header">
                <div class="container-2">
                    <div class="primary-header-inner">
                        <div class="inner-left">
                            <div class="header-logo">
                                <a href="{{ route("index") }}">
                                    <img src="{{ URL::asset('assets/images/Logo.png') }}" alt="logo">
                                </a>
                            </div>
                            <div class="header-menu-wrap">
                                <div class="mobile-menu-items">
                                    <ul>
                                        <li><a href="{{ route("index") }}">Accueil</a></li>
                                        <!-- <li class="menu-item-has-children">
                                            <a href="service.html">Services</a>
                                            <ul>
                                                <li><a href="service.html">Service</a></li>
                                                <li><a href="service-details.html">Service Details</a></li>
                                            </ul>
                                        </li> -->
                                        <li><a href="{{ route("products") }}">Produits</a></li>
                                        <li><a href="{{ route("blogs") }}">Blog</a></li>
                                        <li><a href="{{ route("agencies") }}">agences</a></li>
                                        <!-- <li class="menu-item-has-children">
                                            <a href="">Blog</a>
                                            <ul>
                                                <li><a href="blog-grid.html"> Grid</a></li>
                                                <li><a href="blog-grid-2.html">Blog list</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li> -->

                                        <li><a href="{{ route('contact') }}">Contact</a></li>

                                        <li class="menu-item-has-children">
                                            <a href="#">Autres</a>
                                            <ul>
                                                <li><a href="{{ route('career') }}">Carrière & Emploi</a></li>
                                                <li><a href="{{ route('about')}}">À propos</a></li>
                                                <li><a href="{{ route('main.finance')}}">Finance Digitale</a></li>
                                                <li><a href="{{ route('main.faq') }}">Faq</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.header-menu-wrap -->
                        </div>
                        <div class="header-right-wrap">
                            <div class="header-right">
                                <a href="{{ route('main.account') }}" class="bz-primary-btn">Ouvrir un compte</a>
                                <div class="sidebar-icon-2">
                                    <button class="sidebar-trigger open">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                            <!-- /.header-right -->
                        </div>
                    </div>
                    <!-- /.primary-header-inner -->
                </div>
            </div>
        </header>
        <!-- /.Main Header -->