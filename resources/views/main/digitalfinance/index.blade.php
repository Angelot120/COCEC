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
        align-items: start;
    }

    /* --- Colonne des Services (Gauche) --- */
    .df-services-list {
        display: flex;
        flex-direction: column;
        gap: 25px;
    }

    .df-service-item {
        display: flex;
        align-items: flex-start;
        padding: 30px;
        background-color: #FFFFFF;
        border: 1px solid var(--border-color);
        border-radius: 15px;
        transition: all 0.3s ease-in-out;
        border-left: 4px solid transparent;
    }

    .df-service-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(45, 55, 72, 0.1);
        border-left-color: var(--primary-color);
    }

    .df-service-icon {
        font-size: 2.2rem;
        color: var(--primary-color);
        margin-right: 25px;
        width: 60px;
        flex-shrink: 0;
        text-align: center;
    }

    .df-service-text h5 {
        font-weight: 700;
        color: var(--dark-charcoal);
        margin-bottom: 12px;
        font-size: 1.3rem;
    }

    .df-service-text p {
        margin: 0 0 15px 0;
        color: var(--text-color);
        font-size: 1rem;
        line-height: 1.7;
    }

    .df-service-features {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .df-service-features li {
        color: var(--text-color);
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 8px;
        padding-left: 20px;
        position: relative;
    }

    .df-service-features li:before {
        content: "✓";
        color: var(--primary-color);
        font-weight: bold;
        position: absolute;
        left: 0;
    }

    /* --- Colonne des Codes USSD (Droite) --- */
    .df-ussd-section {
        background-color: #FFFFFF;
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(45, 55, 72, 0.08);
        border: 1px solid var(--border-color);
    }

    .df-ussd-section h3 {
        color: var(--dark-charcoal);
        font-weight: 700;
        margin-bottom: 25px;
        font-size: 1.5rem;
        text-align: center;
    }

    .df-ussd-codes {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .df-ussd-item {
        background: var(--light-gray-bg);
        border-radius: 12px;
        padding: 20px;
        border-left: 4px solid var(--primary-color);
    }

    .df-ussd-provider {
        font-weight: 600;
        color: var(--dark-charcoal);
        margin-bottom: 8px;
        font-size: 1.1rem;
    }

    .df-ussd-code {
        font-family: 'Courier New', monospace;
        background: #FFFFFF;
        padding: 12px 15px;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--primary-color);
        border: 2px solid var(--border-color);
        display: inline-block;
        margin: 5px 0;
    }

    .df-ussd-description {
        color: var(--text-color);
        font-size: 0.9rem;
        margin-top: 8px;
        line-height: 1.5;
    }

    /* --- Section Sécurité --- */
    .df-security-section {
        margin-top: 80px;
        background-color: #FFFFFF;
        border-radius: 15px;
        padding: 50px;
        box-shadow: 0 10px 30px rgba(45, 55, 72, 0.08);
        border: 1px solid var(--border-color);
    }

    .df-security-section h3 {
        color: var(--dark-charcoal);
        font-weight: 700;
        margin-bottom: 30px;
        font-size: 1.8rem;
        text-align: center;
    }

    .df-security-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-top: 30px;
    }

    .df-security-item {
        padding: 25px;
        background: var(--light-gray-bg);
        border-radius: 12px;
        border-left: 4px solid var(--primary-color);
    }

    .df-security-item h5 {
        color: var(--dark-charcoal);
        font-weight: 600;
        margin-bottom: 15px;
        font-size: 1.2rem;
    }

    .df-security-item p {
        color: var(--text-color);
        line-height: 1.6;
        margin: 0;
    }

    /* --- Section Formulaire de Mise à Jour --- */
    .df-update-form-section {
        padding: 100px 0;
        background: linear-gradient(135deg, var(--light-gray-bg) 0%, #f1f5f9 100%);
        margin: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .df-update-form-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        /* background: var(--primary-color); */
    }

    .df-update-form-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 2;
    }

    .df-update-form-content {
        display: grid;
        grid-template-columns: 1.5fr 1fr;
        gap: 60px;
        align-items: center;
        background: white;
        padding: 60px;
        border-radius: 20px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.08);
        border: 1px solid var(--border-color);
        position: relative;
        overflow: hidden;
    }

    .df-update-form-content::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 200px;
        height: 200px;
        background: var(--primary-color);
        opacity: 0.05;
        border-radius: 50%;
        transform: translate(100px, -100px);
    }

    .df-update-form-text h3 {
        color: var(--dark-charcoal);
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 25px;
        line-height: 1.2;
        position: relative;
    }

    .df-update-form-text h3::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 0;
        width: 60px;
        height: 4px;
        background: var(--primary-color);
        border-radius: 2px;
    }

    .df-update-form-text p {
        color: var(--text-color);
        font-size: 1.2rem;
        line-height: 1.7;
        margin-bottom: 35px;
        font-weight: 500;
    }

    .df-update-form-features {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .df-update-feature {
        display: flex;
        align-items: center;
        gap: 15px;
        color: var(--text-color);
        font-weight: 600;
        font-size: 1rem;
        padding: 15px;
        background: var(--light-gray-bg);
        border-radius: 12px;
        border-left: 4px solid var(--primary-color);
        transition: all 0.3s ease;
    }

    .df-update-feature:hover {
        background: white;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transform: translateX(5px);
    }

    .df-update-feature i {
        color: var(--primary-color);
        font-size: 1.3rem;
        background: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(236, 40, 28, 0.2);
    }

    .df-update-form-action {
        text-align: center;
        padding: 40px 30px;
        background: var(--primary-color);
        border-radius: 20px;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(236, 40, 28, 0.3);
    }

    .df-update-form-action::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }

    .df-update-form-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        background: white;
        color: var(--primary-color);
        padding: 18px 35px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.1rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
        margin-bottom: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        border: 2px solid transparent;
        position: relative;
        overflow: hidden;
        width: 100%;
    }

    .df-update-form-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        transition: left 0.5s;
    }

    .df-update-form-btn:hover::before {
        left: 100%;
    }

    .df-update-form-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
        color: var(--primary-color);
        text-decoration: none;
        background: #f8f9fa;
    }

    .df-update-form-btn i {
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }

    .df-update-form-btn:hover i {
        transform: scale(1.1);
    }

    .df-update-form-note {
        margin: 0;
        opacity: 0.9;
        font-size: 0.95rem;
        font-weight: 500;
    }

    .df-update-form-action .df-update-form-btn[style*="background: rgba(255,255,255,0.2)"] {
        background: rgba(255, 255, 255, 0.15) !important;
        color: white !important;
        border: 2px solid rgba(255, 255, 255, 0.3) !important;
        backdrop-filter: blur(10px);
    }

    .df-update-form-action .df-update-form-btn[style*="background: rgba(255,255,255,0.2)"]:hover {
        background: rgba(255, 255, 255, 0.25) !important;
        border-color: rgba(255, 255, 255, 0.5) !important;
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(255, 255, 255, 0.2);
    }

    .df-update-form-action .df-update-form-btn[style*="background: rgba(255,255,255,0.2)"]:hover i {
        transform: scale(1.1);
    }

    /* --- Responsive --- */
    @media (max-width: 991px) {
        .df-light-layout {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .df-security-grid {
            grid-template-columns: 1fr;
        }


    }

    @media (max-width: 768px) {
        .df-service-item {
            padding: 20px;
        }

        .df-ussd-section,
        .df-security-section {
            padding: 30px 20px;
        }

        .df-update-form-content {
            grid-template-columns: 1fr;
            gap: 40px;
            padding: 40px 30px;
        }

        .df-update-form-features {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .df-update-form-section {
            padding: 60px 0;
            margin: 60px 0;
        }

        .df-update-form-text h3 {
            font-size: 2rem;
        }

        .df-update-form-text p {
            font-size: 1.1rem;
        }

        .df-update-form-action {
            padding: 30px 25px;
        }

        .df-update-form-btn {
            padding: 16px 30px;
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .df-update-form-content {
            padding: 30px 20px;
        }

        .df-update-form-text h3 {
            font-size: 1.8rem;
        }

        .df-update-form-feature {
            padding: 12px;
            font-size: 0.9rem;
        }

        .df-update-form-feature i {
            width: 35px;
            height: 35px;
            font-size: 1.1rem;
        }
    }
</style>
@endsection

@section('content')

<body>
    @include('includes.main.loading')
    @include('includes.main.header')

    <section class="page-header-pro">
        <div class="page-header-overlay"></div>
        <div class="container">
            <div class="page-header-content-pro" data-aos="fade-up">
                <h1 class="title-pro">Finance Digitale</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb-pro">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Finance Digitale</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>



    <section class="df-light-section">
        <div class="container">
            <div class="section-heading text-center" data-aos="fade-up">
                <h4 class="sub-heading">Services Financiers Digitaux</h4>
                <h2 class="section-title">Finance Digitale et Services en Ligne</h2>
                <p class="lead">La COCEC met à votre disposition plusieurs services numériques pour faciliter l'accès à nos produits et gérer vos finances en toute simplicité.</p>
            </div>

            <div class="df-light-layout">
                <!-- Colonne des Services -->
                <div class="df-services-list" data-aos="fade-right" data-aos-delay="200">
                    <div class="df-service-item">
                        <div class="df-service-icon"><i class="fas fa-mobile-alt"></i></div>
                        <div class="df-service-text">
                            <h5>Mobile Banking</h5>
                            <p>Utilisation de l'Application Bindoo mobile pour gérer votre compte en toute simplicité :</p>
                            <ul class="df-service-features">
                                <li>Consulter le solde de votre compte</li>
                                <li>Effectuer des virements entre comptes</li>
                                <li>Faire des remboursements de crédit</li>
                                <li>Voir les 40 dernières opérations de compte</li>
                                <li>Mini relevé de compte</li>
                            </ul>
                        </div>
                    </div>

                    <div class="df-service-item">
                        <div class="df-service-icon"><i class="fas fa-keyboard"></i></div>
                        <div class="df-service-text">
                            <h5>Mobile Money</h5>
                            <p>Utilisation de code USSD pour accéder à votre compte COCEC et effectuer diverses opérations :</p>
                            <ul class="df-service-features">
                                <li>Faire des dépôts et retraits</li>
                                <li>Consulter votre solde</li>
                                <li>Fonctionne sur tout type de téléphone</li>
                                <li>Sans connexion Internet requise</li>
                            </ul>
                        </div>
                    </div>

                    <div class="df-service-item">
                        <div class="df-service-icon"><i class="fas fa-sms"></i></div>
                        <div class="df-service-text">
                            <h5>SMS Banking</h5>
                            <p>Restez informé de tous les mouvements sur votre compte :</p>
                            <ul class="df-service-features">
                                <li>Recevez des SMS à chaque mouvement</li>
                                <li>Notifications en temps réel</li>
                                <li>Suivi de vos transactions</li>
                            </ul>
                        </div>
                    </div>

                    <div class="df-service-item">
                        <div class="df-service-icon"><i class="fas fa-globe"></i></div>
                        <div class="df-service-text">
                            <h5>Web Banking</h5>
                            <p>Accédez à votre compte bancaire via un navigateur internet :</p>
                            <ul class="df-service-features">
                                <li>Compatible ordinateur, tablette et smartphone</li>
                                <li>Interface web sécurisée</li>
                                <li>Gestion complète de vos comptes</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Colonne des Codes USSD -->
                <div class="df-ussd-section" data-aos="fade-left" data-aos-delay="400">
                    <h3>Codes USSD pour Accéder à Votre Compte</h3>
                    <div class="df-ussd-codes">
                        <div class="df-ussd-item">
                            <div class="df-ussd-provider">FLOOZ</div>
                            <div class="df-ussd-code">*155*7*1*2#</div>
                            <div class="df-ussd-description">
                                Choisissez le compte sur lequel vous voulez faire l'opération, puis consultez le solde du compte COCEC. Si le solde s'affiche (le serveur est disponible), vous pouvez faire l'opération souhaitée.
                            </div>
                        </div>

                        <div class="df-ussd-item">
                            <div class="df-ussd-provider">Mixx by Yas</div>
                            <div class="df-ussd-code">*145*6*3*2#</div>
                            <div class="df-ussd-description">
                                Accédez à votre compte COCEC via le service Mixx by Yas pour effectuer vos opérations bancaires.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Formulaire de Mise à Jour -->
            <div class="df-update-form-section" data-aos="fade-up" data-aos-delay="500">
                <div class="df-update-form-container">
                    <div class="df-update-form-content">
                        <div class="df-update-form-text">
                            <h3>📋 Mise à Jour et Souscription aux Services</h3>
                            <p>Vous souhaitez souscrire à nos services de finance digitale ou mettre à jour vos informations ? Remplissez notre formulaire en ligne pour une procédure rapide et sécurisée.</p>
                            <div class="df-update-form-features">
                                <div class="df-update-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Formulaire en ligne sécurisé</span>
                                </div>
                                <div class="df-update-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Traitement rapide de votre demande</span>
                                </div>
                                <div class="df-update-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Confirmation par email</span>
                                </div>
                                <div class="df-update-feature">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Suivi de votre dossier</span>
                                </div>
                            </div>
                        </div>
                                               <div class="df-update-form-action">
                           <a href="{{ route('digitalfinance.updates.create') }}" class="df-update-form-btn">
                               <i class="fas fa-edit"></i>
                               Remplir le Formulaire
                           </a>
                           <p class="df-update-form-note">Temps estimé : 5-10 minutes</p>
                           
                           <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.2);">
                               <a href="{{ route('digitalfinance.contracts.create') }}" class="df-update-form-btn" style="background: rgba(255,255,255,0.2); color: white; border: 2px solid white;">
                                   <i class="fas fa-file-contract"></i>
                                   Contrat d'Adhésion
                               </a>
                               <p class="df-update-form-note">Contrat officiel de souscription</p>
                           </div>
                       </div>
                    </div>
                </div>
            </div>

            <!-- Section Sécurité -->
            <div class="df-security-section" data-aos="fade-up" data-aos-delay="600">
                <h3>Sécurité et Assistance</h3>
                <div class="df-security-grid">
                    <div class="df-security-item">
                        <h5>Application Mobile Sécurisée</h5>
                        <p>Notre application utilise un cryptage de données avancé et nécessite une authentification à chaque connexion. Nous recommandons de ne jamais partager votre mot de passe ou votre code PIN.</p>
                    </div>

                    <div class="df-security-item">
                        <h5>Perte de Téléphone</h5>
                        <p>Alertez sans délai la COCEC pour que le service soit désactivé temporairement et sécuriser votre compte.</p>
                    </div>

                    <div class="df-security-item">
                        <h5>Assistance Technique</h5>
                        <p>Vous pouvez contacter notre assistance digitale via WhatsApp, téléphone ou email. Nous avons une équipe dédiée pour vous aider en cas de problème technique.</p>
                    </div>

                    <div class="df-security-item">
                        <h5>Accès à Distance</h5>
                        <p>Vous pouvez consulter votre solde, vos échéances et votre historique via l'application Bindoo Mobile ou un code USSD, où que vous soyez.</p>
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
        // Animation au scroll pour les éléments
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observer les éléments de service
        document.querySelectorAll('.df-service-item').forEach(item => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';
            item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(item);
        });


    });
</script>
@endsection