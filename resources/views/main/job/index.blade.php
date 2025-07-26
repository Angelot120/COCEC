@extends('layout.main')

@section('css')
<style>
    /* Styles généraux */
    .career-section {
        padding: 100px 0;
        background-color: #FFFFFF;
        font-family: 'Poppins', sans-serif;
    }

    .offers-section {
        padding: 100px 0;
        background-color: #f7f8fc;
    }

    .form-section {
        padding: 100px 0;
        background-color: #FFFFFF;
    }

    .section-heading h2 {
        font-weight: 700;
        color: #000000;
    }

    .section-heading p {
        color: #555;
        line-height: 1.7;
        max-width: 700px;
        margin: 0 auto;
    }

    /* Styles pour les cartes d'offres d'emploi */
    .job-offer-card {
        background: #FFFFFF;
        border-radius: 12px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-left: 5px solid #EC281C;
        /* Accent rouge */
    }

    .job-offer-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    }

    .job-offer-card .job-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #000000;
        margin-bottom: 10px;
    }

    .job-offer-card .job-description {
        color: #666;
        margin-bottom: 20px;
    }

    .job-type-badge {
        display: inline-block;
        padding: 5px 15px;
        border-radius: 50px;
        font-weight: 500;
        font-size: 0.85rem;
        text-transform: uppercase;
    }

    .job-type-badge.emploi {
        background-color: #ec281c2a;
        color: #EC281C;
    }

    .job-type-badge.stage {
        background-color: #ffcc004a;
        color: #d3a400;
    }

    /* Styles pour le formulaire (réutilisation) */
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

    /* .file-upload-wrapper {
    } */

    /* .btn-submit-form {
    } */
</style>
@endsection

@section('content')


<body>
    @include('includes.main.loading')
    <!-- ./ preloader -->

    @include('includes.main.header')


    <section class="page-header-pro">
        {{-- L'image de fond est appliquée via CSS pour plus de flexibilité --}}
        <div class="page-header-overlay"></div>
        <div class="container">
            <div class="page-header-content-pro" data-aos="fade-up">
                <h1 class="title-pro">Carrière & Emploi</h1>

                {{-- Utilisation d'une structure sémantique pour le fil d'Ariane --}}
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb-pro">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Carrière & Emploi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- ./ page-header -->

    <!-- Section Héros -->
    <section class="career-section text-center">
        <div class="container">
            <div class="section-heading">
                <h4 class="sub-heading"><span class="left-shape"></span>Carrière & Emploi</h4>
                <h2 class="section-title">Rejoignez Notre Équipe</h2>
                <p>À la COCEC, nous croyons que notre plus grande force réside dans les personnes qui composent notre équipe. Nous sommes toujours à la recherche de talents passionnés et dévoués pour nous aider à grandir et à mieux servir nos membres.</p>
            </div>
        </div>
    </section>

    <!-- Section des Offres d'Emploi -->
    <section class="offers-section">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title">Nos Offres Actuelles</h2>
            </div>
            <div class="row">
                @forelse($jobOffers as $offer)
                <div class="col-md-12">
                    <div class="job-offer-card d-md-flex justify-content-between align-items-center">
                        <div>
                            <span class="job-type-badge mb-2 {{ $offer->type }}">{{ $offer->type }}</span>
                            <h3 class="job-title">{{ $offer->title }}</h3>
                            <p class="job-description">{{ \Illuminate\Support\Str::limit($offer->description, 150) }}</p>
                        </div>
                        <a href="#" class="btn btn-primary bz-primary-btn red-btn">Voir l'offre</a>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p class="lead">Il n'y a aucune offre d'emploi disponible pour le moment. N'hésitez pas à nous envoyer une candidature spontanée !</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Section du Formulaire de Candidature Spontanée -->
    <section class="form-section">
        <div class="container">
            <div class="section-heading text-center mb-5">
                <h2 class="section-title">Candidature Spontanée</h2>
                <p>Aucune offre ne correspond à votre profil ? Envoyez-nous votre candidature et nous vous contacterons si une opportunité se présente.</p>
            </div>

            <div class="form-container">
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('career.apply') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3 input-group-custom"><label class="form-label">Nom</label><i class="icon fas fa-user"></i><input type="text" class="form-control" name="last_name" required></div>
                        <div class="col-md-6 mb-3 input-group-custom"><label class="form-label">Prénom</label><i class="icon fas fa-user-friends"></i><input type="text" class="form-control" name="first_name" required></div>
                        <div class="col-md-6 mb-3 input-group-custom"><label class="form-label">Contact (Téléphone)</label><i class="icon fas fa-phone"></i><input type="tel" class="form-control" name="phone" required></div>
                        <div class="col-md-6 mb-3 input-group-custom"><label class="form-label">Email</label><i class="icon fas fa-envelope"></i><input type="email" class="form-control" name="email" required></div>

                        <!-- NOUVEAU CHAMP AJOUTÉ ICI -->
                        <div class="col-12 mb-3 input-group-custom">
                            <label class="form-label">Intitulé du poste souhaité</label>
                            <i class="icon fas fa-bullseye"></i>
                            <input type="text" class="form-control" name="intitule" placeholder="Ex: Comptable, Agent de crédit, Stagiaire en marketing..." required>
                        </div>
                        <!-- FIN DU NOUVEAU CHAMP -->

                        <div class="col-12 mb-3 input-group-custom">
                            <label class="form-label">Type de Poste souhaité</label><i class="icon fas fa-briefcase"></i>
                            <select class="form-control" name="application_type" style="padding-left: 50px;" required>
                                <option value="">Sélectionnez une option...</option>
                                <option value="emploi">Emploi</option>
                                <option value="stage">Stage</option>
                            </select>
                        </div>
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
    <!-- ./ contact-section -->
    @include('includes.main.scroll')
    @include('includes.main.footer')
</body>

@endsection