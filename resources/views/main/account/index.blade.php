@extends('layout.main')

@section('css')
<style>
    /* Variables COCEC */
    :root {
        --primary-color: #EC281C;
        --secondary-color: #FFCC00;
        --text-dark: #2D3748;
        --text-light: #4A5568;
        --bg-light: #F7FAFC;
        --white: #ffffff;
        --border-color: #E2E8F0;
    }

    /* Reset du fond blanc */
    body {
        background-color: var(--bg-light) !important;
    }

    .account-section {
        background-color: var(--bg-light);
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
        padding: 0;
    }

    .page-header-content-pro {
        position: relative;
        z-index: 2;
        text-align: center;
        color: var(--white);
    }

    .title-pro {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 15px;
        color: var(--white);
    }

    .breadcrumb-pro {
        display: flex;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin: 0;
        gap: 10px;
    }

    .breadcrumb-item a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .breadcrumb-item a:hover {
        color: var(--secondary-color);
    }

    .breadcrumb-item.active {
        color: var(--secondary-color);
        font-weight: 600;
    }

    /* Section principale */
    .main-content {
        padding: 80px 0;
        background-color: var(--bg-light);
    }

    .section-heading {
        text-align: center;
        margin-bottom: 60px;
    }

    .section-heading h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 20px;
    }

    .section-heading p {
        font-size: 1.1rem;
        color: var(--text-light);
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.7;
    }

    .section-heading a {
        color: var(--primary-color);
        font-weight: 600;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .section-heading a:hover {
        color: var(--secondary-color);
    }

    /* Cartes de compte */
    .account-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 40px;
        margin-top: 60px;
    }

    .account-card {
        background: var(--white);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .account-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
    }

    .account-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .card-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 30px;
        text-align: center;
    }

    .requirements-list {
        list-style: none;
        padding: 0;
        margin: 0 0 30px 0;
    }

    .requirements-list li {
        display: flex;
        align-items: flex-start;
        margin-bottom: 20px;
        padding: 15px;
        background: var(--bg-light);
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .requirements-list li:hover {
        background: rgba(236, 40, 28, 0.05);
        transform: translateX(5px);
    }

    .requirements-list li i {
        color: var(--primary-color);
        font-size: 1.2rem;
        margin-right: 15px;
        margin-top: 2px;
        flex-shrink: 0;
    }

    .requirements-list li span {
        color: var(--text-light);
        line-height: 1.6;
        font-size: 0.95rem;
    }

    .requirements-list li a {
        color: var(--primary-color);
        font-weight: 600;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .requirements-list li a:hover {
        color: var(--secondary-color);
    }

    /* Bouton d'action */
    .btn-create-account {
        width: 100%;
        background: linear-gradient(135deg, var(--primary-color) 0%, #c41e12 100%);
        color: var(--white);
        border: none;
        padding: 16px 32px;
        font-size: 1.1rem;
        font-weight: 600;
        border-radius: 12px;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-create-account::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .btn-create-account:hover::before {
        left: 100%;
    }

    .btn-create-account:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(236, 40, 28, 0.3);
        color: var(--white) !important;
    }

    .btn-create-account span,
    .btn-create-account i {
        color: var(--white) !important;
        position: relative;
        z-index: 2;
    }

    .btn-create-account i {
        transition: transform 0.3s ease;
    }

    .btn-create-account:hover i {
        transform: translateX(5px);
    }
    
    /* Styles pour la section Consentement UEMOA */
    .uemoa-consent-info {
        margin-top: 80px;
        background: var(--white);
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        border: 1px solid var(--border-color);
        overflow: hidden;
    }
    .consent-header {
        /* LIGNE MODIFIÉE : Fond retiré */
        background: transparent;
        padding: 25px 30px;
        display: flex;
        align-items: center;
        gap: 15px;
        /* LIGNE AJOUTÉE : Texte en couleur sombre */
        color: var(--text-dark);
        border-bottom: 1px solid var(--border-color);
    }
    .consent-header i {
        font-size: 1.8rem;
        color: var(--primary-color);
    }
    .consent-header h4 {
        margin: 0;
        font-size: 1.3rem;
        font-weight: 700;
    }
    .consent-content {
        padding: 30px;
    }
    .consent-content p {
        font-size: 1.1rem;
        color: var(--text-dark);
        margin-bottom: 25px;
        line-height: 1.7;
    }
    .consent-details {
        list-style: none;
        padding: 0;
        margin: 0 0 25px 0;
    }
    .consent-details li {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
    }
    .consent-details li i {
        color: var(--primary-color);
        font-size: 1.1rem;
        margin-right: 12px;
        margin-top: 4px;
    }
    .consent-details li span {
        color: var(--text-light);
        line-height: 1.6;
    }
    .consent-note {
        background: var(--bg-light);
        border-left: 4px solid var(--secondary-color);
        padding: 20px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .consent-note i {
        color: var(--secondary-color);
        font-size: 1.5rem;
    }
    .consent-note span {
        color: var(--text-light);
        font-weight: 500;
        line-height: 1.6;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .title-pro { font-size: 2rem; }
        .section-heading h2 { font-size: 2rem; }
        .account-cards { grid-template-columns: 1fr; gap: 30px; }
        .account-card { padding: 30px 20px; }
        .card-title { font-size: 1.5rem; }
    }
</style>
@endsection

@section('content')
<div class="account-section">
    @include('includes.main.loading')
    @include('includes.main.header')

    <section class="page-header-pro">
        <div class="page-header-overlay"></div>
        <div class="container">
            <div class="page-header-content-pro" data-aos="fade-up">
                <h1 class="title-pro">Ouvrir un Compte</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb-pro">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ouvrir un Compte</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="main-content">
        <div class="container">
            <div class="section-heading" data-aos="fade-up">
                <h2>Adhérez à la COCEC</h2>
                <p>
                    L'adhésion à la COCEC est libre et volontaire pour toute personne physique ou morale jouissant d'une bonne moralité.
                    Téléchargez la fiche d'adhésion, remplissez-la et envoyez-la par mail à <a href="mailto:cocec2004@yahoo.fr">cocec2004@yahoo.fr</a> ou <a href="mailto:cocec@cocectogo.org">cocec@cocectogo.org</a> avec les pièces requises, ou remplissez le formulaire en ligne.
                </p>
            </div>

            <div class="account-cards">
                <!-- Personne Physique -->
                <div class="account-card" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="card-title">Personne Physique</h3>
                    <ul class="requirements-list">
                        <li>
                            <i class="fas fa-file-alt"></i>
                            <span>Remplir le <a href="{{ asset('documents/adhesion-physique.pdf') }}" target="_blank">formulaire d'adhésion</a> ou utiliser le formulaire en ligne.</span>
                        </li>
                        <li><i class="fas fa-id-card"></i><span>Copie de la pièce d'identité (CNI, passeport, permis, etc.).</span></li>
                        <li><i class="fas fa-camera"></i><span>Deux photos d'identité.</span></li>
                        <li><i class="fas fa-coins"></i><span>Souscrire à une part sociale de 5 000 FCFA.</span></li>
                        <li><i class="fas fa-hand-holding-usd"></i><span>Payer les frais d'adhésion de 2 000 FCFA.</span></li>
                        <li><i class="fas fa-scroll"></i><span>Respecter les statuts et règlements intérieurs.</span></li>
                    </ul>
                    <a href="{{ route('account.create.physic') }}" class="btn-create-account">
                        <span>Remplir le formulaire</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Personne Morale -->
                <div class="account-card" data-aos="fade-up" data-aos-delay="400">
                    <h3 class="card-title">Personne Morale</h3>
                    <ul class="requirements-list">
                        <li><i class="fas fa-file-signature"></i><span>Remplir le <a href="{{ asset('documents/adhesion-morale.pdf') }}" target="_blank">formulaire d'adhésion</a> ou utiliser le formulaire en ligne.</span></li>
                        <li><i class="fas fa-building"></i><span>Copie du récépissé, carte d'opérateur économique, ou statuts.</span></li>
                        <li><i class="fas fa-user-tie"></i><span>Copie des pièces d'identité des responsables.</span></li>
                        <li><i class="fas fa-images"></i><span>Deux photos d'identité de chaque responsable.</span></li>
                        <li><i class="fas fa-hand-holding-usd"></i><span>Verser les frais d'adhésion de 2 000 FCFA.</span></li>
                        <li><i class="fas fa-layer-group"></i><span>Souscrire à trois parts sociales (15 000 FCFA).</span></li>
                    </ul>
                    <a href="{{ route('account.create.morale') }}" class="btn-create-account">
                        <span>Remplir le formulaire</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Information sur le Consentement UEMOA -->
            <div class="uemoa-consent-info" data-aos="fade-up" data-aos-delay="600">
                <div class="consent-header">
                    <i class="fas fa-shield-alt"></i>
                    <h4>Information Importante - Consentement UEMOA</h4>
                </div>
                <div class="consent-content">
                    <p><strong>Conformément au système de partage d'information sur le crédit dans l'UEMOA</strong>, l'ouverture de votre compte implique :</p>
                    <ul class="consent-details">
                        <li><i class="fas fa-check-circle"></i> <span>Votre consentement au partage de vos informations de crédit avec les autres institutions financières de l'UEMOA</span></li>
                        <li><i class="fas fa-check-circle"></i> <span>L'échange d'informations sur vos antécédents de crédit, remboursements et engagements</span></li>
                        <li><i class="fas fa-check-circle"></i> <span>La possibilité pour d'autres institutions de consulter votre historique de crédit lors de nouvelles demandes</span></li>
                        <li><i class="fas fa-check-circle"></i> <span>Une meilleure évaluation de votre capacité de remboursement pour de futurs crédits</span></li>
                    </ul>
                    <div class="consent-note">
                        <i class="fas fa-info-circle"></i>
                        <span>Ce système vise à améliorer l'accès au crédit et à réduire les risques pour les institutions financières de l'UEMOA.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.main.scroll')
    @include('includes.main.footer')
</div>
@endsection

@section('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if ('IntersectionObserver' in window) {
            const elementsToAnimate = document.querySelectorAll('[data-aos]');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('aos-animate');
                    }
                });
            }, { threshold: 0.1 });
            elementsToAnimate.forEach(element => {
                observer.observe(element);
            });
        }
    });
</script>
@endsection