@extends('layout.main')

@section('css')
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .offer-detail-section {
        padding: 100px 0;
        background-color: #f7f8fc;
    }

    .offer-main-content h2 {
        font-weight: 700;
        color: #000;
        margin-bottom: 25px;
        font-size: 1.8rem;
    }

    .offer-main-content .description-section {
        color: #555;
        line-height: 1.8;
        font-size: 1.1rem;
    }

    /* La carte résumé sur le côté */
    .summary-card {
        background: #FFFFFF;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        border: 1px solid #e9eaec;
        /* Rendre la carte "collante" au scroll */
        position: -webkit-sticky;
        position: sticky;
        top: 120px;
        /* Espace par rapport au header */
    }

    .summary-card .btn-apply {
        width: 100%;
        padding: 15px;
        font-weight: 600;
        font-size: 1.1rem;
        background-color: #EC281C;
        border-color: #EC281C;
        transition: all 0.3s ease;
    }

    .summary-card .btn-apply:hover {
        background-color: #c41e12;
        border-color: #c41e12;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(236, 40, 28, 0.3);
    }

    .summary-card-header h3 {
        font-size: 1.4rem;
        font-weight: 600;
        color: #000;
        line-height: 1.4;
    }

    .summary-card-header .company {
        font-size: 1rem;
        color: #666;
        margin-bottom: 20px;
    }

    .summary-list {
        list-style: none;
        padding: 0;
        margin-top: 20px;
        border-top: 1px solid #eee;
    }

    .summary-list li {
        display: flex;
        align-items: center;
        padding: 15px 0;
        font-size: 1rem;
        border-bottom: 1px solid #eee;
    }

    .summary-list li i {
        font-size: 1.2rem;
        margin-right: 15px;
        width: 25px;
        text-align: center;
        color: #EC281C;
        /* Remplacé la condition dynamique par une couleur fixe */
    }

    .summary-list li strong {
        color: #333;
        margin-right: 8px;
    }

    .summary-list li span {
        color: #555;
        font-weight: 600;
        /* Styles statiques pour correspondre à l'élément HTML */
        text-transform: capitalize;
    }

    /* Styles pour le formulaire (identiques à la page carrière pour la cohérence) */
    #formulaire-candidature {
        padding: 100px 0;
        background-color: #FFFFFF;
    }

    .form-container {
        max-width: 800px;
        margin: 0 auto;
    }

    .input-group-custom {
        position: relative;
        margin-bottom: 1.2rem;
    }

    .input-group-custom .form-label {
        font-weight: 500;
        color: #343a40;
        margin-bottom: 8px;
    }

    .input-group-custom .icon {
        position: absolute;
        top: calc(50% + 12px);
        transform: translateY(-50%);
        left: 18px;
        color: #adb5bd;
        font-size: 1.1rem;
        transition: color 0.3s ease;
        pointer-events: none;
    }

    .input-group-custom .form-control {
        padding-left: 50px;
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding-top: 12px;
        padding-bottom: 12px;
    }

    .input-group-custom .form-control:focus+.icon,
    .input-group-custom:focus-within .icon {
        color: #EC281C;
    }

    /* Section partage */
    .share-section {
        text-align: center;
        margin-top: 25px;
    }

    .share-section p {
        font-weight: 500;
        color: #555;
        margin-bottom: 10px;
    }

    .share-links a {
        color: #888;
        font-size: 1.5rem;
        margin: 0 10px;
        transition: color 0.3s ease;
    }

    .share-links a:hover {
        color: #EC281C;
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
                {{-- Le titre de la page est le titre de l'offre --}}
                <h1 class="title-pro">{{ $offer->title }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb-pro">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('career') }}">Carrière & Emploi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ \Illuminate\Support\Str::limit($offer->title, 30) }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- ./ page-header -->

    <section class="offer-detail-section">
        <div class="container">
            <div class="row">
                <!-- COLONNE GAUCHE : DÉTAILS DE L'OFFRE -->
                <div class="col-lg-7 col-md-12 offer-main-content">
                    <h2>Description du poste</h2>
                    <div class="description-section">
                        {{-- Utilisation de {!! !!} pour interpréter le HTML qui pourrait venir d'un éditeur de texte (ex: TinyMCE) 
                             Assurez-vous que le contenu de la description est bien nettoyé avant d'être sauvegardé en base de données pour éviter les failles XSS --}}
                        {!! $offer->description !!}
                    </div>
                </div>

                <!-- COLONNE DROITE : CARTE RÉSUMÉ (STICKY) -->
                <div class="col-lg-5 col-md-12">
                    <aside class="summary-card">
                        <div class="summary-card-header">
                            <h3>{{ $offer->title }}</h3>
                            <p class="company">COCEC SA</p>
                        </div>

                        <a href="#formulaire-candidature" class="btn btn-primary btn-apply">
                            <i class="fas fa-paper-plane me-2"></i> Postuler à cette offre
                        </a>

                        <ul class="summary-list">
                            <li>
                                <i class="fas fa-file-contract"></i>
                                <strong>Type :</strong>
                                <span>{{ $offer->type }}</span>
                            </li>
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <strong>Lieu :</strong>
                                <span>Lomé, Togo (ou variable si besoin)</span>
                            </li>
                            <li>
                                <i class="fas fa-calendar-alt"></i>
                                <strong>Publié :</strong>
                                <span>{{ $offer->created_at->diffForHumans() }}</span>
                            </li>
                        </ul>

                        <div class="share-section">
                            <p>Partager cette opportunité</p>
                            <div class="share-links">
                                {{-- Remplacer # par les vrais liens de partage --}}
                                <a href="#" title="Partager sur LinkedIn"><i class="fab fa-linkedin"></i></a>
                                <a href="#" title="Partager sur Facebook"><i class="fab fa-facebook-square"></i></a>
                                <a href="#" title="Partager par e-mail"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </section>


    <!-- SECTION FORMULAIRE DE CANDIDATURE -->
    <section id="formulaire-candidature">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title">Postulez pour : {{ $offer->title }}</h2>
                <p>Remplissez le formulaire ci-dessous pour nous envoyer votre candidature. Notre équipe l'examinera avec la plus grande attention.</p>
            </div>

            <div class="form-container">
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('career.apply.offer', $offer->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="intitule" value="{{ $offer->title }}">
                    <input type="hidden" name="application_type" value="{{ $offer->type }}">

                    <div class="row">
                        <div class="col-md-6 mb-3 input-group-custom"><label class="form-label">Nom</label><i class="icon fas fa-user"></i><input type="text" class="form-control" name="last_name" required></div>
                        <div class="col-md-6 mb-3 input-group-custom"><label class="form-label">Prénom</label><i class="icon fas fa-user-friends"></i><input type="text" class="form-control" name="first_name" required></div>
                        <div class="col-md-6 mb-3 input-group-custom"><label class="form-label">Contact (Téléphone)</label><i class="icon fas fa-phone"></i><input type="tel" class="form-control" name="phone" required></div>
                        <div class="col-md-6 mb-3 input-group-custom"><label class="form-label">Email</label><i class="icon fas fa-envelope"></i><input type="email" class="form-control" name="email" required></div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Votre CV (PDF)</label>
                            <input type="file" class="form-control" name="cv" accept=".pdf" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Lettre de motivation (PDF)</label>
                            <input type="file" class="form-control" name="motivation_letter" accept=".pdf" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-submit-form bz-primary-btn red-btn mt-4">Envoyer ma candidature</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @include('includes.main.scroll')
    @include('includes.main.footer')
</body>

@endsection