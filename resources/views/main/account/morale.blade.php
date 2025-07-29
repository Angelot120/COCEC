@extends('layout.main')

@section('css')
{{-- CSS pour la carte interactive Leaflet --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<style>
    .account-form-section {
        background-color: #f7f8fc;
        font-family: 'Poppins', sans-serif;
    }

    .form-container {
        max-width: 900px;
        margin: 0 auto;
        background: #FFFFFF;
        border-radius: 16px;
        padding: 40px 50px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        border-top: 5px solid #EC281C;
    }

    .section-heading h2 {
        font-weight: 700;
        color: #000000;
    }

    .section-heading p {
        color: #555;
        line-height: 1.7;
    }

    .nav-tabs {
        border-bottom: 2px solid #e9ecef;
    }

    .nav-tabs .nav-item {
        margin-bottom: -2px;
    }

    .nav-tabs .nav-link {
        border: none;
        border-bottom: 2px solid transparent;
        color: #6c757d;
        font-weight: 500;
        padding: 12px 20px;
        transition: all 0.3s ease;
    }

    .nav-tabs .nav-link:hover {
        color: #000000;
    }

    .nav-tabs .nav-link.active {
        background-color: transparent;
        color: #EC281C;
        font-weight: 600;
        border-color: #EC281C;
    }

    .form-section-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-top: 35px;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }

    .input-group-custom {
        position: relative;
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
        padding-top: 12px;
        padding-bottom: 12px;
    }

    .input-group-custom:focus-within .icon {
        color: #EC281C;
    }

    .form-stepper {
        display: flex;
        justify-content: space-around;
        width: 100%;
        position: relative;
        margin: 30px 0;
    }

    .form-stepper .step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        z-index: 1;
        text-align: center;
    }

    .form-stepper .step-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #e0e0e0;
        color: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        transition: all 0.3s ease;
        border: 3px solid #e0e0e0;
    }

    .form-stepper .step-label {
        margin-top: 10px;
        font-size: 0.8rem;
        color: #6c757d;
        font-weight: 500;
    }

    .form-stepper .step.active .step-icon,
    .form-stepper .step.completed .step-icon {
        background: #EC281C;
        border-color: #EC281C;
    }

    .form-stepper .step.active .step-label {
        color: #EC281C;
        font-weight: 600;
    }

    .form-stepper::before {
        content: '';
        position: absolute;
        top: 20px;
        left: 0;
        right: 0;
        height: 2px;
        background-color: #e0e0e0;
        transform: translateY(-50%);
        z-index: 0;
    }

    .form-stepper .progress-line {
        position: absolute;
        top: 20px;
        left: 0;
        height: 2px;
        background-color: #EC281C;
        transform: translateY(-50%);
        z-index: 0;
        width: 0%;
        transition: width 0.4s ease;
    }

    .form-step-content {
        display: none;
    }

    .form-step-content.active {
        display: block;
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-navigation-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 40px;
    }

    .btn-nav {
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        border: none;
    }

    .btn-prev {
        background-color: #6c757d;
        color: white;
    }

    .btn-next {
        background-color: #EC281C;
        color: white;
    }

    .btn-submit-form {
        font-size: 1rem;
        border-radius: 8px;
        padding: 14px 35px;
        width: auto;
    }

    .file-upload-wrapper {
        position: relative;
        border: 2px dashed #e0e0e0;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        transition: border-color 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .file-upload-wrapper:hover {
        border-color: #EC281C;
    }

    .file-upload-wrapper input[type="file"] {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .file-upload-icon {
        color: #EC281C;
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .file-upload-text {
        font-weight: 500;
        color: #555;
    }

    .file-upload-preview span {
        font-style: italic;
        color: #000;
        font-weight: 500;
    }

    .choice-container .choice-label {
        display: block;
        padding: 15px 20px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }

    .choice-container input[type="radio"] {
        display: none;
    }

    .choice-container input[type="radio"]:checked+.choice-label {
        border-color: #EC281C;
        background-color: #ec281c1a;
        font-weight: 600;
        color: #EC281C;
    }

    .method-area {
        margin-top: 20px;
        padding: 20px;
        border: 1px solid #eee;
        border-radius: 8px;
        display: none;
    }

    #signature-pad-morale {
        border: 2px solid #f0f0f0;
        border-radius: 8px;
        width: 100%;
        height: 200px;
        cursor: crosshair;
        background-color: #fff;
    }

    .signature-controls {
        margin-top: 15px;
        text-align: right;
    }

    .map-container {
        height: 350px;
        border-radius: 8px;
        border: 1px solid #ddd;
        z-index: 1;
    }

    .btn-clear {
        background: #6c757d;
        color: white;
        border-radius: 6px;
        padding: 8px 16px;
        font-weight: 500;
        border: none;
    }

    .versements-summary {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
    }

    .versements-summary .row-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #e9ecef;
    }

    .versements-summary .label {
        color: #6c757d;
    }

    .versements-summary .value,
    .versements-summary .total-value {
        font-weight: 600;
        color: #000;
    }

    .versements-summary .total-row {
        border-top: 2px solid #343a40;
        margin-top: 10px;
        padding-top: 10px;
    }

    .versements-summary .total-label,
    .versements-summary .total-value {
        font-size: 1.2rem;
        font-weight: 700;
        color: #EC281C;
    }

    .form-control.is-invalid,
    .was-validated .form-control:invalid,
    .file-upload-wrapper.is-invalid,
    .choice-container.is-invalid .choice-label {
        border-color: #dc3545 !important;
    }

    .file-upload-wrapper.is-invalid {
        border-style: solid;
    }

    .form-control.is-invalid:focus,
    .was-validated .form-control:invalid:focus {
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
    }

    .invalid-feedback {
        display: none;
        width: 100%;
        margin-top: .25rem;
        font-size: .875em;
        color: #dc3545;
    }

    .was-validated .form-control:invalid~.invalid-feedback,
    .form-control.is-invalid~.invalid-feedback,
    .choice-container.is-invalid+.invalid-feedback {
        display: block;
    }

    .dynamic-field {
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 20px;
        position: relative;
    }

    .dynamic-field .remove-field {
        top: 10px;
        right: 10px;
    }
</style>
@endsection

@section('content')
<section class="account-form-section py-5">
    @include('includes.main.loading')
    @include('includes.main.header')

    <section class="page-header-pro">
        <div class="page-header-overlay"></div>
        <div class="container">
            <div class="page-header-content-pro" data-aos="fade-up">
                <h1 class="title-pro">Compte en Ligne - Personne Morale</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb-pro">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Compte en Ligne</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <br><br>

    <div class="container">
        <div class="form-container">
            <div class="section-heading mb-4 text-center">
                <h4 class="sub-heading"><span class="left-shape"></span>Compte en Ligne</h4>
                <h2 class="section-title">Ouvrez Votre Compte Professionnel COCEC</h2>
                <p>Rejoignez la COCEC en remplissant le formulaire ci-dessous. C'est simple, rapide et sécurisé.</p>
            </div>

            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <p class="mb-0"><strong>Oups !</strong> Veuillez corriger les erreurs indiquées en rouge ci-dessous avant de continuer.</p>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- FORMULAIRE PERSONNE MORALE -->
            <form action="{{ route('account.store.moral') }}" method="POST" enctype="multipart/form-data" class="adhesion-form multi-step-form" id="morale" novalidate>
                @csrf

                <div class="form-stepper">
                    <div class="progress-line"></div>
                    <div class="step active" data-step="1">
                        <div class="step-icon">1</div>
                        <div class="step-label">Entité</div>
                    </div>
                    <div class="step" data-step="2">
                        <div class="step-icon">2</div>
                        <div class="step-label">Dirigeant</div>
                    </div>
                    <div class="step" data-step="3">
                        <div class="step-icon">3</div>
                        <div class="step-label">Procès-verbaux</div>
                    </div>
                    <div class="step" data-step="4">
                        <div class="step-icon">4</div>
                        <div class="step-label">Contact d'urgence</div>
                    </div>
                    <div class="step" data-step="5">
                        <div class="step-icon">5</div>
                        <div class="step-label">Co-dirigeants</div>
                    </div>
                    <div class="step" data-step="6">
                        <div class="step-icon">6</div>
                        <div class="step-label">Signataires</div>
                    </div>
                    <div class="step" data-step="7">
                        <div class="step-icon">7</div>
                        <div class="step-label">Documents</div>
                    </div>
                    <div class="step" data-step="8">
                        <div class="step-icon">8</div>
                        <div class="step-label">Bénéficiaires</div>
                    </div>
                    <div class="step" data-step="9">
                        <div class="step-icon">9</div>
                        <div class="step-label">Versements</div>
                    </div>
                    <div class="step" data-step="10">
                        <div class="step-icon">10</div>
                        <div class="step-label">Informations réservées</div>
                    </div>
                </div>

                <!-- Étape 1: Entité -->
                <div class="form-step-content active" data-step="1">
                    <h4 class="form-section-title">Informations sur l'Entité</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Dénomination / Raison Sociale</label>
                            <i class="icon fas fa-building"></i>
                            <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required>
                            <div class="invalid-feedback">@error('company_name') {{ $message }} @else Ce champ est requis. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Catégorie</label>
                            <i class="icon fas fa-tags"></i>
                            <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}">
                            <div class="invalid-feedback">@error('category') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">N° RCCM / Récépissé</label>
                            <i class="icon fas fa-file-contract"></i>
                            <input type="text" class="form-control @error('rccm') is-invalid @enderror" name="rccm" value="{{ old('rccm') }}" required>
                            <div class="invalid-feedback">@error('rccm') {{ $message }} @else Ce champ est requis. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Type de pièce d'identification</label>
                            <i class="icon fas fa-id-card"></i>
                            <input type="text" class="form-control @error('company_id_type') is-invalid @enderror" name="company_id_type" value="{{ old('company_id_type') }}">
                            <div class="invalid-feedback">@error('company_id_type') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Numéro de pièce</label>
                            <i class="icon fas fa-id-card"></i>
                            <input type="text" class="form-control @error('company_id_number') is-invalid @enderror" name="company_id_number" value="{{ old('company_id_number') }}">
                            <div class="invalid-feedback">@error('company_id_number') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Date d'enregistrement</label>
                            <i class="icon fas fa-calendar-alt"></i>
                            <input type="date" class="form-control @error('company_id_date') is-invalid @enderror" name="company_id_date" value="{{ old('company_id_date') }}">
                            <div class="invalid-feedback">@error('company_id_date') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Date de création</label>
                            <i class="icon fas fa-calendar-alt"></i>
                            <input type="date" class="form-control @error('creation_date') is-invalid @enderror" name="creation_date" value="{{ old('creation_date') }}" max="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" required>
                            <div class="invalid-feedback">@error('creation_date') {{ $message }} @else Ce champ est requis. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Lieu de création</label>
                            <i class="icon fas fa-map-marker-alt"></i>
                            <input type="text" class="form-control @error('creation_place') is-invalid @enderror" name="creation_place" value="{{ old('creation_place') }}" required>
                            <div class="invalid-feedback">@error('creation_place') {{ $message }} @else Ce champ est requis. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Secteur d'activité</label>
                            <i class="icon fas fa-briefcase"></i>
                            <input type="text" class="form-control @error('activity_sector') is-invalid @enderror" name="activity_sector" value="{{ old('activity_sector') }}" required>
                            <div class="invalid-feedback">@error('activity_sector') {{ $message }} @else Ce champ est requis. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Description de l'activité</label>
                            <i class="icon fas fa-file-alt"></i>
                            <textarea class="form-control @error('activity_description') is-invalid @enderror" name="activity_description" rows="4">{{ old('activity_description') }}</textarea>
                            <div class="invalid-feedback">@error('activity_description') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Nationalité de l'entreprise</label>
                            <i class="icon fas fa-flag"></i>
                            <input type="text" class="form-control @error('company_nationality') is-invalid @enderror" name="company_nationality" value="{{ old('company_nationality') }}" required>
                            <div class="invalid-feedback">@error('company_nationality') {{ $message }} @else Ce champ est requis. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Téléphone</label>
                            <i class="icon fas fa-phone"></i>
                            <input type="tel" class="form-control @error('company_phone') is-invalid @enderror" name="company_phone" value="{{ old('company_phone') }}" pattern="\+?[0-9\s\-\(\)]{7,15}" required>
                            <div class="invalid-feedback">@error('company_phone') {{ $message }} @else Numéro de téléphone invalide. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Boîte postale</label>
                            <i class="icon fas fa-mailbox"></i>
                            <input type="text" class="form-control @error('company_postal_box') is-invalid @enderror" name="company_postal_box" value="{{ old('company_postal_box') }}">
                            <div class="invalid-feedback">@error('company_postal_box') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Ville</label>
                            <i class="icon fas fa-city"></i>
                            <input type="text" class="form-control @error('company_city') is-invalid @enderror" name="company_city" value="{{ old('company_city') }}">
                            <div class="invalid-feedback">@error('company_city') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Quartier</label>
                            <i class="icon fas fa-map-signs"></i>
                            <input type="text" class="form-control @error('company_neighborhood') is-invalid @enderror" name="company_neighborhood" value="{{ old('company_neighborhood') }}">
                            <div class="invalid-feedback">@error('company_neighborhood') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                    </div>
                    <h4 class="form-section-title">Adresse de l'Entité</h4>
                    <div class="row mb-3 choice-container @error('loc_method_company') is-invalid @enderror">
                        <div class="col-6">
                            <input type="radio" name="loc_method_company" id="desc_company" value="description" {{ old('loc_method_company', 'description') == 'description' ? 'checked' : '' }} required>
                            <label for="desc_company" class="choice-label"><i class="fas fa-keyboard"></i> Décrire l'adresse</label>
                        </div>
                        <div class="col-6">
                            <input type="radio" name="loc_method_company" id="map_company" value="map" {{ old('loc_method_company') == 'map' ? 'checked' : '' }}>
                            <label for="map_company" class="choice-label"><i class="fas fa-map-marked-alt"></i> Sélectionner sur une carte</label>
                        </div>
                        <div class="invalid-feedback">@error('loc_method_company') {{ $message }} @else Veuillez choisir une méthode. @enderror</div>
                    </div>
                    <div class="method-area" id="description-area-company">
                        <div class="input-group-custom">
                            <label class="form-label">Description détaillée de l'adresse</label>
                            <textarea class="form-control @error('company_address') is-invalid @enderror" name="company_address" rows="4" placeholder="Indiquer ville, quartier, rue, repères..." required>{{ old('company_address') }}</textarea>
                            <div class="invalid-feedback">@error('company_address') {{ $message }} @else Ce champ est requis si vous choisissez de décrire l'adresse. @enderror</div>
                        </div>
                    </div>
                    <div class="method-area" id="map-area-company">
                        <label class="form-label">Cliquez sur la carte ou déplacez le marqueur pour indiquer l'adresse de l'entité</label>
                        <div id="map-container-company" class="map-container"></div>
                        <input type="hidden" name="company_lat" id="latitude-company" value="{{ old('company_lat') }}" required>
                        <input type="hidden" name="company_lng" id="longitude-company" value="{{ old('company_lng') }}" required>
                        <div class="invalid-feedback">@error('company_lat') Une position sur la carte est requise. @else Veuillez sélectionner un point sur la carte. @enderror</div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Schéma/Plan</label>
                        <div class="file-upload-wrapper @error('company_plan_path') is-invalid @enderror">
                            <div class="file-upload-content">
                                <i class="fas fa-file-image file-upload-icon"></i>
                                <p class="file-upload-text">Importer un schéma/plan (JPEG, PNG, JPG, PDF)</p>
                            </div>
                            <div class="file-upload-preview"></div>
                            <input type="file" name="company_plan_path" accept="image/jpeg,image/png,image/jpg,application/pdf">
                            <div class="invalid-feedback">@error('company_plan_path') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                    </div>
                </div>

                <!-- Étape 2: Dirigeant -->
                <div class="form-step-content" data-step="2">
                    <h4 class="form-section-title">Informations sur le Dirigeant</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Nom</label>
                            <i class="icon fas fa-user-tie"></i>
                            <input type="text" class="form-control @error('director_name') is-invalid @enderror" name="director_name" value="{{ old('director_name') }}" required>
                            <div class="invalid-feedback">@error('director_name') {{ $message }} @else Ce champ est requis. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Prénoms</label>
                            <i class="icon fas fa-user-tie"></i>
                            <input type="text" class="form-control @error('director_first_name') is-invalid @enderror" name="director_first_name" value="{{ old('director_first_name') }}">
                            <div class="invalid-feedback">@error('director_first_name') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Poste</label>
                            <i class="icon fas fa-user-tag"></i>
                            <input type="text" class="form-control @error('director_position') is-invalid @enderror" name="director_position" value="{{ old('director_position') }}" required>
                            <div class="invalid-feedback">@error('director_position') {{ $message }} @else Ce champ est requis. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Sexe</label>
                            <i class="icon fas fa-venus-mars"></i>
                            <select class="form-control @error('director_gender') is-invalid @enderror" name="director_gender" style="padding-left: 50px;" required>
                                <option value="">Sélectionner...</option>
                                <option value="M" {{ old('director_gender') == 'M' ? 'selected' : '' }}>Masculin</option>
                                <option value="F" {{ old('director_gender') == 'F' ? 'selected' : '' }}>Féminin</option>
                            </select>
                            <div class="invalid-feedback">@error('director_gender') {{ $message }} @else Ce champ est requis. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Nationalité</label>
                            <i class="icon fas fa-flag"></i>
                            <input type="text" class="form-control @error('director_nationality') is-invalid @enderror" name="director_nationality" value="{{ old('director_nationality') }}" required>
                            <div class="invalid-feedback">@error('director_nationality') {{ $message }} @else Ce champ est requis. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Date de Naissance</label>
                            <i class="icon fas fa-calendar-alt"></i>
                            <input type="date" class="form-control @error('director_birth_date') is-invalid @enderror" name="director_birth_date" value="{{ old('director_birth_date') }}" max="{{ \Carbon\Carbon::today()->subYears(18)->format('Y-m-d') }}" required>
                            <div class="invalid-feedback">@error('director_birth_date') {{ $message }} @else Ce champ est requis. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Lieu de Naissance</label>
                            <i class="icon fas fa-map-marker-alt"></i>
                            <input type="text" class="form-control @error('director_birth_place') is-invalid @enderror" name="director_birth_place" value="{{ old('director_birth_place') }}" required>
                            <div class="invalid-feedback">@error('director_birth_place') {{ $message }} @else Ce champ est requis. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Numéro de pièce d'identité</label>
                            <i class="icon fas fa-id-card"></i>
                            <input type="text" class="form-control @error('director_id_number') is-invalid @enderror" name="director_id_number" value="{{ old('director_id_number') }}" required>
                            <div class="invalid-feedback">@error('director_id_number') {{ $message }} @else Ce champ est requis. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Date d'émission de la pièce</label>
                            <i class="icon fas fa-calendar-alt"></i>
                            <input type="date" class="form-control @error('director_id_issue_date') is-invalid @enderror" name="director_id_issue_date" value="{{ old('director_id_issue_date') }}">
                            <div class="invalid-feedback">@error('director_id_issue_date') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Téléphone</label>
                            <i class="icon fas fa-mobile-alt"></i>
                            <input type="tel" class="form-control @error('director_phone') is-invalid @enderror" name="director_phone" value="{{ old('director_phone') }}" pattern="\+?[0-9\s\-\(\)]{7,15}" required>
                            <div class="invalid-feedback">@error('director_phone') {{ $message }} @else Numéro de téléphone invalide. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Nom du père</label>
                            <i class="icon fas fa-user"></i>
                            <input type="text" class="form-control @error('director_father_name') is-invalid @enderror" name="director_father_name" value="{{ old('director_father_name') }}">
                            <div class="invalid-feedback">@error('director_father_name') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Nom de la mère</label>
                            <i class="icon fas fa-user"></i>
                            <input type="text" class="form-control @error('director_mother_name') is-invalid @enderror" name="director_mother_name" value="{{ old('director_mother_name') }}">
                            <div class="invalid-feedback">@error('director_mother_name') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Boîte postale</label>
                            <i class="icon fas fa-mailbox"></i>
                            <input type="text" class="form-control @error('director_postal_box') is-invalid @enderror" name="director_postal_box" value="{{ old('director_postal_box') }}">
                            <div class="invalid-feedback">@error('director_postal_box') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Ville</label>
                            <i class="icon fas fa-city"></i>
                            <input type="text" class="form-control @error('director_city') is-invalid @enderror" name="director_city" value="{{ old('director_city') }}">
                            <div class="invalid-feedback">@error('director_city') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Quartier</label>
                            <i class="icon fas fa-map-signs"></i>
                            <input type="text" class="form-control @error('director_neighborhood') is-invalid @enderror" name="director_neighborhood" value="{{ old('director_neighborhood') }}">
                            <div class="invalid-feedback">@error('director_neighborhood') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Adresse</label>
                            <i class="icon fas fa-map-marker-alt"></i>
                            <textarea class="form-control @error('director_address') is-invalid @enderror" name="director_address" rows="4">{{ old('director_address') }}</textarea>
                            <div class="invalid-feedback">@error('director_address') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Nom du/de la conjoint(e)</label>
                            <i class="icon fas fa-user-heart"></i>
                            <input type="text" class="form-control @error('director_spouse_name') is-invalid @enderror" name="director_spouse_name" value="{{ old('director_spouse_name') }}">
                            <div class="invalid-feedback">@error('director_spouse_name') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Profession du/de la conjoint(e)</label>
                            <i class="icon fas fa-briefcase"></i>
                            <input type="text" class="form-control @error('director_spouse_occupation') is-invalid @enderror" name="director_spouse_occupation" value="{{ old('director_spouse_occupation') }}">
                            <div class="invalid-feedback">@error('director_spouse_occupation') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Téléphone du/de la conjoint(e)</label>
                            <i class="icon fas fa-phone"></i>
                            <input type="tel" class="form-control @error('director_spouse_phone') is-invalid @enderror" name="director_spouse_phone" value="{{ old('director_spouse_phone') }}" pattern="\+?[0-9\s\-\(\)]{7,15}">
                            <div class="invalid-feedback">@error('director_spouse_phone') {{ $message }} @else Numéro de téléphone invalide. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Adresse du/de la conjoint(e)</label>
                            <i class="icon fas fa-map-marker-alt"></i>
                            <textarea class="form-control @error('director_spouse_address') is-invalid @enderror" name="director_spouse_address" rows="4">{{ old('director_spouse_address') }}</textarea>
                            <div class="invalid-feedback">@error('director_spouse_address') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                    </div>
                </div>

                <!-- Étape 3: Procès-verbaux -->
                <div class="form-step-content" data-step="3">
                    <h4 class="form-section-title">Procès-verbaux</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Membres du procès-verbal</label>
                            <i class="icon fas fa-users"></i>
                            <input type="text" class="form-control @error('minutes_members') is-invalid @enderror" name="minutes_members" value="{{ old('minutes_members') }}" required>
                            <div class="invalid-feedback">@error('minutes_members') {{ $message }} @else Ce champ est requis. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Réunion du procès-verbal</label>
                            <i class="icon fas fa-file-alt"></i>
                            <input type="text" class="form-control @error('minutes_meeting') is-invalid @enderror" name="minutes_meeting" value="{{ old('minutes_meeting') }}" required>
                            <div class="invalid-feedback">@error('minutes_meeting') {{ $message }} @else Ce champ est requis. @enderror</div>
                        </div>
                    </div>
                </div>

                <!-- Étape 4: Contact d'urgence -->
                <div class="form-step-content" data-step="4">
                    <h4 class="form-section-title">Contact d'Urgence</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Nom & Prénoms</label>
                            <i class="icon fas fa-user-check"></i>
                            <input type="text" class="form-control @error('emergency_contact_name') is-invalid @enderror" name="emergency_contact_name" value="{{ old('emergency_contact_name') }}" required>
                            <div class="invalid-feedback">@error('emergency_contact_name') {{ $message }} @else Ce champ est requis. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Téléphone</label>
                            <i class="icon fas fa-phone"></i>
                            <input type="tel" class="form-control @error('emergency_contact_phone') is-invalid @enderror" name="emergency_contact_phone" value="{{ old('emergency_contact_phone') }}" pattern="\+?[0-9\s\-\(\)]{7,15}" required>
                            <div class="invalid-feedback">@error('emergency_contact_phone') {{ $message }} @else Numéro de téléphone invalide. @enderror</div>
                        </div>
                        <div class="col-md-12 mb-3 input-group-custom">
                            <label class="form-label">Adresse</label>
                            <i class="icon fas fa-map-marker-alt"></i>
                            <textarea class="form-control @error('emergency_contact_address') is-invalid @enderror" name="emergency_contact_address" rows="4">{{ old('emergency_contact_address') }}</textarea>
                            <div class="invalid-feedback">@error('emergency_contact_address') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                    </div>
                </div>

                <!-- Étape 5: Co-dirigeants -->
                <div class="form-step-content" data-step="5">
                    <h4 class="form-section-title">Co-dirigeants</h4>
                    <div id="co-directors-container"></div>
                    <button type="button" class="btn btn-outline-primary mt-2 dynamic-adder-btn" data-container="co-directors-container" data-type="co_director"><i class="fas fa-plus"></i> Ajouter un co-dirigeant</button>
                </div>

                <!-- Étape 6: Signataires du compte -->
                <div class="form-step-content" data-step="6">
                    <h4 class="form-section-title">Signataires du Compte</h4>
                    <div id="account-signatories-container"></div>
                    <button type="button" class="btn btn-outline-primary mt-2 dynamic-adder-btn" data-container="account-signatories-container" data-type="account_signatory"><i class="fas fa-plus"></i> Ajouter un signataire</button>
                    <div class="invalid-feedback" id="account-signatories-error" style="display: none;">Veuillez ajouter au moins deux signataires.</div>
                </div>

                <!-- Étape 7: Documents -->
                <div class="form-step-content" data-step="7">
                    <h4 class="form-section-title">Documents Juridiques</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Document de l'entreprise</label>
                            <div class="file-upload-wrapper @error('company_document_path') is-invalid @enderror">
                                <div class="file-upload-content">
                                    <i class="fas fa-file-pdf file-upload-icon"></i>
                                    <p class="file-upload-text">Importer le document (PDF)</p>
                                </div>
                                <div class="file-upload-preview"></div>
                                <input type="file" name="company_document_path" accept="application/pdf" required>
                                <div class="invalid-feedback">@error('company_document_path') {{ $message }} @else Le document est requis (PDF). @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Photo des responsables</label>
                            <div class="file-upload-wrapper @error('responsible_persons_photo_path') is-invalid @enderror">
                                <div class="file-upload-content">
                                    <i class="fas fa-camera file-upload-icon"></i>
                                    <p class="file-upload-text">Choisir une photo (JPEG, PNG, JPG)</p>
                                </div>
                                <div class="file-upload-preview"></div>
                                <input type="file" name="responsible_persons_photo_path" accept="image/jpeg,image/png,image/jpg" required>
                                <div class="invalid-feedback">@error('responsible_persons_photo_path') {{ $message }} @else Une photo est requise. @enderror</div>
                            </div>
                        </div>
                    </div>

                    <!-- ==== BLOC SIGNATURE CORRIGÉ ==== -->
                    <h4 class="form-section-title mt-4">Signature du Dirigeant</h4>
                    <div class="row choice-container @error('signature_method') is-invalid @enderror">
                        <div class="col-6">
                            <input type="radio" name="signature_method" id="draw_morale" value="draw" {{ old('signature_method', 'draw') == 'draw' ? 'checked' : '' }} required>
                            <label for="draw_morale" class="choice-label"><i class="fas fa-pencil-alt"></i> Dessiner</label>
                        </div>
                        <div class="col-6">
                            <input type="radio" name="signature_method" id="upload_morale" value="upload" {{ old('signature_method') == 'upload' ? 'checked' : '' }}>
                            <label for="upload_morale" class="choice-label"><i class="fas fa-upload"></i> Importer</label>
                        </div>
                        <div class="invalid-feedback">@error('signature_method') {{ $message }} @else Une méthode de signature est requise. @enderror</div>
                    </div>
                    <div class="method-area" id="draw-area-morale">
                        <p class="text-muted small">Signez dans le cadre ci-dessous.</p>
                        <canvas id="signature-pad-morale" width="600" height="200"></canvas>
                        <div class="signature-controls">
                            <button type="button" class="btn-clear">Effacer</button>
                        </div>
                        <input type="hidden" name="signature_data" id="signature-data-morale">
                        <div class="invalid-feedback" id="signature-draw-error-morale" style="display: none;">Veuillez dessiner une signature.</div>
                    </div>
                    <div class="method-area" id="upload-area-morale">
                        <div class="file-upload-wrapper @error('signature_upload') is-invalid @enderror">
                            <div class="file-upload-content">
                                <i class="fas fa-file-image file-upload-icon"></i>
                                <p class="file-upload-text">Importer (PNG)</p>
                            </div>
                            <div class="file-upload-preview"></div>
                            <input type="file" name="signature_upload" accept="image/png">
                            <div class="invalid-feedback">@error('signature_upload') {{ $message }} @else L'import de la signature est requis. @enderror</div>
                        </div>
                    </div>
                    <!-- ==== FIN BLOC SIGNATURE CORRIGÉ ==== -->
                </div>

                <!-- Étape 8: Bénéficiaires -->
                <div class="form-step-content" data-step="8">
                    <h4 class="form-section-title">Bénéficiaires</h4>
                    <div id="beneficiaries-container"></div>
                    <button type="button" class="btn btn-outline-primary mt-2 dynamic-adder-btn" data-container="beneficiaries-container" data-type="beneficiary"><i class="fas fa-plus"></i> Ajouter un bénéficiaire</button>
                    <div class="invalid-feedback" id="beneficiaries-error" style="display: none;">Veuillez ajouter au moins un bénéficiaire.</div>
                </div>

                <!-- Étape 9: Versements -->
                <div class="form-step-content" data-step="9">
                    <h4 class="form-section-title">Versements Initiaux</h4>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="input-group-custom mb-3">
                                <label class="form-label">Dépôt Initial (FCFA)</label>
                                <i class="icon fas fa-money-bill-wave"></i>
                                <input type="number" class="form-control @error('initial_deposit') is-invalid @enderror" id="depot-initial-morale" name="initial_deposit" value="{{ old('initial_deposit', 0) }}" min="0" step="1000" required>
                                <div class="invalid-feedback">@error('initial_deposit') {{ $message }} @else Ce champ est requis. @enderror</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="versements-summary">
                                <div class="row-item"><span class="label">Droit d'adhésion</span> <span class="value">2,000 FCFA</span></div>
                                <div class="row-item"><span class="label">Part Sociale</span> <span class="value">15,000 FCFA</span></div>
                                <div class="row-item total-row"><span class="total-label">TOTAL À VERSER</span> <span class="total-value" id="total-versement-morale">17,000 FCFA</span></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Étape 10: Informations réservées -->
                <div class="form-step-content" data-step="10">
                    <h4 class="form-section-title">Informations Réservées</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Date d'adhésion</label>
                            <i class="icon fas fa-calendar-alt"></i>
                            <input type="date" class="form-control @error('membership_date') is-invalid @enderror" name="membership_date" value="{{ old('membership_date') }}">
                            <div class="invalid-feedback">@error('membership_date') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Numéro de compte</label>
                            <i class="icon fas fa-id-card"></i>
                            <input type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number') }}">
                            <div class="invalid-feedback">@error('account_number') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Date d'ouverture du compte</label>
                            <i class="icon fas fa-calendar-alt"></i>
                            <input type="date" class="form-control @error('account_opening_date') is-invalid @enderror" name="account_opening_date" value="{{ old('account_opening_date') }}">
                            <div class="invalid-feedback">@error('account_opening_date') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Personne politiquement exposée (national) ?</label>
                            <i class="icon fas fa-user-shield"></i>
                            <select class="form-control @error('is_ppe_national') is-invalid @enderror" name="is_ppe_national" id="is_ppe_national" style="padding-left: 50px;" required>
                                <option value="0" {{ old('is_ppe_national', '0') == '0' ? 'selected' : '' }}>Non</option>
                                <option value="1" {{ old('is_ppe_national') == '1' ? 'selected' : '' }}>Oui</option>
                            </select>
                            <div class="invalid-feedback">@error('is_ppe_national') {{ $message }} @else Ce champ est requis. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Personne politiquement exposée (étranger) ? <span id="ppe-foreign-required" style="color: #dc3545; display: none;">*</span></label>
                            <i class="icon fas fa-user-shield"></i>
                            <select class="form-control @error('ppe_foreign') is-invalid @enderror" name="ppe_foreign" id="ppe_foreign" style="padding-left: 50px;" required>
                                <option value="0" {{ old('ppe_foreign', '0') == '0' ? 'selected' : '' }}>Non</option>
                                <option value="1" {{ old('ppe_foreign') == '1' ? 'selected' : '' }}>Oui</option>
                            </select>
                            <div class="invalid-feedback">@error('ppe_foreign') {{ $message }} @else Ce champ est requis si vous n'êtes pas PPE national. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Sanctions financières</label>
                            <i class="icon fas fa-gavel"></i>
                            <input type="text" class="form-control @error('sanctions') is-invalid @enderror" name="sanctions" value="{{ old('sanctions') }}">
                            <div class="invalid-feedback">@error('sanctions') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-6 mb-3 input-group-custom">
                            <label class="form-label">Financement du terrorisme</label>
                            <i class="icon fas fa-exclamation-triangle"></i>
                            <input type="text" class="form-control @error('terrorism_financing') is-invalid @enderror" name="terrorism_financing" value="{{ old('terrorism_financing') }}">
                            <div class="invalid-feedback">@error('terrorism_financing') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                        <div class="col-md-12 mb-3 input-group-custom">
                            <label class="form-label">Remarques particulières</label>
                            <i class="icon fas fa-comment"></i>
                            <textarea class="form-control @error('remarks') is-invalid @enderror" name="remarks" rows="4">{{ old('remarks') }}</textarea>
                            <div class="invalid-feedback">@error('remarks') {{ $message }} @else Ce champ est optionnel. @enderror</div>
                        </div>
                    </div>
                </div>

                <div class="form-navigation-buttons">
                    <button type="button" class="btn btn-nav btn-prev" style="display: none;">Précédent</button>
                    <button type="button" class="btn btn-nav btn-next">Suivant</button>
                    <button type="submit" class="btn btn-submit-form btn-next" style="display: none;">Soumettre l'adhésion</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection


@section('js')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const forms = document.querySelectorAll('.multi-step-form');
        forms.forEach(form => {
            const steps = form.querySelectorAll('.form-step-content');
            const stepperItems = form.querySelectorAll('.form-stepper .step');
            const progressLine = form.querySelector('.form-stepper .progress-line');
            const prevBtn = form.querySelector('.btn-prev');
            const nextBtn = form.querySelector('.btn-next');
            const submitBtn = form.querySelector('.btn-submit-form');
            let currentStep = 1;
            const maps = new Map();

            function updateProgress() {
                const progress = (currentStep / steps.length) * 100;
                progressLine.style.width = `${progress}%`;
                stepperItems.forEach((item, index) => {
                    item.classList.toggle('active', index + 1 <= currentStep);
                    if (index + 1 < currentStep) {
                        item.classList.add('completed');
                    } else {
                        item.classList.remove('completed');
                    }
                });
            }

            function showStep(step) {
                steps.forEach(s => s.classList.remove('active'));
                steps[step - 1].classList.add('active');
                prevBtn.style.display = step === 1 ? 'none' : 'inline-block';
                nextBtn.style.display = step === steps.length ? 'none' : 'inline-block';
                submitBtn.style.display = step === steps.length ? 'inline-block' : 'none';
                updateProgress();

                const mapContainer = steps[step - 1].querySelector('.map-container');
                if (mapContainer) {
                    const mapObj = maps.get(mapContainer.id);
                    if (mapObj) {
                        setTimeout(() => mapObj.invalidate(), 100);
                    }
                }
            }

            function validateStep(step) {
                const currentStepContent = steps[step - 1];
                let isValid = true;

                form.classList.add('was-validated'); // Active bootstrap validation styles

                const requiredInputs = currentStepContent.querySelectorAll('input[required], select[required], textarea[required]');
                requiredInputs.forEach(input => {
                    if (input.name.includes('signature')) return;

                    if (!input.checkValidity()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });

                // Validation spécifique pour les champs dynamiques
                if (step === 6) { // Signataires
                    const container = currentStepContent.querySelector('#account-signatories-container');
                    const errorElement = currentStepContent.querySelector('#account-signatories-error');
                    if (container.children.length < 2) {
                        errorElement.style.display = 'block';
                        isValid = false;
                    } else {
                        errorElement.style.display = 'none';
                    }
                }
                if (step === 8) { // Bénéficiaires
                    const container = currentStepContent.querySelector('#beneficiaries-container');
                    const errorElement = currentStepContent.querySelector('#beneficiaries-error');
                    if (container.children.length < 1) {
                        errorElement.style.display = 'block';
                        isValid = false;
                    } else {
                        errorElement.style.display = 'none';
                    }
                }

                // Validation de la méthode de localisation
                if (step === 1) {
                    const locMethod = currentStepContent.querySelector('input[name="loc_method_company"]:checked');
                    const choiceContainer = currentStepContent.querySelector('input[name="loc_method_company"]').closest('.choice-container');
                    if (!locMethod) {
                        choiceContainer.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        choiceContainer.classList.remove('is-invalid');
                    }
                }

                // ==== BLOC VALIDATION SIGNATURE CORRIGÉ ====
                if (step === 7) {
                    const signatureMethod = currentStepContent.querySelector('input[name="signature_method"]:checked');
                    const choiceContainer = currentStepContent.querySelector('input[name="signature_method"]').closest('.choice-container');

                    if (signatureMethod) {
                        choiceContainer.classList.remove('is-invalid');
                        if (signatureMethod.value === 'draw') {
                            const canvas = currentStepContent.querySelector('#signature-pad-morale');
                            const signaturePad = canvas.signaturePadInstance;
                            if (signaturePad && signaturePad.isEmpty()) {
                                currentStepContent.querySelector('#signature-draw-error-morale').style.display = 'block';
                                isValid = false;
                            } else {
                                currentStepContent.querySelector('#signature-draw-error-morale').style.display = 'none';
                            }
                        } else if (signatureMethod.value === 'upload') {
                            const signatureUpload = currentStepContent.querySelector('input[name="signature_upload"]');
                            if (!signatureUpload.files.length) {
                                signatureUpload.closest('.file-upload-wrapper').classList.add('is-invalid');
                                isValid = false;
                            } else {
                                signatureUpload.closest('.file-upload-wrapper').classList.remove('is-invalid');
                            }
                        }
                    } else {
                        choiceContainer.classList.add('is-invalid');
                        isValid = false;
                    }
                }
                // ==== FIN BLOC VALIDATION SIGNATURE CORRIGÉ ====

                if (!isValid) {
                    const firstInvalid = currentStepContent.querySelector('.is-invalid, .ng-invalid, :invalid');
                    if (firstInvalid) {
                        firstInvalid.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    }
                }

                return isValid;
            }

            prevBtn.addEventListener('click', () => {
                if (currentStep > 1) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            nextBtn.addEventListener('click', () => {
                if (validateStep(currentStep) && currentStep < steps.length) {
                    currentStep++;
                    showStep(currentStep);
                }
            });

            const depotInput = form.querySelector('#depot-initial-morale');
            const totalSpan = form.querySelector('#total-versement-morale');
            if (depotInput && totalSpan) {
                const baseAmount = 17000;
                depotInput.addEventListener('input', () => {
                    const depot = parseFloat(depotInput.value) || 0;
                    totalSpan.textContent = `${(baseAmount + depot).toLocaleString('fr-FR')} FCFA`;
                });
            }

            form.querySelectorAll('.dynamic-adder-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const containerId = btn.dataset.container;
                    const type = btn.dataset.type;
                    const container = document.getElementById(containerId);
                    const index = container.querySelectorAll('.dynamic-field').length;
                    let template = '';

                    if (type === 'co_director') {
                        template = `
                            <div class="dynamic-field p-3 mb-3 border rounded position-relative">
                                <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-field">X</button>
                                <h5>Co-dirigeant ${index + 1}</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Nom</label>
                                        <i class="icon fas fa-user"></i>
                                        <input type="text" class="form-control" name="co_directors[${index}][name]" required>
                                        <div class="invalid-feedback">Ce champ est requis.</div>
                                    </div>
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Prénoms</label>
                                        <i class="icon fas fa-user"></i>
                                        <input type="text" class="form-control" name="co_directors[${index}][first_name]">
                                        <div class="invalid-feedback">Ce champ est optionnel.</div>
                                    </div>
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Sexe</label>
                                        <i class="icon fas fa-venus-mars"></i>
                                        <select class="form-control" name="co_directors[${index}][gender]" style="padding-left: 50px;" required>
                                            <option value="">Sélectionner...</option>
                                            <option value="M">Masculin</option>
                                            <option value="F">Féminin</option>
                                        </select>
                                        <div class="invalid-feedback">Ce champ est requis.</div>
                                    </div>
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Nationalité</label>
                                        <i class="icon fas fa-flag"></i>
                                        <input type="text" class="form-control" name="co_directors[${index}][nationality]" required>
                                        <div class="invalid-feedback">Ce champ est requis.</div>
                                    </div>
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Date de naissance</label>
                                        <i class="icon fas fa-calendar-alt"></i>
                                        <input type="date" class="form-control" name="co_directors[${index}][birth_date]" max="{{ \Carbon\Carbon::today()->subYears(18)->format('Y-m-d') }}" required>
                                        <div class="invalid-feedback">Ce champ est requis.</div>
                                    </div>
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Lieu de naissance</label>
                                        <i class="icon fas fa-map-marker-alt"></i>
                                        <input type="text" class="form-control" name="co_directors[${index}][birth_place]" required>
                                        <div class="invalid-feedback">Ce champ est requis.</div>
                                    </div>
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Numéro de pièce d'identité</label>
                                        <i class="icon fas fa-id-card"></i>
                                        <input type="text" class="form-control" name="co_directors[${index}][id_number]" required>
                                        <div class="invalid-feedback">Ce champ est requis.</div>
                                    </div>
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Date d'émission de la pièce</label>
                                        <i class="icon fas fa-calendar-alt"></i>
                                        <input type="date" class="form-control" name="co_directors[${index}][id_issue_date]">
                                        <div class="invalid-feedback">Ce champ est optionnel.</div>
                                    </div>
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Boîte postale</label>
                                        <i class="icon fas fa-mailbox"></i>
                                        <input type="text" class="form-control" name="co_directors[${index}][postal_box]">
                                        <div class="invalid-feedback">Ce champ est optionnel.</div>
                                    </div>
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Ville</label>
                                        <i class="icon fas fa-city"></i>
                                        <input type="text" class="form-control" name="co_directors[${index}][city]">
                                        <div class="invalid-feedback">Ce champ est optionnel.</div>
                                    </div>
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Quartier</label>
                                        <i class="icon fas fa-map-signs"></i>
                                        <input type="text" class="form-control" name="co_directors[${index}][neighborhood]">
                                        <div class="invalid-feedback">Ce champ est optionnel.</div>
                                    </div>
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Adresse</label>
                                        <i class="icon fas fa-map-marker-alt"></i>
                                        <textarea class="form-control" name="co_directors[${index}][address]" rows="4"></textarea>
                                        <div class="invalid-feedback">Ce champ est optionnel.</div>
                                    </div>
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Téléphone</label>
                                        <i class="icon fas fa-phone"></i>
                                        <input type="tel" class="form-control" name="co_directors[${index}][phone]" pattern="\+?[0-9\s\-\(\)]{7,15}" required>
                                        <div class="invalid-feedback">Numéro de téléphone invalide.</div>
                                    </div>
                                </div>
                            </div>`;
                    } else if (type === 'account_signatory') {
                        template = `
                            <div class="dynamic-field p-3 mb-3 border rounded position-relative">
                                <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-field">X</button>
                                <h5>Signataire ${index + 1}</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Nom</label>
                                        <i class="icon fas fa-user"></i>
                                        <input type="text" class="form-control" name="account_signatories[${index}][name]" required>
                                        <div class="invalid-feedback">Ce champ est requis.</div>
                                    </div>
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Type de signature</label>
                                        <i class="icon fas fa-pen"></i>
                                        <select class="form-control" name="account_signatories[${index}][signature_type]" style="padding-left: 50px;" required>
                                            <option value="">Sélectionner...</option>
                                            <option value="unique">Unique</option>
                                            <option value="conjointe">Conjointe</option>
                                        </select>
                                        <div class="invalid-feedback">Ce champ est requis.</div>
                                    </div>
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Numéro de pièce d'identité</label>
                                        <i class="icon fas fa-id-card"></i>
                                        <input type="text" class="form-control" name="account_signatories[${index}][id_number]">
                                        <div class="invalid-feedback">Ce champ est optionnel.</div>
                                    </div>
                                </div>
                            </div>`;
                    } else if (type === 'beneficiary') {
                        template = `
                            <div class="dynamic-field p-3 mb-3 border rounded position-relative">
                                <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-field">X</button>
                                <h5>Bénéficiaire ${index + 1}</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Nom & Prénoms</label>
                                        <i class="icon fas fa-user"></i>
                                        <input type="text" class="form-control" name="beneficiaries[${index}][nom]" required>
                                        <div class="invalid-feedback">Ce champ est requis.</div>
                                    </div>
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Contact</label>
                                        <i class="icon fas fa-phone"></i>
                                        <input type="tel" class="form-control" name="beneficiaries[${index}][contact]" pattern="\+?[0-9\s\-\(\)]{7,15}" required>
                                        <div class="invalid-feedback">Numéro de téléphone invalide.</div>
                                    </div>
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Lien / Relation</label>
                                        <i class="icon fas fa-users"></i>
                                        <input type="text" class="form-control" name="beneficiaries[${index}][lien]" required>
                                        <div class="invalid-feedback">Ce champ est requis.</div>
                                    </div>
                                    <div class="col-md-6 mb-3 input-group-custom">
                                        <label class="form-label">Date de naissance</label>
                                        <i class="icon fas fa-calendar-alt"></i>
                                        <input type="date" class="form-control" name="beneficiaries[${index}][birth_date]">
                                        <div class="invalid-feedback">Ce champ est optionnel.</div>
                                    </div>
                                </div>
                            </div>`;
                    }
                    container.insertAdjacentHTML('beforeend', template);
                    container.querySelectorAll('.remove-field').forEach(removeBtn => {
                        removeBtn.addEventListener('click', () => {
                            removeBtn.closest('.dynamic-field').remove();
                            validateStep(currentStep);
                        });
                    });
                });

                form.querySelectorAll('input[type="file"]').forEach(input => {
                    input.addEventListener('change', () => {
                        const wrapper = input.closest('.file-upload-wrapper');
                        const preview = wrapper.querySelector('.file-upload-preview');
                        const file = input.files[0];
                        if (file) {
                            preview.innerHTML = `<span>${file.name}</span>`;
                            wrapper.classList.remove('is-invalid');
                        } else {
                            preview.innerHTML = '';
                            wrapper.classList.toggle('is-invalid', input.hasAttribute('required'));
                        }
                    });
                });

                const locRadios = form.querySelectorAll('input[name="loc_method_company"]');
                locRadios.forEach(radio => {
                    radio.addEventListener('change', () => {
                        const descArea = form.querySelector('#description-area-company');
                        const mapArea = form.querySelector('#map-area-company');
                        const descInput = descArea.querySelector('textarea[name="company_address"]');
                        const latInput = mapArea.querySelector('input[name="company_lat"]');
                        const lngInput = mapArea.querySelector('input[name="company_lng"]');

                        descArea.style.display = radio.value === 'description' ? 'block' : 'none';
                        mapArea.style.display = radio.value === 'map' ? 'block' : 'none';
                        descInput.toggleAttribute('required', radio.value === 'description');
                        latInput.toggleAttribute('required', radio.value === 'map');
                        lngInput.toggleAttribute('required', radio.value === 'map');

                        if (radio.value === 'map') {
                            const mapObj = maps.get('map-container-company');
                            if (mapObj) {
                                setTimeout(() => mapObj.invalidate(), 100);
                            }
                        }
                    });
                    if (radio.checked) radio.dispatchEvent(new Event('change'));
                });

                function initializeLeafletMap(mapId, latInputId, lonInputId) {
                    const mapContainer = document.getElementById(mapId);
                    if (!mapContainer) return null;

                    const latInput = document.getElementById(latInputId);
                    const lonInput = document.getElementById(lonInputId);
                    const fallbackCoords = [6.1375, 1.2226];
                    let map;
                    let marker;

                    const setupMap = (coords) => {
                        if (map) {
                            map.setView(coords, 14);
                            marker.setLatLng(coords);
                            updateInputs(coords);
                            return;
                        }

                        map = L.map(mapId).setView(coords, 14);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                        }).addTo(map);

                        marker = L.marker(coords, {
                            draggable: true
                        }).addTo(map);
                        updateInputs(marker.getLatLng());

                        marker.on('dragend', (event) => updateInputs(event.target.getLatLng()));
                        map.on('click', (e) => {
                            marker.setLatLng(e.latlng);
                            updateInputs(e.latlng);
                        });
                    };

                    const updateInputs = (latlng) => {
                        latInput.value = latlng.lat.toFixed(6);
                        lonInput.value = latlng.lng.toFixed(6);
                    };

                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(
                            (position) => setupMap([position.coords.latitude, position.coords.longitude]),
                            () => setupMap(fallbackCoords)
                        );
                    } else {
                        setupMap(fallbackCoords);
                    }

                    return {
                        invalidate: () => {
                            if (map) map.invalidateSize();
                        }
                    };
                }

                maps.set('map-container-company', initializeLeafletMap('map-container-company', 'latitude-company', 'longitude-company'));

                // ==== FONCTIONS SIGNATURE CORRIGÉES ====
                function setupSignatureChoice() {
                    const radioButtons = form.querySelectorAll('input[name="signature_method"]');
                    if (!radioButtons.length) return;

                    const drawArea = form.querySelector('#draw-area-morale');
                    const uploadArea = form.querySelector('#upload-area-morale');
                    const canvas = form.querySelector('#signature-pad-morale');
                    const uploadInput = form.querySelector('input[name="signature_upload"]');
                    let signaturePadInstance = null;

                    function updateSignatureArea() {
                        const selectedValue = form.querySelector('input[name="signature_method"]:checked')?.value;
                        if (!selectedValue) return;

                        drawArea.style.display = selectedValue === 'draw' ? 'block' : 'none';
                        uploadArea.style.display = selectedValue === 'upload' ? 'block' : 'none';
                        uploadInput.toggleAttribute('required', selectedValue === 'upload');

                        if (selectedValue === 'draw' && !signaturePadInstance) {
                            signaturePadInstance = initializeSignaturePad(canvas);
                        }
                    }

                    radioButtons.forEach(radio => radio.addEventListener('change', updateSignatureArea));
                    updateSignatureArea();
                }

                function initializeSignaturePad(canvas) {
                    if (!canvas) return null;

                    const hiddenInput = form.querySelector('#signature-data-morale');
                    const clearBtn = form.querySelector('#draw-area-morale .btn-clear');
                    let signaturePad = null;

                    const resizeCanvas = () => {
                        const ratio = Math.max(window.devicePixelRatio || 1, 1);
                        const parentWidth = canvas.parentElement.offsetWidth;

                        if (parentWidth > 0) {
                            canvas.width = parentWidth * ratio;
                            canvas.height = (canvas.offsetHeight || 200) * ratio;
                            canvas.getContext('2d').scale(ratio, ratio);

                            const data = signaturePad ? signaturePad.toData() : [];

                            signaturePad = new SignaturePad(canvas, {
                                backgroundColor: 'rgb(255, 255, 255)',
                                penColor: 'rgb(0, 0, 0)'
                            });
                            canvas.signaturePadInstance = signaturePad;
                            signaturePad.fromData(data);

                            signaturePad.addEventListener('endStroke', () => {
                                if (!signaturePad.isEmpty()) {
                                    hiddenInput.value = signaturePad.toDataURL('image/png');
                                    form.querySelector('#signature-draw-error-morale').style.display = 'none';
                                } else {
                                    hiddenInput.value = '';
                                }
                            });
                        }
                    };

                    const resizeObserver = new ResizeObserver(resizeCanvas);
                    resizeObserver.observe(canvas.parentElement);

                    resizeCanvas();

                    clearBtn.addEventListener('click', () => {
                        if (signaturePad) {
                            signaturePad.clear();
                        }
                        hiddenInput.value = '';
                        form.querySelector('#signature-draw-error-morale').style.display = 'none';
                    });

                    return signaturePad;
                }

                setupSignatureChoice();
                // ==== FIN FONCTIONS SIGNATURE CORRIGÉES ====


                const isPpeNationalSelect = form.querySelector('#is_ppe_national');
                const ppeForeignSelect = form.querySelector('#ppe_foreign');
                const ppeForeignRequired = form.querySelector('#ppe-foreign-required');

                function updatePpeForeignRequirement() {
                    const isPpeNational = isPpeNationalSelect.value === '1';
                    ppeForeignSelect.toggleAttribute('required', !isPpeNational);
                    ppeForeignRequired.style.display = isPpeNational ? 'none' : 'inline';
                    if (isPpeNational) {
                        ppeForeignSelect.value = '';
                    }
                }

                isPpeNationalSelect.addEventListener('change', updatePpeForeignRequirement);
                updatePpeForeignRequirement();

                showStep(currentStep);
            });
        });
    });
</script>
@endsection