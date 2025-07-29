@extends('layout.main')

@section('css')
<style>
    /* ----- Configuration Générale & Variables "Éclat Solaire" ----- */
    :root {
        --brand-red: #EC281C;
        --brand-yellow: #FFCC00;

        /* Notre dégradé star, parfait pour un fond clair */
        --aurora-gradient: linear-gradient(125deg, #EC281C 0%, #ff7e5f 50%, #FFCC00 100%);

        --light-bg: #f8f9fa;
        --card-bg: #ffffff;
        --card-border: #eef0f4;

        --text-dark: #2d3748;
        --text-muted: #718096;

        /* L'ombre qui combine une ombre classique + une ombre colorée pour l'effet "glow" */
        --cool-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.07), 0 2px 4px -1px rgba(0, 0, 0, 0.04), 0 0 25px -5px rgba(236, 40, 28, 0.1);
        --cool-shadow-hover: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05), 0 0 40px -5px rgba(236, 40, 28, 0.25);
    }

    /* ----- Section Principale ----- */
    .account-section-reimagined {
        background-color: var(--light-bg);
        font-family: 'Poppins', sans-serif;
        color: var(--text-dark);
        overflow: hidden;
        /* Important pour les effets de bord */
    }

    /* ----- Titre de section avec dégradé ----- */
    .section-heading h2 {
        font-size: 3rem;
        font-weight: 800;
        /* Plus gras pour un meilleur effet */
        margin-bottom: 1rem;
        /* La magie du texte en dégradé ! */
        background: var(--aurora-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
    }

    .section-heading p {
        max-width: 750px;
        margin-left: auto;
        margin-right: auto;
        color: var(--text-muted);
        line-height: 1.8;
        font-size: 1.1rem;
    }

    .section-heading a {
        color: var(--brand-red);
        font-weight: 600;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .section-heading a:hover {
        color: var(--brand-yellow);
    }

    /* ----- Cartes avec effet 3D et ombre colorée ----- */
    .process-card {
        background: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: 24px;
        padding: 40px 35px;
        margin-bottom: 30px;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: var(--cool-shadow);
        transition: transform 0.4s cubic-bezier(0.19, 1, 0.22, 1), box-shadow 0.4s cubic-bezier(0.19, 1, 0.22, 1);

        /* L'effet 3D est conservé */
        transform: perspective(1500px) rotateY(-5deg);
    }

    #card-morale .process-card {
        transform: perspective(1500px) rotateY(5deg);
    }

    @media (max-width: 991.98px) {

        .process-card,
        #card-morale .process-card {
            transform: none;
        }
    }

    .process-card:hover {
        transform: perspective(1500px) rotateY(0) scale(1.04) translateY(-10px);
        box-shadow: var(--cool-shadow-hover);
    }

    /* ----- Titre dans la carte ----- */
    .process-card .card-title {
        font-size: 1.8rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 30px;
    }

    /* ----- Liste des pré-requis ----- */
    .process-list {
        list-style: none;
        padding: 0;
        margin: 0;
        flex-grow: 1;
    }

    .process-list li {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        font-size: 1rem;
        color: var(--text-muted);
        line-height: 1.6;
    }

    .process-list li i {
        color: var(--brand-red);
        font-size: 1.5rem;
        margin-right: 20px;
        width: 24px;
        transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), color 0.3s ease;
    }

    .process-card:hover .process-list li i {
        transform: scale(1.3) rotate(-15deg);
        color: var(--brand-yellow);
    }

    .process-list li a {
        color: var(--brand-red);
        font-weight: 500;
        text-decoration: underline;
        text-decoration-color: rgba(236, 40, 28, 0.3);
        transition: all 0.3s ease;
    }

    .process-list li a:hover {
        color: #ff7e5f;
        text-decoration-color: #ff7e5f;
    }


    /* ----- Bouton d'action "Remplissage Énergique" ----- */
    .btn-custom-red {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background: transparent;
        color: var(--brand-red) !important;
        border: 2px solid var(--brand-red);
        padding: 14px 32px;
        font-weight: 600;
        border-radius: 50px;
        transition: all 0.4s ease;
        align-self: flex-start;
        margin-top: auto;
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .btn-custom-red:hover {
        color: white !important;
        border-color: transparent;
        transform: translateY(-3px);
    }

    .btn-custom-red::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: var(--aurora-gradient);
        transition: transform 0.4s cubic-bezier(0.7, 0, 0.3, 1);
        transform: scaleX(0);
        transform-origin: right;
        z-index: -1;
    }

    .btn-custom-red:hover::before {
        transform: scaleX(1);
        transform-origin: left;
    }

    .btn-custom-red .icon-arrow {
        transition: transform 0.3s ease;
    }

    .btn-custom-red:hover .icon-arrow {
        transform: translateX(5px);
    }
</style>
@endsection


@section('content')
<section class="account-section-reimagined py-5">
    @include('includes.main.loading')
    @include('includes.main.header')

    <br><br><br><br>

    <div class="container pt-5 pb-5">
        {{-- Le contenu textuel original est entièrement restauré ici --}}
        <div class="section-heading mb-5 text-center">
            <h4 class="sub-heading" data-text-animation="fade-in" data-duration="1.5"><span class="left-shape"></span>Ouvrir un Compte</h4>
            <h2 class="section-title">Adhérez à la COCEC</h2>
            <p>
                L’adhésion à la COCEC est libre et volontaire pour toute personne physique ou morale jouissant d’une bonne moralité.
                Téléchargez la fiche d’adhésion, remplissez-la et envoyez-la par mail à <a href="mailto:cocec2004@yahoo.fr">cocec2004@yahoo.fr</a> ou <a href="mailto:cocec@cocectogo.org">cocec@cocectogo.org</a> avec les pièces requises, ou remplissez le formulaire en ligne.
            </p>
        </div>

        <div class="row justify-content-center align-items-stretch g-lg-5">
            <!-- Personne Physique -->
            <div class="col-lg-6 col-md-12 d-flex mb-5 mb-lg-0" id="card-physique">
                <div class="process-card">
                    {{-- Titre original restauré --}}
                    <h3 class="card-title">Personne Physique</h3>
                    <ul class="process-list">
                        <li><i class="fas fa-file-alt"></i><span>Remplir le <a href="{{ asset('documents/adhesion-physique.pdf') }}" target="_blank">formulaire d’adhésion</a> ou utiliser le formulaire en ligne.</span></li>
                        <li><i class="fas fa-id-card"></i><span>Copie de la pièce d’identité (CNI, passeport, permis, etc.).</span></li>
                        <li><i class="fas fa-camera"></i><span>Deux photos d’identité.</span></li>
                        <li><i class="fas fa-coins"></i><span>Souscrire à une part sociale de 5 000 FCFA.</span></li>
                        <li><i class="fas fa-hand-holding-usd"></i><span>Payer les frais d’adhésion de 2 000 FCFA.</span></li>
                        <li><i class="fas fa-scroll"></i><span>Respecter les statuts et règlements intérieurs.</span></li>
                    </ul>
                    {{-- Bouton original restauré --}}
                    <a href="{{ route('account.create.physic') }}" class="btn btn-custom-red">
                        <span>Remplir le formulaire</span>
                        <i class="fas fa-arrow-right icon-arrow"></i>
                    </a>
                </div>
            </div>

            <!-- Personne Morale -->
            <div class="col-lg-6 col-md-12 d-flex" id="card-morale">
                <div class="process-card">
                    {{-- Titre original restauré --}}
                    <h3 class="card-title">Personne Morale</h3>
                    <ul class="process-list">
                        <li><i class="fas fa-file-signature"></i><span>Remplir le <a href="{{ asset('documents/adhesion-morale.pdf') }}" target="_blank">formulaire d’adhésion</a> ou utiliser le formulaire en ligne.</span></li>
                        <li><i class="fas fa-building"></i><span>Copie du récépissé, carte d’opérateur économique, ou statuts.</span></li>
                        <li><i class="fas fa-user-tie"></i><span>Copie des pièces d’identité des responsables.</span></li>
                        <li><i class="fas fa-images"></i><span>Deux photos d’identité de chaque responsable.</span></li>
                        <li><i class="fas fa-hand-holding-usd"></i><span>Verser les frais d’adhésion de 2 000 FCFA.</span></li>
                        <li><i class="fas fa-layer-group"></i><span>Souscrire à trois parts sociales (15 000 FCFA).</span></li>
                    </ul>
                    {{-- Bouton original restauré --}}
                    <a href="{{ route('account.create.morale') }}" class="btn btn-custom-red">
                        <span>Remplir le formulaire</span>
                        <i class="fas fa-arrow-right icon-arrow"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <br><br><br>

    @include('includes.main.scroll')
    @include('includes.main.footer')
</section>
@endsection

@section('js')
{{-- Il n'y a pas de changement dans le JS, car l'animation du bouton est gérée en pur CSS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        gsap.from('.section-heading', {
            opacity: 0,
            y: 50,
            duration: 1,
            ease: 'power3.out',
            delay: 0.3
        });

        gsap.from('.process-card', {
            opacity: 0,
            y: 50,
            duration: 1,
            ease: 'power3.out',
            stagger: 0.2,
            delay: 0.6
        });
    });
</script>
@endsection