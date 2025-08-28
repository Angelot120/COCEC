@extends('layout.main')

@section('css')
<style>
    /* Styles généraux du simulateur */
    .loan-simulator-section .form-control.is-invalid,
    .loan-simulator-section .form-select.is-invalid {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .loan-simulator-section .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 8px;
    }

    .loan-simulator-section .form-control,
    .loan-simulator-section .form-select {
        border-radius: 8px;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .loan-simulator-section .form-control:focus,
    .loan-simulator-section .form-select:focus {
        border-color: #EC281C;
        box-shadow: 0 0 0 0.2rem rgba(236, 40, 28, 0.25);
    }

    /* Correction du bug d'affichage du sélecteur */
    .simulation-form,
    .loan-simulator-card {
        overflow: visible !important;
    }

    /* Style de la carte jaune */
    .promo-section .promo-item.credit-card-middle .overlay {
        background: linear-gradient(180deg, rgba(255, 204, 0, 0) 0%, #ffc400 58.48%);
    }

    .promo-section .promo-item.credit-card-middle .overlay-2 {
        background: rgba(255, 204, 0, 0.45);
        mix-blend-mode: normal;
    }

    .promo-section .promo-item.credit-card-middle .bz-primary-btn.red-btn {
        background-color: #EC281C;
        color: white;
    }

    .promo-section .promo-item.credit-card-middle {
        transform: translateY(-20px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    /* NOUVEAUX STYLES POUR LA CARTE "RÉSUMÉ DU PRÊT" */
    .result-card {
        background: linear-gradient(145deg, var(--bz-color-heading-secondary), #2c3e50);
        color: #ffffff;
        padding: 30px;
        border-radius: 15px;
        height: 100%;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        border-top: 4px solid var(--bz-color-theme-primary);
        display: flex;
        flex-direction: column;
    }

    .result-card h4 {
        color: #ffffff;
        margin-bottom: 25px;
        font-size: 22px;
        font-weight: 700;
        text-align: center;
        padding-bottom: 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        position: relative;
    }

    .result-card h4::before {
        content: '\f543';
        /* Icône calculatrice FontAwesome */
        font-family: "Font Awesome 6 Pro";
        font-weight: 900;
        margin-right: 10px;
        color: var(--bz-color-theme-secondary);
    }

    .result-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
        padding: 12px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        font-size: 15px;
    }

    .result-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }

    .result-item span {
        color: rgba(255, 255, 255, 0.8);
        display: flex;
        align-items: center;
    }

    .result-item span::before {
        font-family: "Font Awesome 6 Pro";
        font-weight: 900;
        margin-right: 10px;
        width: 20px;
        text-align: center;
        color: var(--bz-color-theme-secondary);
        font-size: 14px;
    }

    .result-item:nth-child(2) span::before {
        content: '\f0d6';
    }

    /* Montant */
    .result-item:nth-child(3) span::before {
        content: '\f2f2';
    }

    /* Durée */
    .result-item:nth-child(4) span::before {
        content: '\f52c';
    }

    /* Taux */
    .result-item:nth-child(5) span::before {
        content: '\f783';
    }

    /* Première Échéance */
    .result-item:nth-child(6) span::before {
        content: '\f782';
    }

    /* Dernière Échéance */
    .result-item:nth-child(7) span::before {
        content: '\f651';
    }

    /* Total Intérêts */
    .result-item:nth-child(8) span::before {
        content: '\f09d';
    }

    /* Total à Rembourser */
    .result-item strong {
        font-size: 16px;
        font-weight: 700;
        color: var(--bz-color-theme-secondary);
        text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    }

    /* Styles pour le tableau d'amortissement */
    .amortization-table-wrapper {
        background: #ffffff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    }

    .amortization-table-wrapper h4 {
        color: var(--bz-color-heading-secondary);
        font-weight: 700;
        margin-bottom: 25px;
        font-size: 22px;
        text-align: center;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 15px;
    }

    .amortization-table-wrapper .table-responsive {
        max-height: 400px;
        overflow-y: auto;
    }

    .amortization-table-wrapper .table {
        border-collapse: separate;
        border-spacing: 0 5px;
    }

    .amortization-table-wrapper .table thead th {
        background: var(--bz-color-theme-red);
        color: white;
        border: none;
        padding: 16px;
        font-size: 14px;
        font-weight: 600;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .amortization-table-wrapper .table thead th:first-child {
        border-radius: 8px 0 0 8px;
    }

    .amortization-table-wrapper .table thead th:last-child {
        border-radius: 0 8px 8px 0;
    }

    .amortization-table-wrapper .table tbody tr {
        background-color: #f8f9fa;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .amortization-table-wrapper .table tbody tr:hover {
        background-color: #ffffff;
        transform: scale(1.02);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        z-index: 2;
        position: relative;
    }

    .amortization-table-wrapper .table tbody td {
        padding: 15px;
        text-align: center;
        vertical-align: middle;
        font-size: 14px;
        color: #495057;
        border: none;
        border-bottom: 1px solid #e9ecef;
    }

    .amortization-table-wrapper .table tbody tr td:first-child {
        border-left: 1px solid #e9ecef;
        border-radius: 8px 0 0 8px;
        font-weight: 600;
        color: var(--bz-color-theme-red);
    }

    .amortization-table-wrapper .table tbody tr td:last-child {
        border-right: 1px solid #e9ecef;
        border-radius: 0 8px 8px 0;
        font-weight: 500;
    }

    .amortization-table-wrapper .table tbody tr:last-child td {
        border-bottom: 1px solid #e9ecef;
    }
</style>
@endsection

@section('content')

<body>
    @include('includes.main.loading')
    @include('includes.main.popup')
    <!-- ./ preloader -->

    @include('includes.main.header')

    <!-- hero-section-3 -->
    <section class="hero-section-3">
        <!-- <div class="shapes">
            <div class="shape shape-1"><img src="{{ asset('assets/main/img/shapes/hero-bg-shape-2.png') }}" alt="forme"></div>
            <div class="shape shape-2"><img src="{{ asset('assets/main/img/shapes/hero-bg-shape-3.png') }}" alt="forme"></div>
        </div> -->
        <div class="swiper-container-wrapper swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide hero-slide-1" data-background="{{ asset('assets/images/banner.jpg') }}" loading="lazy">
                    <div class="container-2">
                        <div class="hero-content hero-content-3">
                            <div class="section-heading mb-40 red-content">
                                <h4 class="sub-heading"><span class="left-shape"></span>Votre Partenaire Financier</h4>
                                <h2 class="section-title">Des Solutions Financières pour <br>Votre Avenir</h2>
                                <p class="text-justify">La COCEC vous accompagne avec des services d’épargne, de crédit et d’accompagnement personnalisé pour réaliser vos projets et assurer votre sécurité financière.</p>
                            </div>
                            <div class="hero-btn-wrap" style="--bz-color-theme-primary: #EC281C">
                                <a href="{{ route('contact') }}" class="bz-primary-btn primary">Nous Contacter <i class="fa-regular fa-arrow-right"></i></a>
                                <a href="{{ route('product.index') }}" class="bz-primary-btn hero-btn">Nos Produits</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide hero-slide-2" data-background="{{ asset('assets/images/banner-1.jpg') }}" loading="lazy">
                    <div class="container-2">
                        <div class="hero-content hero-content-3">
                            <div class="section-heading mb-40 red-content">
                                <h4 class="sub-heading"><span class="left-shape"></span>Crédit & Investissement</h4>
                                <h2 class="section-title">Financez Vos Projets les Plus <br>Ambitieux</h2>
                                <p class="text-justify">Que ce soit pour un projet immobilier, agricole ou entrepreneurial, nos solutions de crédit sont conçues pour vous donner les moyens de réussir.</p>
                            </div>
                            <div class="hero-btn-wrap" style="--bz-color-theme-primary: #EC281C">
                                <a href="{{ route('contact') }}" class="bz-primary-btn primary">Demander un Crédit <i class="fa-regular fa-arrow-right"></i></a>
                                <a href="{{ route('product.index') }}" class="bz-primary-btn hero-btn">Explorer les Options</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide hero-slide-3" data-background="{{ asset('assets/images/banner-2.jpg') }}" loading="lazy">
                    <div class="container-2">
                        <div class="hero-content hero-content-3">
                            <div class="section-heading mb-40 red-content">
                                <h4 class="sub-heading"><span class="left-shape"></span>Épargne Sécurisée</h4>
                                <h2 class="section-title">Construisez Votre Patrimoine <br>en Toute Confiance</h2>
                                <p class="text-justify">Découvrez nos comptes d'épargne flexibles et rentables pour préparer l'avenir, financer les études de vos enfants ou simplement vous constituer une réserve.</p>
                            </div>
                            <div class="hero-btn-wrap" style="--bz-color-theme-primary: #EC281C">
                                <a href="{{ route('contact') }}" class="bz-primary-btn primary">Ouvrir un Compte <i class="fa-regular fa-arrow-right"></i></a>
                                <a href="{{ route('product.index') }}" class="bz-primary-btn hero-btn">Types de Comptes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
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
                            <div class="bg-img"><img src="{{ asset('assets/images/epargne.jpg') }}" alt="Épargne" loading="lazy"></div>
                            <div class="overlay"></div>
                            <div class="overlay-2"></div>
                        </div>
                        <h3 class="title">Épargne Sécurisée</h3>
                        <p class="text-justify">Épargnez en toute tranquillité avec nos comptes d’épargne flexibles, conçus pour répondre à vos besoins à court et long terme, avec des options comme l’épargne à vue ou à terme.</p>
                        <a href="{{route('product.index') }}" class="bz-primary-btn red-btn">En savoir plus <i class="fa-regular fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="promo-item white-content credit-card-middle">
                        <div class="bg-items">
                            <div class="bg-img"><img src="{{ asset('assets/images/credit.jpg') }}" alt="Crédit" loading="lazy"></div>
                            <div class="overlay"></div>
                            <div class="overlay-2"></div>
                        </div>
                        <h3 class="title">Crédits Adaptés</h3>
                        <p class="text-justify">Financez vos projets avec nos solutions de crédit sur mesure : prêts scolaires, commerciaux, ou agricoles pour soutenir vos ambitions personnelles et professionnelles.</p>
                        <a href="{{route('product.index') }}" class="bz-primary-btn red-btn">En savoir plus <i class="fa-regular fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="promo-item white-content">
                        <div class="bg-items">
                            <div class="bg-img"><img src="{{ asset('assets/images/accompagnement.jpg') }}" alt="Services Financiers" loading="lazy"></div>
                            <div class="overlay"></div>
                            <div class="overlay-2"></div>
                        </div>
                        <h3 class="title">Accompagnement Financier</h3>
                        <p class="text-justify">Bénéficiez de conseils personnalisés et de services comme le transfert d’argent pour gérer efficacement vos finances avec le soutien de la COCEC.</p>
                        <a href="{{route('product.index') }}" class="bz-primary-btn red-btn">En savoir plus <i class="fa-regular fa-arrow-right"></i></a>
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
                        <img src="{{ asset('assets/images/director.jpeg') }}" alt="about" loading="lazy">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content-3 fade-wrapper">
                        <div class="section-heading red-content mb-20">
                            <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Mot du Directeur Général</h4>
                            <h2 class="section-title" data-text-animation data-split="word" data-duration="1">Bâtir un Avenir Financier Inclusif et Moderne</h2>
                        </div>
                        <p class="fade-top text-justify">
                            Depuis 2001, la COCEC a placé l’amélioration de vos conditions de vie au centre de ses stratégies. Notre plus grande fierté réside dans les témoignages de ceux qui, partis de rien, subviennent aujourd’hui aux besoins de leur famille grâce à notre accompagnement.
                        </p>
                        <ul class="about-list-revisited fade-top">
                            <li>
                                <div class="list-icon-revisited"><i class="fas fa-rocket"></i></div>
                                <div class="list-text">
                                    <h5>Innovation & Modernité</h5>
                                    <span>Nous intégrons les nouvelles technologies (Mobile Money, Web Banking) pour vous offrir des produits innovants à moindre coût.</span>
                                </div>
                            </li>
                            <li>
                                <div class="list-icon-revisited"><i class="fas fa-hands-helping"></i></div>
                                <div class="list-text">
                                    <h5>Confiance & Partenariat</h5>
                                    <span>Avec la confiance renouvelée de nos clients et partenaires, et avec Dieu à nos côtés, nous accomplirons des exploits.</span>
                                </div>
                            </li>
                        </ul>
                        <hr class="section-divider fade-top">
                        <div class="director-cta-block fade-top">
                            <div class="director-signature-block">
                                <strong>M. Kokou GABIAM</strong>
                                <span>Directeur Général</span>
                            </div>
                            <div class="about-btn">
                                <a href="{{ route('about') }}" class="bz-primary-btn red-btn">En Savoir Plus <i class="fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ about-section -->

    <section class="service-section-3 pt-120 pb-120" data-background="{{ asset('assets/images/shapes/service-bg-shape.png') }}">
        <div class="container-2">
            <div class="section-heading text-center red-content">
                <h4 class="sub-heading"><span class="left-shape"></span>Nos Produits Phares</h4>
                <h2 class="section-title mb-0">Des Solutions Financières Conçues Pour Vous</h2>
            </div>
            <div class="row gy-lg-0 gy-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="service-item-3">
                        <div class="service-thumb">
                            <img class="img-item" src="{{ asset('assets/images/account1.jpg') }}" alt="Épargne" loading="lazy">
                        </div>
                        <div class="service-content">
                            <h3 class="title"><a href="#">Compte d'Épargne</a></h3>
                            <p class="text-justify">Faites fructifier votre argent en toute sécurité et préparez sereinement votre avenir grâce à nos solutions d'épargne flexibles.</p>
                            <a href="#" class="bz-primary-btn red-btn">Découvrir <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item-3">
                        <div class="service-thumb">
                            <img class="img-item" src="{{ asset('assets/images/account2.jpg') }}" alt="Compte Courant" loading="lazy">
                        </div>
                        <div class="service-content">
                            <h3 class="title"><a href="#">Compte Courant</a></h3>
                            <p class="text-justify">Gérez vos revenus et vos dépenses quotidiennes avec agilité. La solution idéale pour la domiciliation de votre salaire.</p>
                            <a href="#" class="bz-primary-btn red-btn">Découvrir <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item-3">
                        <div class="service-thumb">
                            <img class="img-item" src="{{ asset('assets/images/account3.jpg') }}" alt="Crédits" loading="lazy">
                        </div>
                        <div class="service-content">
                            <h3 class="title"><a href="#">Crédits & Financements</a></h3>
                            <p class="text-justify">Donnez vie à vos projets personnels ou professionnels avec nos solutions de crédit sur-mesure et à des conditions avantageuses.</p>
                            <a href="#" class="bz-primary-btn red-btn">Découvrir <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ service-section -->

    <section class="cta-section cta-2 pt-120 pb-120">
        <div class="bg-img"><img src="{{ asset('assets/images/products.jpeg') }}" alt="img"></div>
        <div class="overlay"></div>
        <div class="overlay-2"></div>
        <div class="container-2">
            <div class="cta-wrap">
                <div class="cta-content">
                    <div class="section-heading mb-0 white-content">
                        <h4 class="sub-heading">
                            <span class="left-shape"></span>Une Gamme Complète de Produits
                        </h4>
                        <h2 class="section-title mb-0">
                            De l'épargne à la concrétisation de vos projets, nous avons la solution financière qu'il vous faut.</h2>
                    </div>
                </div>
                <div class="cta-btn-wrap">
                    <a href="{{-- route('produits.index') --}}" class="bz-primary-btn red-btn">Voir tous les produits</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ cta-section -->

    <!-- Simulateur de Prêt Section -->
    <section class="loan-simulator-section pt-120 pb-120">
        <div class="container-2">
            <div class="section-heading text-center red-content mb-60">
                <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5">
                    <span class="left-shape"></span>Simulateur de Prêt
                </h4>
                <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">
                    Calculez votre échéance de prêt
                </h2>
                <p class="mt-20">Simulez votre prêt en quelques clics et obtenez un tableau d'amortissement détaillé</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="loan-simulator-card">
                        <div class="simulator-header">
                            <h3><i class="fas fa-calculator"></i> Simulateur de Prêt COCEC</h3>
                            <p>Entrez vos informations pour calculer votre échéance et voir le tableau d'amortissement</p>
                        </div>

                        <!-- Formulaire de simulation -->
                        <div class="simulation-form mb-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="loan-type" class="form-label">Type de prêt</label>
                                    <select class="form-select" id="loan-type">
                                        <option value="" selected disabled>Sélectionner le type</option>
                                        <option value="ORDINAIRE">CREDIT ORDINAIRE</option>
                                        <option value="MARCHE">FINANCEMENT DE MARCHE</option>
                                        <option value="SCOLAIRE">CRÉDIT SPECIAL R (PRÊT SCOLAIRE)</option>
                                        <option value="COMMERCE">CREDIT COMMERCE & AUTRES AGR</option>
                                        <option value="IMMOBILIER">CREDIT IMMOBILIER</option>
                                        <option value="ENERGIE">CRÉDIT ENERGIE RENOUVELABLE</option>
                                        <option value="FONCIER">CREDIT OBTENTION DE TITRE FONCIER</option>
                                        <option value="TONTINE">CREDIT TONTINE</option>
                                        <option value="SALAIRE">CREDIT SUR VIREMENT SALAIRE</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="loan-amount" class="form-label">Montant (FCFA)</label>
                                    <input type="number" class="form-control" id="loan-amount" placeholder="Ex: 1000000" min="0" step="10000">
                                </div>
                                <div class="col-md-3">
                                    <label for="loan-duration" class="form-label">Durée (mois)</label>
                                    <input type="number" class="form-control" id="loan-duration" placeholder="Ex: 12" min="1" step="1">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">&nbsp;</label>
                                    <button type="button" class="bz-primary-btn red-btn w-100" id="calculate-loan">
                                        <span class="btn-text">Calculer</span>
                                        <span class="btn-loading" style="display: none;">
                                            <i class="fa-solid fa-spinner fa-spin"></i> Calcul...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Loading -->
                        <div id="loan-loading" class="text-center py-5" style="display: none;">
                            <div class="loading-spinner">
                                <div class="spinner"></div>
                            </div>
                            <p class="mt-3">Calcul en cours...</p>
                        </div>

                        <!-- Résultats -->
                        <div id="loan-results" class="loan-results" style="display: none;">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="result-card">
                                        <h4>Résumé du Prêt</h4>
                                        <div class="result-item">
                                            <span>Montant emprunté</span>
                                            <strong id="borrowed-amount">0 FCFA</strong>
                                        </div>
                                        <div class="result-item">
                                            <span>Durée</span>
                                            <strong id="loan-period">0 mois</strong>
                                        </div>
                                        <div class="result-item">
                                            <span>Taux Annuel</span>
                                            <strong id="interest-rate">0%</strong>
                                        </div>
                                        <div class="result-item">
                                            <span>Première Échéance</span>
                                            <strong id="first-payment">0 FCFA</strong>
                                        </div>
                                        <div class="result-item">
                                            <span>Dernière Échéance</span>
                                            <strong id="last-payment">0 FCFA</strong>
                                        </div>
                                        <div class="result-item">
                                            <span>Total des Intérêts</span>
                                            <strong id="total-interest">0 FCFA</strong>
                                        </div>
                                        <div class="result-item">
                                            <span>Total à Rembourser</span>
                                            <strong id="total-amount">0 FCFA</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="amortization-table-wrapper">
                                        <h4>Tableau d'Amortissement</h4>
                                        <div class="table-responsive">
                                            <table class="table" id="amortization-table">
                                                <thead>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th>Capital Remboursé</th>
                                                        <th>Intérêts</th>
                                                        <th>Mensualité</th>
                                                        <th>Capital Restant</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="amortization-body">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="simulation-actions text-center mt-4">
                            <button type="button" class="bz-primary-btn hero-btn" id="refresh-loan">
                                <i class="fas fa-redo"></i> Actualiser
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION STATISTIQUES - VERSION OPTIMISÉE -->
    <section class="strength-section pt-120 pb-120">
        <div class="bg-item">
            <div class="bg-img" data-background="{{ asset('assets/images/strength-bg.jpg') }}"></div>
            <div class="overlay"></div>
            <div class="shapes">
                <div class="shape">
                    <img src="{{ asset('assets/images/shapes/strength-shape-1.png') }}" alt="img">
                </div>
                <div class="shape-2"></div>
            </div>
        </div>
        <div class="container-2">
            <div class="row strength-wrap fade-wrapper">
                <div class="col-lg-6 col-md-12">
                    <div class="strength-content">
                        <div class="section-heading mb-20 white-content red-content">
                            <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5">
                                <span class="left-shape"></span>Notre Force en Chiffres
                            </h4>
                            <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">
                                Plus qu'une Institution, <br>une Communauté Qui Prospère
                            </h2>
                        </div>
                        <p class="fade-top text-justify mb-40">
                            Depuis plus de 20 ans, notre force réside dans la confiance de nos membres et notre engagement indéfectible pour leur réussite financière.
                        </p>
                        <div class="strength-items-grid">
                            <div class="strength-item fade-top">
                                <div class="strength-icon"><i class="fas fa-heart"></i></div>
                                <div class="strength-content">
                                    <h3 class="title"><span class="odometer" data-count="95">0</span>%</h3>
                                    <p>Taux de Satisfaction</p>
                                </div>
                            </div>
                            <div class="strength-item fade-top">
                                <div class="strength-icon"><i class="fas fa-users"></i></div>
                                <div class="strength-content">
                                    <h3 class="title">+<span class="odometer" data-count="50000">0</span></h3>
                                    <p>Membres Accompagnés</p>
                                </div>
                            </div>
                            <div class="strength-item fade-top">
                                <div class="strength-icon"><i class="fas fa-chart-line"></i></div>
                                <div class="strength-content">
                                    <h3 class="title"><span class="odometer" data-count="20">0</span>+</h3>
                                    <p>Années d'Expérience</p>
                                </div>
                            </div>
                            <div class="strength-item fade-top">
                                <div class="strength-icon"><i class="fas fa-handshake"></i></div>
                                <div class="strength-content">
                                    <h3 class="title"><span class="odometer" data-count="1000">0</span>+</h3>
                                    <p>Projets Financés</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="strength-man">
                        <img class="men" src="{{ asset('assets/images/forces.png') }}" alt="man">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ process-section -->

    <section class="home-agencies-section">
        <div class="container">
            <div class="section-heading text-center">
                <h4 class="sub-heading"><span class="left-shape"></span>Notre Réseau</h4>
                <h2>Trouvez un point de service proche de vous</h2>
                <p>Avec un réseau en pleine expansion, la COCEC est toujours à vos côtés. Découvrez nos agences principales.</p>
            </div>
            <div class="agency-grid">
                @foreach ($agencies as $agency)
                <a href="{{ route('agencies') }}" class="mini-agency-card">
                    <div class="card-icon-wrapper">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="card-status">
                        <?php
                        $currentHour = now()->hour;
                        $isOpen = ($currentHour >= 9 && $currentHour < 17);
                        $status = $isOpen ? 'Ouvert' : 'Fermé';
                        ?>
                        <span class="status-dot {{ $isOpen ? 'open' : 'closed' }}"></span> {{ $status }}
                    </div>
                    <h3 class="card-title">{{ $agency->name }}</h3>
                    <p class="card-address">{{ $agency->address }}</p>
                    <span class="card-arrow"><i class="fas fa-arrow-right"></i></span>
                </a>
                @endforeach
            </div>
            <div class="text-center" style="margin-top: 50px;">
                <a href="{{ route('agencies') }}" class="btn-see-all">
                    Voir toutes nos agences <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="cta-section-3">
        <div class="container-2">
            <div class="cta-wrap-3">
                <div class="shapes">
                    <div class="shape-1"><img src="{{ asset('assets/images/shapes/cta-shape-1.png') }}" alt="cta"></div>
                    <div class="shape-2"><img src="{{ asset('assets/images/shapes/cta-shape-2.png') }}" alt="cta"></div>
                </div>
                <div class="cta-mask-img">
                    <div class="overlay"></div>
                    <img src="{{ asset('assets/images/job-offer.jpg') }}" alt="cta">
                </div>
                <h3 class="title">Rejoignez Notre Équipe</h3>
                <p>Nous sommes toujours à la recherche de professionnels talentueux et passionnés, <br> désireux de contribuer à notre mission d'inclusion financière.</p>
                <div style="margin-top: 30px;">
                    <a href="{{ route('career') }}" class="bz-primary-btn red-btn">Voir les Offres d'Emploi <i class="fa-regular fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- ./ agencies-section -->

    <section class="testimonial-section-3 overflow-hidden pb-120" data-background="{{ URL::asset('assets/images/shapes/testi-bg-2.png') }}">
        <div class="container-2">
            <div class="section-heading text-center red-content">
                <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Témoignages de nos Membres</h4>
                <h2 class="section-title mb-0" data-text-animation data-split="word" data-duration="1">Leurs Mots, Notre Plus Grande Fierté</h2>
            </div>
            <div class="testi-carousel-2 swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testi-item-2">
                            <div class="testi-top no-image">
                                <div class="testi-author">
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
                    <div class="swiper-slide">
                        <div class="testi-item-2">
                            <div class="testi-top no-image">
                                <div class="testi-author">
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
                    <div class="swiper-slide">
                        <div class="testi-item-2">
                            <div class="testi-top no-image">
                                <div class="testi-author">
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
                <a href="{{ route('blogs') }}" class="bz-primary-btn red-btn">Voir tous les Posts <i class="fa-regular fa-arrow-right"></i></a>
            </div>
            <div class="row gy-lg-0 gy-4 fade-wrapper">
                @if($blogs->count() > 0)
                @foreach ($blogs as $blog)
                <div class="col-md-6">
                    <div class="post-card-3 fade-top" style="--bz-color-theme-primary: #EC281C">
                        <div class="post-thumb img-reveal">
                            <div class="img-overlay"></div>
                            <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('assets/images/blog.jpg') }}" alt="{{ $blog->title }}">
                        </div>
                        <div class="post-content">
                            <ul class="post-meta">
                                <li><i class="fa-regular fa-calendar"></i>{{ $blog->created_at->translatedFormat('d F Y') }}</li>
                                <li><i class="fa-regular fa-user"></i>par Admin</li>
                            </ul>
                            <h3 class="title"><a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a></h3>
                            <a href="{{ route('blogs.show', $blog->id) }}" class="blog-btn"><i class="fa-regular fa-arrow-right"></i>Lire la suite</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-12">
                    <div class="text-center py-5">
                        <div class="empty-blog-message">
                            <i class="fa-regular fa-newspaper" style="font-size: 4rem; color: #EC281C; margin-bottom: 1rem;"></i>
                            <h3 class="mb-3">Aucun article disponible</h3>
                            <p class="text-muted mb-4">Nous travaillons actuellement sur de nouveaux contenus. Revenez bientôt pour découvrir nos derniers articles !</p>
                            <a href="{{ route('blogs') }}" class="bz-primary-btn red-btn">Voir tous les Posts <i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endif
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
                        <div class="sponsor-item text-center"><a href="#"><img src="{{ asset('assets/images/fnfi.png') }}" alt="sponsor"></a></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center"><a href="#"><img src="{{ asset('assets/images/ada.jpg') }}" alt="sponsor"></a></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center"><a href="#"><img src="{{ asset('assets/images/apsfd.png') }}" alt="sponsor"></a></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center"><a href="#"><img src="{{ asset('assets/images/btci.png') }}" alt="sponsor"></a></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center"><a href="#"><img src="{{ asset('assets/images/ecobank.jpg') }}" alt="sponsor"></a></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center"><a href="#"><img src="{{ asset('assets/images/mainnetwork.jpg') }}" alt="sponsor"></a></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center"><a href="#"><img src="{{ asset('assets/images/nsia.png') }}" alt="sponsor"></a></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center"><a href="#"><img src="{{ asset('assets/images/orabank.jpg') }}" alt="sponsor"></a></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center"><a href="#"><img src="{{ asset('assets/images/poste.jpg') }}" alt="sponsor"></a></div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-item text-center"><a href="#"><img src="{{ asset('assets/images/sunu.jpg') }}" alt="sponsor"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.main.scroll')
    @include('includes.main.footer')
</body>
@endsection

@section('js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // --- Initialisation de tous les sliders Swiper de la page ---

    // 1. Slider du HÉROS (bannière principale)
    new Swiper('.hero-section-3 .swiper-container-wrapper', {
        loop: true,
        effect: 'fade',
        fadeEffect: { crossFade: true },
        autoplay: { delay: 7000, disableOnInteraction: false },
        navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        pagination: { el: '.swiper-pagination', clickable: true },
    });

    // 2. Slider des TÉMOIGNAGES
    new Swiper('.testi-carousel-2', {
        loop: true,
        spaceBetween: 30,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            // Pour mobile
            320: { slidesPerView: 1 },
            // Pour tablettes
            768: { slidesPerView: 2 },
            // Pour ordinateurs
            992: { slidesPerView: 2 }
        }
    });

    // 3. Slider des PARTENAIRES (Sponsors)
    new Swiper('.sponsor-carousel', {
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        slidesPerView: 2,
        spaceBetween: 30,
        breakpoints: {
            768: { slidesPerView: 4, spaceBetween: 40 },
            992: { slidesPerView: 5, spaceBetween: 50 }
        }
    });

    // --- Animation des compteurs (Odometer) ---
    const counters = document.querySelectorAll('.odometer');
    if ('IntersectionObserver' in window) {
        const counterObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const odometer = entry.target;
                    const target = parseInt(odometer.getAttribute('data-count'), 10);
                    odometer.innerHTML = target; // Remplacé par une animation simple pour éviter les dépendances lourdes
                    observer.unobserve(odometer);
                }
            });
        }, { threshold: 0.1 });
        counters.forEach(counter => counterObserver.observe(counter));
    }
    
    // --- LOGIQUE DU SIMULATEUR DE PRÊT ---
    const loanSimulatorSection = document.querySelector('.loan-simulator-section');
    if (loanSimulatorSection) {
    
        const loanRates = {
            'ORDINAIRE': 14.0, 'MARCHE': 14.0, 'SCOLAIRE': 0.0, 'COMMERCE': 14.0,
            'IMMOBILIER': 14.0, 'ENERGIE': 0.0, 'FONCIER': 14.0, 'TONTINE': 14.0, 'SALAIRE': 13.0
        };

        const loanTypeEl = document.getElementById('loan-type');
        const loanAmountEl = document.getElementById('loan-amount');
        const loanDurationEl = document.getElementById('loan-duration');
        const calculateBtn = document.getElementById('calculate-loan');
        const refreshBtn = document.getElementById('refresh-loan');
        const loadingEl = document.getElementById('loan-loading');
        const resultsEl = document.getElementById('loan-results');
        
        const formatCurrency = (amount) => {
            return new Intl.NumberFormat('fr-FR', {
                style: 'currency', currency: 'XOF', minimumFractionDigits: 0
            }).format(Math.round(amount));
        };

        const calculateLoan = () => {
            let hasError = false;
            [loanTypeEl, loanAmountEl, loanDurationEl].forEach(el => {
                el.classList.remove('is-invalid');
                if (!el.value) {
                    el.classList.add('is-invalid');
                    hasError = true;
                }
            });

            if (hasError) {
                if (typeof Swal !== 'undefined') {
                    Swal.fire({ icon: 'warning', title: 'Champs manquants', text: 'Veuillez remplir tous les champs correctement.', confirmButtonColor: '#EC281C' });
                }
                return;
            }

            const type = loanTypeEl.value;
            const principal = parseFloat(loanAmountEl.value);
            const duration = parseInt(loanDurationEl.value);
            const annualRate = loanRates[type];

            loadingEl.style.display = 'block';
            resultsEl.style.display = 'none';
            calculateBtn.disabled = true;
            calculateBtn.querySelector('.btn-text').style.display = 'none';
            calculateBtn.querySelector('.btn-loading').style.display = 'inline-block';

            setTimeout(() => {
                const capitalPerMonth = principal / duration;
                let remainingCapital = principal;
                let totalInterestPaid = 0;
                
                const amortizationTable = [];
                for (let i = 1; i <= duration; i++) {
                    const interestForMonth = remainingCapital * (annualRate / 100 / 12);
                    totalInterestPaid += interestForMonth;
                    
                    let capitalToPay = (i === duration) ? remainingCapital : capitalPerMonth;
                    const monthlyPayment = capitalToPay + interestForMonth;
                    remainingCapital -= capitalToPay;

                    amortizationTable.push({
                        month: i,
                        capital: capitalToPay,
                        interest: interestForMonth,
                        payment: monthlyPayment,
                        remaining: Math.max(0, remainingCapital)
                    });
                }
                
                const firstPayment = amortizationTable.length > 0 ? amortizationTable[0].payment : 0;
                const lastPayment = amortizationTable.length > 0 ? amortizationTable[amortizationTable.length - 1].payment : 0;

                document.getElementById('borrowed-amount').textContent = formatCurrency(principal);
                document.getElementById('loan-period').textContent = `${duration} mois`;
                document.getElementById('interest-rate').textContent = `${annualRate}%`;
                document.getElementById('first-payment').textContent = formatCurrency(firstPayment);
                document.getElementById('last-payment').textContent = formatCurrency(lastPayment);
                document.getElementById('total-interest').textContent = formatCurrency(totalInterestPaid);
                document.getElementById('total-amount').textContent = formatCurrency(principal + totalInterestPaid);
                
                const tbody = document.getElementById('amortization-body');
                tbody.innerHTML = '';
                amortizationTable.forEach(row => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${row.month}</td>
                        <td>${formatCurrency(row.capital)}</td>
                        <td>${formatCurrency(row.interest)}</td>
                        <td>${formatCurrency(row.payment)}</td>
                        <td>${formatCurrency(row.remaining)}</td>
                    `;
                    tbody.appendChild(tr);
                });

                loadingEl.style.display = 'none';
                resultsEl.style.display = 'block';
                calculateBtn.disabled = false;
                calculateBtn.querySelector('.btn-text').style.display = 'inline-block';
                calculateBtn.querySelector('.btn-loading').style.display = 'none';
                resultsEl.scrollIntoView({ behavior: 'smooth' });
            }, 1000);
        };
        
        const refreshLoanSimulator = () => {
            loanTypeEl.selectedIndex = 0;
            loanAmountEl.value = '';
            loanDurationEl.value = '';
            [loanTypeEl, loanAmountEl, loanDurationEl].forEach(el => el.classList.remove('is-invalid'));
            resultsEl.style.display = 'none';
            document.querySelector('.loan-simulator-section').scrollIntoView({ behavior: 'smooth' });
        };

        calculateBtn.addEventListener('click', calculateLoan);
        refreshBtn.addEventListener('click', refreshLoanSimulator);
    }
});
</script>
@endsection