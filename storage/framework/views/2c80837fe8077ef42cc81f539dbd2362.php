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
                                <a href="<?php echo e(route("index")); ?>">
                                    <img src="<?php echo e(URL::asset('assets/images/Logo.png')); ?>" alt="logo">
                                </a>
                            </div>
                            <div class="header-menu-wrap">
                                <div class="mobile-menu-items">
                                    <ul>
                                        <li><a href="<?php echo e(route("index")); ?>">Accueil</a></li>
                                        <!-- <li class="menu-item-has-children">
                                            <a href="service.html">Services</a>
                                            <ul>
                                                <li><a href="service.html">Service</a></li>
                                                <li><a href="service-details.html">Service Details</a></li>
                                            </ul>
                                        </li> -->
                                        <li><a href="<?php echo e(route("products")); ?>">Produits</a></li>
                                        <li><a href="<?php echo e(route("blogs")); ?>">Blog</a></li>
                                        <li><a href="<?php echo e(route("agencies")); ?>">agences</a></li>
                                        <!-- <li class="menu-item-has-children">
                                            <a href="">Blog</a>
                                            <ul>
                                                <li><a href="blog-grid.html"> Grid</a></li>
                                                <li><a href="blog-grid-2.html">Blog list</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li> -->

                                        <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>

                                        <li class="menu-item-has-children">
                                            <a href="#">Autres</a>
                                            <ul>
                                                <li><a href="<?php echo e(route('career')); ?>">Carrière & Emploi</a></li>
                                                <li><a href="<?php echo e(route('about')); ?>">À propos</a></li>
                                                <li><a href="<?php echo e(route('main.finance')); ?>">Finance Digitale</a></li>
                                                <li><a href="<?php echo e(route('main.faq')); ?>">Faq</a></li>
                                                <li><a href="https://www.ebindoo.com/" target="_blank">Compte en ligne</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.header-menu-wrap -->
                        </div>
                        <div class="header-right-wrap">
                            <div class="header-right">
                                <a href="<?php echo e(route('main.account')); ?>" class="bz-primary-btn">Ouvrir un compte</a>
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
                    <a href="<?php echo e(route("index")); ?>"><img src="<?php echo e(URL::asset('assets/images/Logo.png')); ?>" alt="logo"></a>
                </div>
                <div class="side-menu-wrap"></div>
                <div class="side-menu-about">
                    <div class="side-menu-header">
                        <h3>À Propos</h3>
                    </div>
                    
                    <p class="text-justify">La COCEC est votre partenaire financier de confiance, dédié à la réussite de ses membres. Nous offrons des services accessibles et innovants pour accompagner vos projets et améliorer vos conditions de vie.</p>
                    <a href="<?php echo e(route('contact')); ?>" class="bz-primary-btn">Contactez-nous</a>
                </div>
                <div class="side-menu-contact">
                    <div class="side-menu-header">
                        <h3>Contactez-nous</h3>
                    </div>
                    <ul class="side-menu-list">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <p>Quartier KANYIKOPE à 50m du Lycée FOLLY-BEBE en allant vers KAGOME </p>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <a href="tel:+22822270551">(00228) 22 27 05 51 / 98 42 24 73</a>
                        </li>
                        <li>
                            <i class="fas fa-envelope-open-text"></i>
                            <a href="mailto:cocec@cocectogo.org">cocec@cocectogo.org</a>
                        </li>
                    </ul>
                </div>
                
                <ul class="side-menu-social">
                    <li class="facebook"><a href="https://www.facebook.com/COCEC-105458737978835"><i class="fab fa-facebook-f"></i></a></li>
                    
                    <li class="whatsapp"><a href="https://wa.me/22891126471" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                </ul>
            </div>
        </div>
        <!--/.sidebar-area--><?php /**PATH C:\Users\user\Desktop\Microfinance\COCEC\resources\views/includes/main/header.blade.php ENDPATH**/ ?>