@extends('layout.main')

@section('css')
<style>
    /* === STYLE "PRESTIGE" FINANCE DIGITALE (THÈME CLAIR) === */

    :root {
        --primary-color: #EC281C;
        --dark-charcoal: #1A202C;
        --text-color: #4A5568;
        --light-gray-bg: #F7FAFC;
        --border-color: #E2E8F0;
        --font-family: 'Poppins', sans-serif;
    }

    .df-light-section {
        padding: 100px 0;
        background-color: var(--light-gray-bg);
        font-family: var(--font-family);
        position: relative;
        overflow: hidden;
    }

    .df-light-section .section-heading .sub-heading {
        color: var(--primary-color);
    }

    .df-light-section .section-heading .section-title {
        color: var(--dark-charcoal);
    }

    .df-light-section .section-heading .lead {
        color: var(--text-color);
        max-width: 800px;
        margin: 15px auto 0;
    }

    .df-light-layout {
        margin-top: 60px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }

    /* --- Colonne des Fonctionnalités (Gauche) --- */
    .df-features-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .df-feature-item {
        display: flex;
        align-items: center;
        padding: 25px;
        background-color: #FFFFFF;
        border: 1px solid var(--border-color);
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        border-left: 4px solid transparent;
    }

    .df-feature-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(45, 55, 72, 0.08);
    }

    .df-feature-item.active {
        border-left-color: var(--primary-color);
        box-shadow: 0 10px 25px rgba(236, 40, 28, 0.1);
        transform: translateY(-2px);
    }

    .df-feature-icon {
        font-size: 1.8rem;
        color: var(--primary-color);
        margin-right: 20px;
        width: 50px;
        flex-shrink: 0;
    }

    .df-feature-text h5 {
        font-weight: 600;
        color: var(--dark-charcoal);
        margin-bottom: 5px;
        font-size: 1.1rem;
    }

    .df-feature-text p {
        margin: 0;
        color: var(--text-color);
        font-size: 0.95rem;
        line-height: 1.6;
    }

    /* --- Colonne Visuelle (Droite) avec Maquette "Clay" --- */
    .df-visuals-column {
        display: grid;
        place-items: center;
    }

    .df-light-phone-mockup {
        width: 320px;
        height: 650px;
        background: #F7FAFC;
        /* Couleur argile claire */
        border-radius: 45px;
        padding: 12px;
        box-shadow: 0 25px 50px -12px rgba(45, 55, 72, 0.15),
            inset 0 4px 6px -1px rgba(0, 0, 0, 0.1),
            inset 0 -4px 6px -1px rgba(255, 255, 255, 0.7);
        position: relative;
    }

    .df-light-phone-screen {
        width: 100%;
        height: 100%;
        background: #FFFFFF;
        border-radius: 35px;
        overflow: hidden;
        position: relative;
    }

    /* --- Contenu des Écrans (Interfaces pour thème clair) --- */
    .df-screen-content-light {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transform: scale(1.05);
        transition: opacity 0.4s ease, transform 0.4s ease;
        padding: 20px;
        color: var(--dark-charcoal);
        font-size: 0.9rem;
    }

    .df-screen-content-light.active {
        opacity: 1;
        transform: scale(1);
    }

    /* Style pour l'interface COCEC Mobile (thème clair) */
    .screen-app-ui .balance-card {
        background: var(--light-gray-bg);
        border: 1px solid var(--border-color);
        padding: 20px;
        border-radius: 15px;
        text-align: center;
    }

    .screen-app-ui .balance-label {
        font-size: 0.8rem;
        color: var(--text-color);
    }

    .screen-app-ui .balance-amount {
        font-size: 2rem;
        font-weight: 600;
        margin: 5px 0 0 0;
        color: var(--dark-charcoal);
    }

    .screen-app-ui .action-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-top: 25px;
    }

    .screen-app-ui .action-btn {
        background: #FFFFFF;
        border: 1px solid var(--border-color);
        padding: 15px 10px;
        border-radius: 10px;
        text-align: center;
    }

    .screen-app-ui .action-btn i {
        font-size: 1.5rem;
        margin-bottom: 8px;
        color: var(--primary-color);
    }

    /* Style pour l'interface USSD (thème clair) */
    .screen-ussd-ui {
        font-family: 'Courier New', Courier, monospace;
        background-color: #fff;
        color: #000;
        padding-top: 20px;
    }

    .screen-ussd-ui p {
        margin-bottom: 10px;
    }

    /* Style pour l'interface Mobile Money (thème clair) */
    .screen-momo-ui {
        text-align: center;
        padding-top: 100px;
    }

    .screen-momo-ui .icon-success {
        font-size: 4rem;
        color: #2ecc71;
        margin-bottom: 20px;
    }

    .screen-momo-ui .momo-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: var(--dark-charcoal);
    }

    .screen-momo-ui .momo-text {
        color: var(--text-color);
    }

    /* --- Responsive --- */
    @media (max-width: 991px) {
        .df-light-layout {
            grid-template-columns: 1fr;
        }

        .df-visuals-column {
            order: -1;
            margin-bottom: 50px;
        }
    }
</style>
@endsection

@section('content')

<body>
    @include('includes.main.loading')
    @include('includes.main.header')


    <section class="page-header-pro">
        {{-- L'image de fond est appliquée via CSS pour plus de flexibilité --}}
        <div class="page-header-overlay"></div>
        <div class="container">
            <div class="page-header-content-pro" data-aos="fade-up">
                <h1 class="title-pro">Finance Digitale</h1>

                {{-- Utilisation d'une structure sémantique pour le fil d'Ariane --}}
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb-pro">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Finance Digitale</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- ./ page-header -->

    <section class="df-light-section">
        <div class="container">
            <div class="section-heading text-center" data-aos="fade-up">
                <h4 class="sub-heading">Nos Solutions Digitales</h4>
                <h2 class="section-title">La Finance au Bout des Doigts</h2>
                <p class="lead">Gérez vos finances où que vous soyez, 24h/24 et 7j/7. La COCEC met la technologie au service de votre tranquillité d'esprit.</p>
            </div>

            <div class="df-light-layout">
                <!-- Colonne des Fonctionnalités -->
                <div class="df-features-list" data-aos="fade-right" data-aos-delay="200">
                    <div class="df-feature-item active" data-tab="mobile">
                        <div class="df-feature-icon"><i class="fas fa-mobile-alt"></i></div>
                        <div class="df-feature-text">
                            <h5>COCEC Mobile</h5>
                            <p>Votre agence complète dans votre poche. Virements, soldes, et bien plus encore.</p>
                        </div>
                    </div>
                    <div class="df-feature-item" data-tab="ussd">
                        <div class="df-feature-icon"><i class="fas fa-keyboard"></i></div>
                        <div class="df-feature-text">
                            <h5>COCEC USSD (*145#)</h5>
                            <p>Pas de connexion internet ? Accédez à l'essentiel de nos services, partout, tout le temps.</p>
                        </div>
                    </div>
                    <div class="df-feature-item" data-tab="money">
                        <div class="df-feature-icon"><i class="fas fa-wallet"></i></div>
                        <div class="df-feature-text">
                            <h5>Transferts Mobile Money</h5>
                            <p>Envoyez et recevez de l'argent entre votre compte COCEC et T-Money/Flooz.</p>
                        </div>
                    </div>
                </div>

                <!-- Colonne de la Maquette de Téléphone -->
                <div class="df-visuals-column" data-aos="fade-left" data-aos-delay="400">
                    <div class="df-light-phone-mockup">
                        <div class="df-light-phone-screen">

                            <!-- Écran 1: COCEC Mobile -->
                            <div class="df-screen-content-light screen-app-ui active" data-tab-content="mobile">
                                <div class="balance-card">
                                    <p class="balance-label">Solde du Compte</p>
                                    <h3 class="balance-amount">1,250,750 F CFA</h3>
                                </div>
                                <div class="action-grid">
                                    <div class="action-btn"><i class="fas fa-paper-plane"></i>
                                        <div>Virement</div>
                                    </div>
                                    <div class="action-btn"><i class="fas fa-history"></i>
                                        <div>Historique</div>
                                    </div>
                                    <div class="action-btn"><i class="fas fa-money-bill-wave"></i>
                                        <div>Paiement</div>
                                    </div>
                                    <div class="action-btn"><i class="fas fa-user-circle"></i>
                                        <div>Profil</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Écran 2: COCEC USSD -->
                            <div class="df-screen-content-light screen-ussd-ui" data-tab-content="ussd">
                                <p>Menu Principal</p>
                                <p>1. Consulter Solde</p>
                                <p>2. Virement Interne</p>
                                <p>3. Transfert TMoney</p>
                                <p>4. Transfert Flooz</p>
                                <p>5. Mini Relevé</p>
                            </div>

                            <!-- Écran 3: Mobile Money -->
                            <div class="df-screen-content-light screen-momo-ui" data-tab-content="money">
                                <div class="icon-success"><i class="fas fa-check-circle"></i></div>
                                <h4 class="momo-title">Transfert Réussi</h4>
                                <p class="momo-text">50.000 F CFA envoyés avec succès à T-Money.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.main.scroll')
    @include('includes.main.footer')
</body>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const digitalFinanceSection = document.querySelector('.df-light-section');
        if (digitalFinanceSection) {
            const tabItems = digitalFinanceSection.querySelectorAll('.df-feature-item');
            const screenContents = digitalFinanceSection.querySelectorAll('.df-screen-content-light');

            tabItems.forEach(tab => {
                tab.addEventListener('click', () => {
                    const tabName = tab.dataset.tab;
                    tabItems.forEach(item => item.classList.remove('active'));
                    tab.classList.add('active');
                    screenContents.forEach(content => {
                        content.classList.toggle('active', content.dataset.tabContent === tabName);
                    });
                });
            });
        }
    });
</script>
@endsection