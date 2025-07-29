<?php $__env->startSection('content'); ?>

<body>
    <?php echo $__env->make('includes.main.loading', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('includes.main.popup', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- ./ preloader -->

    <?php echo $__env->make('includes.main.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- hero-section-3 -->
    <!-- La classe "swiper" est ajoutée pour l'initialisation JS -->
    <section class="hero-section-3">

        <!-- Les formes restent en arrière-plan global de la section -->
        <div class="shapes">
            <div class="shape shape-1"><img src="<?php echo e(asset('assets/main/img/shapes/hero-bg-shape-2.png')); ?>" alt="forme"></div>
            <div class="shape shape-2"><img src="<?php echo e(asset('assets/main/img/shapes/hero-bg-shape-3.png')); ?>" alt="forme"></div>
        </div>

        <!-- CORRECTION : On groupe tout le carrousel dans un conteneur positionné -->
        <div class="swiper-container-wrapper swiper">

            <!-- Le conteneur obligatoire pour les slides -->
            <div class="swiper-wrapper">

                <!-- SLIDE 1 -->
                <div class="swiper-slide hero-slide-1">
                    <div class="container-2">
                        <div class="hero-content hero-content-3">
                            <div class="section-heading mb-40 red-content">
                                <h4 class="sub-heading"><span class="left-shape"></span>Votre Partenaire Financier</h4>
                                <h2 class="section-title">Des Solutions Financières <br>pour Votre Avenir</h2>
                                <p class="text-justify">La COCEC vous accompagne avec des services d’épargne, de crédit et d’accompagnement personnalisé pour réaliser vos projets et assurer votre sécurité financière.</p>
                            </div>
                            <div class="hero-btn-wrap" style="--bz-color-theme-primary: #EC281C">
                                <a href="<?php echo e(route('contact')); ?>" class="bz-primary-btn">Nous Contacter <i class="fa-regular fa-arrow-right"></i></a>
                                <a href="<?php echo e(route('products')); ?>" class="bz-primary-btn hero-btn">Nos Produits</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 2 -->
                <div class="swiper-slide hero-slide-2">
                    <div class="container-2">
                        <div class="hero-content hero-content-3">
                            <div class="section-heading mb-40 red-content">
                                <h4 class="sub-heading"><span class="left-shape"></span>Crédit & Investissement</h4>
                                <h2 class="section-title">Financez Vos Projets <br>les Plus Ambitieux</h2>
                                <p class="text-justify">Que ce soit pour un projet immobilier, agricole ou entrepreneurial, nos solutions de crédit sont conçues pour vous donner les moyens de réussir.</p>
                            </div>
                            <div class="hero-btn-wrap" style="--bz-color-theme-primary: #EC281C">
                                <a href="<?php echo e(route('contact')); ?>" class="bz-primary-btn">Demander un Crédit <i class="fa-regular fa-arrow-right"></i></a>
                                <a href="<?php echo e(route('products')); ?>" class="bz-primary-btn hero-btn">Explorer les Options</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 3 (contenu identique pour l'exemple) -->
                <div class="swiper-slide hero-slide-3">
                    <div class="container-2">
                        <div class="hero-content hero-content-3">
                            <div class="section-heading mb-40 red-content">
                                <h4 class="sub-heading"><span class="left-shape"></span>Épargne Sécurisée</h4>
                                <h2 class="section-title">Construisez Votre Patrimoine<br>en Toute Confiance</h2>
                                <p class="text-justify">Découvrez nos comptes d'épargne flexibles et rentables pour préparer l'avenir, financer les études de vos enfants ou simplement vous constituer une réserve.</p>
                            </div>
                            <div class="hero-btn-wrap" style="--bz-color-theme-primary: #EC281C">
                                <a href="<?php echo e(route('contact')); ?>" class="bz-primary-btn">Ouvrir un Compte <i class="fa-regular fa-arrow-right"></i></a>
                                <a href="<?php echo e(route('products')); ?>" class="bz-primary-btn hero-btn">Types de Comptes</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Flèches de Navigation -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <!-- Points de Pagination -->
            <div class="swiper-pagination"></div>

        </div>

    </section>
    <!-- ./ hero-section -->

    <!-- promo-section -->
    <section class="promo-section pb-120">
        <div class="container-2">
            <div class="row gy-lg-0 gy-4 justify-content-center fade-wrapper">
                <div class="col-lg-4 col-md-6">
                    <div class="promo-item white-content">
                        <div class="bg-items">
                            <div class="bg-img"><img src="<?php echo e(asset('assets/images/epargne.jpg')); ?>" alt="Épargne"></div>
                            <div class="overlay"></div>
                            <div class="overlay-2"></div>
                        </div>
                        <h3 class="title">Épargne Sécurisée</h3>
                        <p class="text-justify">Épargnez en toute tranquillité avec nos comptes d’épargne flexibles, conçus pour répondre à vos besoins à court et long terme, avec des options comme l’épargne à vue ou à terme.</p>
                        <a href="route('services') }}" class="bz-primary-btn red-btn">En savoir plus <i class="fa-regular fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="promo-item white-content">
                        <div class="bg-items">
                            <div class="bg-img"><img src="<?php echo e(asset('assets/images/credit.jpg')); ?>" alt="Crédit"></div>
                            <div class="overlay"></div>
                            <div class="overlay-2"></div>
                        </div>
                        <h3 class="title">Crédits Adaptés</h3>
                        <p class="text-justify">Financez vos projets avec nos solutions de crédit sur mesure : prêts scolaires, commerciaux, ou agricoles pour soutenir vos ambitions personnelles et professionnelles.</p>
                        <a href="route('services') }}" class="bz-primary-btn red-btn">En savoir plus <i class="fa-regular fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="promo-item white-content">
                        <div class="bg-items">
                            <div class="bg-img"><img src="<?php echo e(asset('assets/images/accompagnement.jpg')); ?>" alt="Services Financiers"></div>
                            <div class="overlay"></div>
                            <div class="overlay-2"></div>
                        </div>
                        <h3 class="title">Accompagnement Financier</h3>
                        <p class="text-justify">Bénéficiez de conseils personnalisés et de services comme le transfert d’argent pour gérer efficacement vos finances avec le soutien de la COCEC.</p>
                        <a href="route('services') }}" class="bz-primary-btn red-btn">En savoir plus <i class="fa-regular fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ promo-section -->

    <section class="about-section-3 pb-120">
        <div class="container-2">
            <div class="row align-items-center">

                <!-- Colonne Image -->
                <div class="col-lg-6">
                    <div class="about-img-3 img-reveal">
                        <div class="img-overlay overlay-2"></div>
                        <img src="<?php echo e(asset('assets/images/director.jpeg')); ?>" alt="about">
                    </div>
                </div>

                <!-- Colonne Contenu -->
                <div class="col-lg-6">
                    <div class="about-content-3 fade-wrapper">
                        <div class="section-heading red-content mb-20">
                            
                            <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Mot du Directeur</h4>
                            <h2 class="section-title" data-text-animation data-split="word" data-duration="1">Bâtir un Avenir Financier Inclusif et Moderne</h2>
                        </div>

                        
                        <p class="fade-top text-justify">
                            Depuis 2001, la COCEC a placé l’amélioration de vos conditions de vie au centre de ses stratégies. Notre plus grande fierté réside dans les témoignages de ceux qui, partis de rien, subviennent aujourd’hui aux besoins de leur famille grâce à notre accompagnement.
                        </p>

                        
                        <ul class="about-list fade-top">
                            <li>
                                <div class="list-icon"><i class="fas fa-rocket"></i></div>
                                <div class="list-text">
                                    <h5>Innovation & Modernité</h5>
                                    <span>Nous intégrons les nouvelles technologies (Mobile Money, Web Banking) pour vous offrir des produits innovants à moindre coût.</span>
                                </div>
                            </li>
                            <li>
                                <div class="list-icon"><i class="fas fa-hands-helping"></i></div>
                                <div class="list-text">
                                    <h5>Confiance & Partenariat</h5>
                                    <span>Avec la confiance renouvelée de nos clients et partenaires, et avec Dieu à nos côtés, nous accomplirons des exploits.</span>
                                </div>
                            </li>
                        </ul>

                        <div class="director-signature-block fade-top">
                            <strong>M. Kokou GABIAM</strong>
                            <span>Le Directeur Général</span>
                        </div>

                        <div class="about-btn fade-top">
                            <a href="<?php echo e(route('about')); ?>" class="bz-primary-btn red-btn">En Savoir Plus <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ./ about-section -->

    <section class="service-section-3 pt-120 pb-120">
        <div class="bg-shape"><img src="<?php echo e(asset('assets/main/img/shapes/service-bg-shape.png')); ?>" alt="img"></div>
        <div class="container-2">
            <div class="section-heading text-center red-content">
                <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Nos Produits Phares</h4>
                <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">Des Solutions Financières Conçues Pour Vous</h2>
            </div>
            <div class="row gy-lg-0 gy-4 justify-content-center fade-wrapper">

                <!-- Produit 1 : Compte d'Épargne -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-item-3 fade-top">
                        <div class="service-thumb">
                            <img class="img-item" src="<?php echo e(asset('assets/images/account1.jpg')); ?>" alt="Épargne">
                            
                            <div class="icon"><i class="fas fa-piggy-bank fa-3x"></i></div>
                        </div>
                        <div class="service-content">
                            <h3 class="title"><a href="">Compte d'Épargne</a></h3>
                            <p class="text-justify">Faites fructifier votre argent en toute sécurité et préparez sereinement votre avenir grâce à nos solutions d'épargne flexibles.</p>
                            <a href="" class="bz-primary-btn red-btn">Découvrir <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Produit 2 : Compte Courant -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-item-3 fade-top">
                        <div class="service-thumb">
                            <img class="img-item" src="<?php echo e(asset('assets/images/account2.jpg')); ?>" alt="Compte Courant">
                            
                            <div class="icon"><i class="fas fa-wallet fa-3x"></i></div>
                        </div>
                        <div class="service-content">
                            <h3 class="title"><a href="">Compte Courant</a></h3>
                            <p class="text-justify">Gérez vos revenus et vos dépenses quotidiennes avec agilité. La solution idéale pour la domiciliation de votre salaire.</p>
                            <a href="" class="bz-primary-btn red-btn">Découvrir <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Produit 3 : Crédits & Financements -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-item-3 fade-top">
                        <div class="service-thumb">
                            <img class="img-item" src="<?php echo e(asset('assets/images/account3.jpg')); ?>" alt="Crédits">
                            
                            <div class="icon"><i class="fas fa-chart-line fa-3x"></i></div>
                        </div>
                        <div class="service-content">
                            <h3 class="title"><a href="">Crédits & Financements</a></h3>
                            <p class="text-justify">Donnez vie à vos projets personnels ou professionnels avec nos solutions de crédit sur-mesure et à des conditions avantageuses.</p>
                            <a href="" class="bz-primary-btn red-btn">Découvrir <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ./ service-section -->

    <section class="cta-section cta-2 pt-120 pb-120">
        <div class="bg-img"><img src="<?php echo e(asset('assets/images/products.jpeg')); ?>" alt="img"></div>
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container-2">
            <div class="cta-wrap">
                <div class="cta-content">
                    <div class="section-heading mb-0 white-content">
                        
                        <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Une Gamme Complète de Produits</h4>
                        <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">De l'épargne à la concrétisation de vos projets, nous avons la solution financière qu'il vous faut.</h2>
                    </div>
                </div>
                <div class="cta-btn-wrap">
                    
                    <a href="" class="bz-primary-btn red-btn">Voir tous les produits</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ cta-section -->

    <section class="process-section-2 pt-120 pb-120">
        <div class="container-2">
            <div class="section-heading text-center red-content">
                
                <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Notre Démarche</h4>
                <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">Votre Parcours vers la Réussite Financière</h2>
            </div>
            <div class="row gy-lg-0 gy-4 fade-wrapper">

                <!-- Étape 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="process-item fade-top">
                        <div class="process-thumb img-reveal">
                            <div class="img-overlay overlay-2"></div>
                            <img src="<?php echo e(asset('assets/main/img/images/process-img-1.png')); ?>" alt="Devenir Membre">
                            <span>Étape 1</span>
                        </div>
                        <div class="process-content">
                            <h3 class="title">Devenez Membre</h3>
                            <p class="text-justify">Ouvrez votre compte en quelques minutes en agence ou en ligne et rejoignez une communauté financière solide.</p>
                        </div>
                    </div>
                </div>

                <!-- Étape 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="process-item fade-top">
                        <div class="process-thumb img-reveal">
                            <div class="img-overlay overlay-2"></div>
                            <img src="<?php echo e(asset('assets/main/img/images/process-img-2.png')); ?>" alt="Épargner">
                            <span>Étape 2</span>
                        </div>
                        <div class="process-content">
                            <h3 class="title">Épargnez & Grandissez</h3>
                            <p class="text-justify">Faites fructifier votre argent en toute sécurité grâce à nos solutions d'épargne flexibles et rentables.</p>
                        </div>
                    </div>
                </div>

                <!-- Étape 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="process-item fade-top">
                        <div class="process-thumb img-reveal">
                            <div class="img-overlay overlay-2"></div>
                            <img src="<?php echo e(asset('assets/main/img/images/process-img-3.png')); ?>" alt="Financer un projet">
                            <span>Étape 3</span>
                        </div>
                        <div class="process-content">
                            <h3 class="title">Financez Vos Projets</h3>
                            <p class="text-justify">Que ce soit pour un projet personnel ou professionnel, nous vous offrons des crédits adaptés avec un accompagnement sur-mesure.</p>
                        </div>
                    </div>
                </div>

                <!-- Étape 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="process-item fade-top">
                        <div class="process-thumb img-reveal">
                            <div class="img-overlay overlay-2"></div>
                            <img src="<?php echo e(asset('assets/main/img/images/process-img-4.png')); ?>" alt="Réussir">
                            <span>Étape 4</span>
                        </div>
                        <div class="process-content">
                            <h3 class="title">Prospérez & Réussissez</h3>
                            <p class="text-justify">Grâce à nos conseils et nos outils digitaux, atteignez vos objectifs et assurez votre indépendance financière.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ./ process-section -->

    <section class="strength-section">
        <div class="bg-item">
            <div class="bg-img" data-background="<?php echo e(asset('assets/images/strength-bg.jpg')); ?>"></div>
            <div class="overlay"></div>
            <div class="shapes">
                <div class="shape">
                    <img src="<?php echo e(asset('assets/main/img/shapes/strength-shape-1.png')); ?>" alt="img">
                </div>
                <div class="shape-2"></div>
            </div>
            <div class="strength-mask-img">
                <div class="mask-overlay"></div>
                <img src="<?php echo e(asset('assets/images/strength-img-1.jpeg')); ?>" alt="img">
            </div>
        </div>
        <div class="container-2">
            <div class="row strength-wrap fade-wrapper">
                <div class="col-lg-6 col-md-12">
                    <div class="strength-content pt-120 pb-120">
                        <div class="section-heading mb-20 white-content red-content">
                            
                            <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Notre Force en Chiffres</h4>
                            <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">Plus qu'une Institution, <br>une Communauté Qui Prospère</h2>
                        </div>
                        
                        <p class="fade-top text-justify">Depuis plus de 20 ans, notre force réside dans la confiance de nos membres et notre engagement indéfectible pour leur réussite financière. Chaque chiffre représente une vie changée, un projet réalisé et une communauté renforcée.</p>
                        <div class="strength-items">
                            
                            <div class="strength-item fade-top">
                                <h3 class="title"><span class="odometer" data-count="95">0</span>%</h3>
                                <p>Taux de Satisfaction Client</p>
                            </div>
                            
                            <div class="strength-item fade-top">
                                <h3 class="title">+<span class="odometer" data-count="50000">0</span></h3>
                                <p>Membres Accompagnés</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="strength-man">
                        <img class="men" src="<?php echo e(asset('assets/images/forces.png')); ?>" alt="man">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ process-section -->

    <section class="team-section-3 pt-120 pb-120">
        <div class="container-2">
            <div class="section-heading text-center red-content">
                
                <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Notre Équipe</h4>
                <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">Des Experts Engagés Pour Votre Réussite</h2>
            </div>
            <div class="row gy-xl-0 gy-4 justify-content-center fade-wrapper">

                <!-- Membre 1 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-card fade-top">
                        <div class="overlay"></div>
                        <div class="team-member">
                            <img src="<?php echo e(asset('assets/images/team.jpg')); ?>" alt="Photo de membre d'équipe">
                        </div>
                        <div class="team-content">
                            <h4 class="title"><a href="#">M. Kokou GABIAM</a></h4>
                            <span>Directeur Général</span>
                        </div>
                        <div class="hover-content-wrap">
                            <div class="hover-content">
                                <h4 class="title"><a href="#">M. Kokou GABIAM</a></h4>
                                <span>Directeur Général</span>
                                <p class="text-justify">Leader visionnaire, il guide la COCEC avec une passion pour l'inclusion financière et un engagement total envers la prospérité de nos membres.</p>
                                <ul class="team-social">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="behance"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#" class="google"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Membre 2 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-card fade-top">
                        <div class="overlay"></div>
                        <div class="team-member">
                            <img src="<?php echo e(asset('assets/images/team.jpg')); ?>" alt="Photo de membre d'équipe">
                        </div>
                        <div class="team-content">
                            <h4 class="title"><a href="#">Adjoa AKOUETE</a></h4>
                            <span>Responsable des Opérations</span>
                        </div>
                        <div class="hover-content-wrap">
                            <div class="hover-content">
                                <h4 class="title"><a href="#">Adjoa AKOUETE</a></h4>
                                <span>Responsable des Opérations</span>
                                <p class="text-justify">Elle assure l'excellence et la fluidité de tous nos services pour vous garantir une expérience client irréprochable au quotidien.</p>
                                <ul class="team-social">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="behance"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#" class="google"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Membre 3 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-card fade-top">
                        <div class="overlay"></div>
                        <div class="team-member">
                            <img src="<?php echo e(asset('assets/images/team.jpg')); ?>" alt="Photo de membre d'équipe">
                        </div>
                        <div class="team-content">
                            <h4 class="title"><a href="#">Koffi LAWSON</a></h4>
                            <span>Responsable du Crédit</span>
                        </div>
                        <div class="hover-content-wrap">
                            <div class="hover-content">
                                <h4 class="title"><a href="#">Koffi LAWSON</a></h4>
                                <span>Responsable du Crédit</span>
                                <p class="text-justify">Expert en financement, il analyse et accompagne vos projets pour vous aider à concrétiser vos ambitions en toute sécurité.</p>
                                <ul class="team-social">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="behance"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#" class="google"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Membre 4 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="team-card fade-top">
                        <div class="overlay"></div>
                        <div class="team-member">
                            <img src="<?php echo e(asset('assets/images/team.jpg')); ?>" alt="Photo de membre d'équipe">
                        </div>
                        <div class="team-content">
                            <h4 class="title"><a href="#">Fati BAMBA</a></h4>
                            <span>Chef d'Agence Principale</span>
                        </div>
                        <div class="hover-content-wrap">
                            <div class="hover-content">
                                <h4 class="title"><a href="#">Fati BAMBA</a></h4>
                                <span>Chef d'Agence Principale</span>
                                <p class="text-justify">Au cœur de notre réseau, elle incarne la proximité et l'écoute, veillant à ce que chaque membre reçoive un conseil personnalisé.</p>
                                <ul class="team-social">
                                    <li><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="behance"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#" class="google"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ./ team-section -->


    <section class="home-agencies-section">
        <div class="container">
            
            <div class="section-heading text-center">
                <h4 class="sub-heading"><span class="left-shape"></span>Notre Réseau</h4>
                <h2>Trouvez un point de service proche de vous</h2>
                <p>Avec un réseau en pleine expansion, la COCEC est toujours à vos côtés. Découvrez nos agences principales.</p>
            </div>

            
            <div class="agency-grid">

                <!-- Carte Agence 1 -->
                <a href="<?php echo e(route('agencies')); ?>" class="mini-agency-card">
                    <div class="card-icon-wrapper">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="card-status">
                        <span class="status-dot open"></span> Ouvert
                    </div>
                    <h3 class="card-title">Siège Social</h3>
                    <p class="card-address">Boulvard Jean-Paul II, face station d'essence, Lomé</p>
                    <span class="card-arrow"><i class="fas fa-arrow-right"></i></span>
                </a>

                <!-- Carte Agence 2 -->
                <a href="<?php echo e(route('agencies')); ?>" class="mini-agency-card">
                    <div class="card-icon-wrapper">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="card-status">
                        <span class="status-dot open"></span> Ouvert
                    </div>
                    <h3 class="card-title">Agence de l'Étoile Rouge</h3>
                    <p class="card-address">Non loin de la Douane, Lomé</p>
                    <span class="card-arrow"><i class="fas fa-arrow-right"></i></span>
                </a>

                <!-- Carte Agence 3 -->
                <a href="<?php echo e(route('agencies')); ?>" class="mini-agency-card">
                    <div class="card-icon-wrapper">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="card-status">
                        <span class="status-dot open"></span> Ouvert
                    </div>
                    <h3 class="card-title">Agence de Kpalimé</h3>
                    <p class="card-address">Route de Lomé, face station d'essence</p>
                    <span class="card-arrow"><i class="fas fa-arrow-right"></i></span>
                </a>

            </div>

            
            <div class="text-center" style="margin-top: 50px;">
                
                
                <a href="<?php echo e(route('agencies')); ?>" class="btn-see-all">
                    Voir toutes nos agences <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
                </a>
            </div>
        </div>
    </section>


    <section class="cta-section-3">
        <div class="container-2">
            <div class="cta-wrap-3">
                <div class="shapes">
                    <div class="shape-1">
                        <img src="<?php echo e(asset('assets/main/img/shapes/cta-shape-1.png')); ?>" alt="cta">
                    </div>
                    <div class="shape-2">
                        <img src="<?php echo e(asset('assets/main/img/shapes/cta-shape-2.png')); ?>" alt="cta">
                    </div>
                </div>
                <div class="cta-mask-img">
                    <div class="overlay"></div>
                    <img src="<?php echo e(asset('assets/images/job-offer.jpg')); ?>" alt="cta">
                </div>

                
                <h3 class="title">Rejoignez Notre Équipe</h3>
                <p>Nous sommes toujours à la recherche de professionnels talentueux et passionnés, <br> désireux de contribuer à notre mission d'inclusion financière.</p>

                
                <div style="margin-top: 30px;">
                    <a href="<?php echo e(route('career')); ?>" class="bz-primary-btn red-btn">Voir les Offres d'Emploi <i class="fa-regular fa-arrow-right"></i></a>
                </div>

            </div>
        </div>
    </section>
    <!-- ./ agencies-section -->

    <section class="testimonial-section-3 overflow-hidden pb-120" data-background="assets/img/bg-img/testi-bg-2.png">
        <div class="container-2">
            <div class="section-heading text-center red-content">
                
                <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Témoignages de nos Membres</h4>
                <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">Leurs Mots, Notre Plus Grande Fierté</h2>
            </div>
            <div class="testi-carousel-2 swiper">
                <div class="swiper-wrapper">

                    <!-- Témoignage 1 -->
                    <div class="swiper-slide">
                        <div class="testi-item-2">
                            <div class="testi-top">
                                <div class="testi-author">
                                    <img src="<?php echo e(asset('assets/main/img/testi/testi-author-1.png')); ?>" alt="Photo d'un membre">
                                    <h3 class="name">Mme Akouvi MENSAH <span>Enseignante & Mère de famille</span></h3>
                                </div>
                                <ul class="review">
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                            <p>Grâce au compte épargne projet de la COCEC, j'ai pu financer les études supérieures de mon fils sans stress. Leur accompagnement a été précieux à chaque étape.</p>
                        </div>
                    </div>

                    <!-- Témoignage 2 -->
                    <div class="swiper-slide">
                        <div class="testi-item-2">
                            <div class="testi-top">
                                <div class="testi-author">
                                    <img src="<?php echo e(asset('assets/main/img/testi/testi-author-2.png')); ?>" alt="Photo d'un membre">
                                    <h3 class="name">M. Koffi SOSSOU <span>Commerçant au grand marché</span></h3>
                                </div>
                                <ul class="review">
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                            <p>Obtenir un crédit pour développer mon commerce a été simple et rapide. L'équipe de la COCEC a vraiment compris mes besoins et m'a fait confiance.</p>
                        </div>
                    </div>

                    <!-- Témoignage 3 -->
                    <div class="swiper-slide">
                        <div class="testi-item-2">
                            <div class="testi-top">
                                <div class="testi-author">
                                    <img src="<?php echo e(asset('assets/main/img/testi/testi-author-3.png')); ?>" alt="Photo d'un membre">
                                    <h3 class="name">Mlle Fati ALI <span>Jeune Entrepreneure</span></h3>
                                </div>
                                <ul class="review">
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                </ul>
                            </div>
                            <p>Avec COCEC Mobile, je gère mes finances directement depuis ma boutique. C'est un gain de temps incroyable qui me permet de me concentrer sur mon business.</p>
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
                    <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Nos actualités</h4>
                    
                    <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">L'actualité financière décryptée <br>par nos experts</h2>
                </div>
                <a href="<?php echo e(route('blogs')); ?>" class="bz-primary-btn red-btn">Voir tous les Posts <i class="fa-regular fa-arrow-right"></i></a>
            </div>
            <div class="row gy-lg-0 gy-4 fade-wrapper">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6">
                    <div class="post-card-3 fade-top" style="--bz-color-theme-primary: #EC281C">
                        <div class="post-thumb img-reveal">
                            <div class="img-overlay"></div>
                            <img src="<?php echo e($blog->image ? asset('storage/' . $blog->image) : asset('assets/images/blog.jpg')); ?>" alt="<?php echo e($blog->title); ?>">
                        </div>
                        <div class="post-content">
                            <ul class="post-meta">
                                
                                <li><i class="fa-regular fa-calendar"></i><?php echo e($blog->created_at->translatedFormat('d F Y')); ?></li>
                                
                                <li><i class="fa-regular fa-user"></i>par Admin</li>
                            </ul>
                            
                            <h3 class="title"><a href="<?php echo e(route('blogs.show', $blog->id)); ?>"><?php echo e($blog->title); ?></a></h3>
                            
                            <a href="<?php echo e(route('blogs.show', $blog->id)); ?>" class="blog-btn"><i class="fa-regular fa-arrow-right"></i>Lire la suite</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <!-- ./ blog-section -->

    <div class="sponsor-section pb-120">
        <div class="container">
            <h3 class="sponsor-text-wrap">
                <span></span>
                
                <span class="sponsor-text">Nos Partenaires Institutionnels & Techniques Nous Font Confiance</span>
                <span></span>
            </h3>
            <div class="sponsor-carousel swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/fnfi.png')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/ada.jpg')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/apsfd.png')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/btci.jpg')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/ecobank.jpg')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/mainnetwork.jpg')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/nsia.png')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/orabank.jpg')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/poste.jpg')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center">
                            <a href="#"><img src="<?php echo e(asset('assets/images/sunu.jpg')); ?>" alt="sponsor"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('includes.main.scroll', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- ./ sponsor-section -->
    <?php echo $__env->make('includes.main.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // On cible bien le nouveau conteneur
        const heroSwiper = new Swiper('.swiper-container-wrapper', {

            // OPTIONS VISUELLES
            loop: true,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },

            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
            },

            // NAVIGATION & PAGINATION
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            },

            // ACCESSIBILITÉ
            a11y: {
                prevSlideMessage: 'Slide précédent',
                nextSlideMessage: 'Slide suivant'
            },
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\user\Desktop\Microfinance\COCEC\resources\views/welcome.blade.php ENDPATH**/ ?>