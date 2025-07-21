@extends('layout.main')

@section('css')
{{-- CSS pour la carte interactive Leaflet --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<style>
    /* ------------------------------------------- */
    /* STYLE FINAL, COMPLET ET CORRIGÉ             */
    /* ------------------------------------------- */
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

    .file-upload-preview img {
        max-width: 150px;
        max-height: 150px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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

    #signature-pad,
    #signature-pad-morale {
        border: 2px solid #f0f0f0;
        border-radius: 8px;
        width: 100%;
        height: 200px;
        cursor: crosshair;
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

    .versemants-summary {
        background-color: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
    }

    .versemants-summary .row-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #e9ecef;
    }

    .versemants-summary .label {
        color: #6c757d;
    }

    .versemants-summary .value,
    .versemants-summary .total-value {
        font-weight: 600;
        color: #000;
    }

    .versemants-summary .total-row {
        border-top: 2px solid #343a40;
        margin-top: 10px;
        padding-top: 10px;
    }

    .versemants-summary .total-label,
    .versemants-summary .total-value {
        font-size: 1.2rem;
        font-weight: 700;
        color: #EC281C;
    }

    /* Style pour les champs invalides (bordure rouge) */
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
        /* Caché par défaut */
        width: 100%;
        margin-top: .25rem;
        font-size: .875em;
        color: #dc3545;
    }

    .was-validated .form-control:invalid~.invalid-feedback,
    .form-control.is-invalid~.invalid-feedback {
        display: block;
    }

    .choice-container.is-invalid+.invalid-feedback {
        margin-top: -10px;
        margin-bottom: 15px;
        display: block;
    }
</style>
@endsection

@section('content')
<section class="account-form-section py-5">
    @include('includes.main.loading')
    @include('includes.main.header')

    <div style="padding-top: 100px;"></div>

    <div class="container">
        <div class="form-container">
            <div class="section-heading mb-4 text-center">
                <h4 class="sub-heading"><span class="left-shape"></span>Compte en Ligne</h4>
                <h2 class="section-title">Ouvrez Votre Compte COCEC</h2>
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

            <ul class="nav nav-tabs mb-4" id="adhesionTabs" role="tablist">
                <li class="nav-item" role="presentation"><button class="nav-link active" id="physique-tab" data-bs-toggle="tab" data-bs-target="#physique" type="button" role="tab">Personne Physique</button></li>
                <li class="nav-item" role="presentation"><button class="nav-link" id="morale-tab" data-bs-toggle="tab" data-bs-target="#morale" type="button" role="tab">Personne Morale</button></li>
            </ul>

            <div class="tab-content" id="adhesionTabsContent">
                <!-- ======================== FORMULAIRE PERSONNE PHYSIQUE ======================== -->
                <div class="tab-pane fade show active" id="physique" role="tabpanel">
                    <form action="{{ route('account.store.physical') }}" method="POST" enctype="multipart/form-data" class="adhesion-form multi-step-form" id="physique" novalidate>
                        @csrf

                        <div class="form-stepper">
                            <div class="progress-line"></div>
                            <div class="step active" data-step="1">
                                <div class="step-icon">1</div>
                                <div class="step-label">Personnel</div>
                            </div>
                            <div class="step" data-step="2">
                                <div class="step-icon">2</div>
                                <div class="step-label">Compléments</div>
                            </div>
                            <div class="step" data-step="3">
                                <div class="step-icon">3</div>
                                <div class="step-label">Domicile/KYC</div>
                            </div>
                            <div class="step" data-step="4">
                                <div class="step-icon">4</div>
                                <div class="step-label">Pièces & Signature</div>
                            </div>
                            <div class="step" data-step="5">
                                <div class="step-icon">5</div>
                                <div class="step-label">Versements</div>
                            </div>
                        </div>

                        <!-- Étape 1: Informations Personnelles -->
                        <div class="form-step-content active" data-step="1">
                            <h4 class="form-section-title">Informations Personnelles</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Nom</label>
                                    <i class="icon fas fa-user"></i>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required>
                                    <div class="invalid-feedback">@error('last_name') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Prénoms</label>
                                    <i class="icon fas fa-user-friends"></i>
                                    <input type="text" class="form-control @error('first_names') is-invalid @enderror" name="first_names" value="{{ old('first_names') }}" required>
                                    <div class="invalid-feedback">@error('first_names') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Sexe</label>
                                    <i class="icon fas fa-venus-mars"></i>
                                    <select class="form-control @error('gender') is-invalid @enderror" name="gender" style="padding-left: 50px;" required>
                                        <option value="">Sélectionner...</option>
                                        <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Masculin</option>
                                        <option value="F" {{ old('gender') == 'F' ? 'selected' : '' }}>Féminin</option>
                                    </select>
                                    <div class="invalid-feedback">@error('gender') {{ $message }} @else Veuillez sélectionner une option. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Date de naissance</label>
                                    <i class="icon fas fa-calendar-alt"></i>
                                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required>
                                    <div class="invalid-feedback">@error('birth_date') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Lieu de naissance</label>
                                    <i class="icon fas fa-map-marker-alt"></i>
                                    <input type="text" class="form-control @error('birth_place') is-invalid @enderror" name="birth_place" value="{{ old('birth_place') }}" required>
                                    <div class="invalid-feedback">@error('birth_place') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Nationalité</label>
                                    <i class="icon fas fa-flag"></i>
                                    <input type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{ old('nationality') }}" required>
                                    <div class="invalid-feedback">@error('nationality') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                            </div>
                            <h4 class="form-section-title mt-4">Filiation</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Nom & Prénoms du Père</label>
                                    <i class="icon fas fa-user"></i>
                                    <input type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name') }}" required>
                                    <div class="invalid-feedback">@error('father_name') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Nom & Prénoms de la Mère</label>
                                    <i class="icon fas fa-user"></i>
                                    <input type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ old('mother_name') }}" required>
                                    <div class="invalid-feedback">@error('mother_name') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                            </div>
                        </div>

                        <!-- Étape 2: Informations Complémentaires -->
                        <div class="form-step-content" data-step="2">
                            <h4 class="form-section-title">Informations sur le Conjoint(e)</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">État Civil</label>
                                    <i class="icon fas fa-ring"></i>
                                    <input type="text" class="form-control @error('marital_status') is-invalid @enderror" name="marital_status" value="{{ old('marital_status') }}" placeholder="Ex: Célibataire, Marié(e)..." required>
                                    <div class="invalid-feedback">@error('marital_status') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Nom du/de la Conjoint(e)</label>
                                    <i class="icon fas fa-user-heart"></i>
                                    <input type="text" class="form-control @error('spouse_name') is-invalid @enderror" name="spouse_name" value="{{ old('spouse_name') }}" required>
                                    <div class="invalid-feedback">@error('spouse_name') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Profession du/de la Conjoint(e)</label>
                                    <i class="icon fas fa-user-tie"></i>
                                    <input type="text" class="form-control @error('spouse_occupation') is-invalid @enderror" name="spouse_occupation" value="{{ old('spouse_occupation') }}" required>
                                    <div class="invalid-feedback">@error('spouse_occupation') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Téléphone du/de la Conjoint(e)</label>
                                    <i class="icon fas fa-phone"></i>
                                    <input type="tel" class="form-control @error('spouse_phone') is-invalid @enderror" name="spouse_phone" value="{{ old('spouse_phone') }}" pattern="[0-9+()-\s]*" required>
                                    <div class="invalid-feedback">@error('spouse_phone') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                            </div>
                            <h4 class="form-section-title mt-4">Informations sur l'Activité Professionnelle</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Profession / Type d'activité</label>
                                    <i class="icon fas fa-briefcase"></i>
                                    <input type="text" class="form-control @error('occupation') is-invalid @enderror" name="occupation" value="{{ old('occupation') }}" required>
                                    <div class="invalid-feedback">@error('occupation') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Nom de l'entreprise (si applicable)</label>
                                    <i class="icon fas fa-building"></i>
                                    <input type="text" class="form-control @error('company_name_activity') is-invalid @enderror" name="company_name_activity" value="{{ old('company_name_activity') }}" required>
                                    <div class="invalid-feedback">@error('company_name_activity') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-12 mb-3 input-group-custom">
                                    <label class="form-label">Description de l'activité</label>
                                    <textarea class="form-control @error('activity_description') is-invalid @enderror" name="activity_description" rows="3" required>{{ old('activity_description') }}</textarea>
                                    <div class="invalid-feedback">@error('activity_description') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                            </div>
                            <h4 class="form-section-title mt-4">Personne de Référence</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Nom & Prénoms</label>
                                    <i class="icon fas fa-user-check"></i>
                                    <input type="text" class="form-control @error('ref1_name') is-invalid @enderror" name="ref1_name" value="{{ old('ref1_name') }}" required>
                                    <div class="invalid-feedback">@error('ref1_name') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Téléphone</label>
                                    <i class="icon fas fa-phone"></i>
                                    <input type="tel" class="form-control @error('ref1_phone') is-invalid @enderror" name="ref1_phone" value="{{ old('ref1_phone') }}" pattern="[0-9+()-\s]*" required>
                                    <div class="invalid-feedback">@error('ref1_phone') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                            </div>
                        </div>

                        <!-- Étape 3: Domicile & KYC -->
                        <div class="form-step-content" data-step="3">
                            <div class="alert alert-info">
                                <h5 class="alert-heading">Attestation sur l'honneur</h5>
                                <p class="mb-0">Je certifie sur l'honneur l'exactitude des informations de domicile et de travail fournies ci-dessous.</p>
                            </div>
                            <h4 class="form-section-title">Adresse du Domicile</h4>
                            <div class="row mb-3 choice-container @error('loc_method_physical') is-invalid @enderror">
                                <div class="col-6">
                                    <input type="radio" name="loc_method_physical" id="desc_physique" value="description" {{ old('loc_method_physical', 'description') == 'description' ? 'checked' : '' }} required>
                                    <label for="desc_physique" class="choice-label"><i class="fas fa-keyboard"></i> Décrire l'adresse</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" name="loc_method_physical" id="map_physique" value="map" {{ old('loc_method_physical') == 'map' ? 'checked' : '' }}>
                                    <label for="map_physique" class="choice-label"><i class="fas fa-map-marked-alt"></i> Sélectionner sur une carte</label>
                                </div>
                                <div class="invalid-feedback">@error('loc_method_physical') {{ $message }} @else Veuillez choisir une méthode. @enderror</div>
                            </div>
                            <div class="method-area" id="description-area-physique">
                                <div class="input-group-custom">
                                    <label class="form-label">Description détaillée du domicile</label>
                                    <textarea class="form-control @error('residence_description') is-invalid @enderror" name="residence_description" rows="4" placeholder="Indiquer ville, quartier, rue, repères..." required>{{ old('residence_description') }}</textarea>
                                    <div class="invalid-feedback">@error('residence_description') {{ $message }} @else Ce champ est requis si vous choisissez de décrire l'adresse. @enderror</div>
                                </div>
                            </div>
                            <div class="method-area" id="map-area-physique">
                                <label class="form-label">Cliquez sur la carte ou déplacez le marqueur pour indiquer votre domicile</label>
                                <div id="map-container-physique" class="map-container"></div>
                                <input type="hidden" name="residence_lat" id="latitude-physique" value="{{ old('residence_lat') }}" required>
                                <input type="hidden" name="residence_lng" id="longitude-physique" value="{{ old('residence_lng') }}" required>
                                <div class="invalid-feedback">@error('residence_lat') Une position sur la carte est requise. @else Veuillez sélectionner un point sur la carte. @enderror</div>
                            </div>
                            <div class="mt-3 col-12 mb-3">
                                <label class="form-label">Plan du domicile (si applicable)</label>
                                <div class="file-upload-wrapper @error('residence_plan_path') is-invalid @enderror">
                                    <div class="file-upload-content">
                                        <i class="fas fa-map-marked-alt file-upload-icon"></i>
                                        <p class="file-upload-text">Importer un plan scanné</p>
                                    </div>
                                    <div class="file-upload-preview"></div>
                                    <input type="file" name="residence_plan_path" accept="image/*,application/pdf">
                                    <div class="invalid-feedback">@error('residence_plan_path') {{ $message }} @else Une erreur est survenue avec le fichier. @enderror</div>
                                </div>
                            </div>
                            <h4 class="form-section-title mt-4">Adresse du Lieu de Travail</h4>
                            <div class="row">
                                <div class="col-12 mb-3 input-group-custom">
                                    <label class="form-label">Description détaillée du lieu de travail</label>
                                    <textarea class="form-control @error('workplace_description') is-invalid @enderror" name="workplace_description" rows="4" placeholder="Indiquer nom de l'entreprise, adresse, repères..." required>{{ old('workplace_description') }}</textarea>
                                    <div class="invalid-feedback">@error('workplace_description') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label">Plan du lieu de travail (si applicable)</label>
                                    <div class="file-upload-wrapper @error('workplace_plan_path') is-invalid @enderror">
                                        <div class="file-upload-content">
                                            <i class="fas fa-map-marked-alt file-upload-icon"></i>
                                            <p class="file-upload-text">Importer un plan scanné</p>
                                        </div>
                                        <div class="file-upload-preview"></div>
                                        <input type="file" name="workplace_plan_path" accept="image/*,application/pdf">
                                        <div class="invalid-feedback">@error('workplace_plan_path') {{ $message }} @else Une erreur est survenue avec le fichier. @enderror</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Étape 4: Pièces Jointes & Identification -->
                        <div class="form-step-content" data-step="4">
                            <h4 class="form-section-title">Pièces Jointes & Identification</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Type de pièce d'identité</label>
                                    <i class="icon fas fa-id-card"></i>
                                    <input type="text" class="form-control @error('id_type') is-invalid @enderror" name="id_type" value="{{ old('id_type') }}" placeholder="Ex: CNI, Passeport..." required>
                                    <div class="invalid-feedback">@error('id_type') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Numéro de la pièce</label>
                                    <i class="icon fas fa-hashtag"></i>
                                    <input type="text" class="form-control @error('id_number') is-invalid @enderror" name="id_number" value="{{ old('id_number') }}" required>
                                    <div class="invalid-feedback">@error('id_number') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Photo d’identité</label>
                                    <div class="file-upload-wrapper @error('photo_path') is-invalid @enderror">
                                        <div class="file-upload-content">
                                            <i class="fas fa-camera file-upload-icon"></i>
                                            <p class="file-upload-text">Cliquez pour choisir une photo</p>
                                        </div>
                                        <div class="file-upload-preview"></div>
                                        <input type="file" name="photo_path" accept="image/*" required>
                                        <div class="invalid-feedback">@error('photo_path') {{ $message }} @else Une photo est requise. @enderror</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Scan de la pièce d'identité (PDF)</label>
                                    <div class="file-upload-wrapper @error('id_scan_path') is-invalid @enderror">
                                        <div class="file-upload-content">
                                            <i class="fas fa-file-pdf file-upload-icon"></i>
                                            <p class="file-upload-text">Cliquez pour choisir un PDF</p>
                                        </div>
                                        <div class="file-upload-preview"></div>
                                        <input type="file" name="id_scan_path" accept="application/pdf" required>
                                        <div class="invalid-feedback">@error('id_scan_path') {{ $message }} @else Le scan (PDF) est requis. @enderror</div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="form-section-title mt-4">Bénéficiaires désignés (Héritiers)</h4>
                            <div id="beneficiaires-container-physique"></div>
                            <button type="button" class="btn btn-outline-primary mt-2 dynamic-adder-btn" data-container="beneficiaires-container-physique" data-type="beneficiaire"><i class="fas fa-plus"></i> Ajouter un bénéficiaire</button>

                            <h4 class="form-section-title mt-4">Signature</h4>
                            <div class="row choice-container @error('signature_method_physique') is-invalid @enderror">
                                <div class="col-6">
                                    <input type="radio" name="signature_method_physique" id="draw_physique" value="draw" {{ old('signature_method_physique', 'draw') == 'draw' ? 'checked' : '' }} required>
                                    <label for="draw_physique" class="choice-label"><i class="fas fa-pencil-alt"></i> Dessiner</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" name="signature_method_physique" id="upload_physique" value="upload" {{ old('signature_method_physique') == 'upload' ? 'checked' : '' }}>
                                    <label for="upload_physique" class="choice-label"><i class="fas fa-upload"></i> Importer</label>
                                </div>
                                <div class="invalid-feedback">@error('signature_method_physique') {{ $message }} @else Une méthode de signature est requise. @enderror</div>
                            </div>
                            <div class="method-area" id="draw-area-physique">
                                <p class="text-muted small">Signez dans le cadre.</p>
                                <canvas id="signature-pad"></canvas>
                                <div class="signature-controls">
                                    <button type="button" class="btn-clear">Effacer</button>
                                </div>
                                <input type="hidden" name="signature_data_physique" id="signature-data-physique">
                                <div class="invalid-feedback" id="signature-draw-error-physique" style="display: none;">Veuillez dessiner une signature.</div>
                            </div>
                            <div class="method-area" id="upload-area-physique">
                                <div class="file-upload-wrapper @error('signature_upload_physique') is-invalid @enderror">
                                    <div class="file-upload-content">
                                        <i class="fas fa-file-image file-upload-icon"></i>
                                        <p class="file-upload-text">Importer (PNG)</p>
                                    </div>
                                    <div class="file-upload-preview"></div>
                                    <input type="file" name="signature_upload_physique" accept="image/png">
                                    <div class="invalid-feedback">@error('signature_upload_physique') {{ $message }} @else L'import de la signature est requis. @enderror</div>
                                </div>
                            </div>
                        </div>

                        <!-- Étape 5: Versements -->
                        <div class="form-step-content" data-step="5">
                            <h4 class="form-section-title">Versements Initiaux</h4>
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="input-group-custom mb-3">
                                        <label class="form-label">Dépôt Initial (FCFA)</label>
                                        <i class="icon fas fa-money-bill-wave"></i>
                                        <input type="number" class="form-control @error('initial_deposit') is-invalid @enderror" id="depot-initial-physique" name="initial_deposit" value="{{ old('initial_deposit', 0) }}" min="0" required>
                                        <div class="invalid-feedback">@error('initial_deposit') {{ $message }} @else Ce champ est requis. @enderror</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="versemants-summary">
                                        <div class="row-item"><span class="label">Droit d'adhésion</span> <span class="value">2,000 FCFA</span></div>
                                        <div class="row-item"><span class="label">Part Sociale</span> <span class="value">5,000 FCFA</span></div>
                                        <div class="row-item total-row"><span class="total-label">TOTAL À VERSER</span> <span class="total-value" id="total-versement-physique">7,000 FCFA</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-navigation-buttons">
                            <button type="button" class="btn btn-nav btn-prev" style="display: none;">Précédent</button>
                            <button type="button" class="btn btn-nav btn-next">Suivant</button>
                            <button type="submit" class="btn btn-submit-form" style="display: none;">Soumettre l'adhésion</button>
                        </div>
                    </form>
                </div>

                <!-- ======================== FORMULAIRE PERSONNE MORALE ======================== -->
                <div class="tab-pane fade" id="morale" role="tabpanel">
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
                                <div class="step-label">Procès-Verbal</div>
                            </div>
                            <div class="step" data-step="4">
                                <div class="step-icon">4</div>
                                <div class="step-label">Contacts</div>
                            </div>
                            <div class="step" data-step="5">
                                <div class="step-icon">5</div>
                                <div class="step-label">Pièces & Signature</div>
                            </div>
                            <div class="step" data-step="6">
                                <div class="step-icon">6</div>
                                <div class="step-label">Versements</div>
                            </div>
                        </div>

                        <!-- Étape 1: Informations sur l'Entité -->
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
                                    <label class="form-label">N° RCCM / Récépissé</label>
                                    <i class="icon fas fa-file-contract"></i>
                                    <input type="text" class="form-control @error('rccm') is-invalid @enderror" name="rccm" value="{{ old('rccm') }}" required>
                                    <div class="invalid-feedback">@error('rccm') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Date de création</label>
                                    <i class="icon fas fa-calendar-alt"></i>
                                    <input type="date" class="form-control @error('creation_date') is-invalid @enderror" name="creation_date" value="{{ old('creation_date') }}" required>
                                    <div class="invalid-feedback">@error('creation_date') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Lieu de création</label>
                                    <i class="icon fas fa-map-marker-alt"></i>
                                    <input type="text" class="form-control @error('creation_place') is-invalid @enderror" name="creation_place" value="{{ old('creation_place') }}" required>
                                    <div class="invalid-feedback">@error('creation_place') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Catégorie / Secteur d'activité</label>
                                    <i class="icon fas fa-briefcase"></i>
                                    <input type="text" class="form-control @error('activity_sector') is-invalid @enderror" name="activity_sector" value="{{ old('activity_sector') }}" required>
                                    <div class="invalid-feedback">@error('activity_sector') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Nationalité de l'entité</label>
                                    <i class="icon fas fa-flag"></i>
                                    <input type="text" class="form-control @error('company_nationality') is-invalid @enderror" name="company_nationality" value="{{ old('company_nationality') }}" required>
                                    <div class="invalid-feedback">@error('company_nationality') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Téléphone</label>
                                    <i class="icon fas fa-phone"></i>
                                    <input type="tel" class="form-control @error('company_phone') is-invalid @enderror" name="company_phone" value="{{ old('company_phone') }}" required pattern="[0-9+()-\s]*">
                                    <div class="invalid-feedback">@error('company_phone') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                            </div>
                            <h5 class="mt-3">Adresse de l'Entité</h5>
                            <div class="row mb-3 choice-container @error('loc_method_moral') is-invalid @enderror">
                                <div class="col-6">
                                    <input type="radio" name="loc_method_moral" id="desc_morale" value="description" {{ old('loc_method_moral', 'description') == 'description' ? 'checked' : '' }} required>
                                    <label for="desc_morale" class="choice-label"><i class="fas fa-keyboard"></i> Décrire l'adresse</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" name="loc_method_moral" id="map_morale" value="map" {{ old('loc_method_moral') == 'map' ? 'checked' : '' }}>
                                    <label for="map_morale" class="choice-label"><i class="fas fa-map-marked-alt"></i> Sélectionner sur une carte</label>
                                </div>
                                <div class="invalid-feedback">@error('loc_method_moral') {{ $message }} @else Veuillez choisir une méthode. @enderror</div>
                            </div>
                            <div class="method-area" id="description-area-morale">
                                <div class="input-group-custom">
                                    <label class="form-label">Description détaillée de l'adresse</label>
                                    <textarea class="form-control @error('company_address') is-invalid @enderror" name="company_address" rows="4" placeholder="Indiquer ville, quartier, rue, repères..." required>{{ old('company_address') }}</textarea>
                                    <div class="invalid-feedback">@error('company_address') {{ $message }} @else Ce champ est requis si vous choisissez de décrire l'adresse. @enderror</div>
                                </div>
                            </div>
                            <div class="method-area" id="map-area-morale">
                                <label class="form-label">Cliquez sur la carte ou déplacez le marqueur pour indiquer l'adresse de l'entité</label>
                                <div id="map-container-morale" class="map-container"></div>
                                <input type="hidden" name="residence_lat" id="latitude-morale" value="{{ old('residence_lat') }}" required>
                                <input type="hidden" name="residence_lng" id="longitude-morale" value="{{ old('residence_lng') }}" required>
                                <div class="invalid-feedback">@error('residence_lat') Une position sur la carte est requise. @else Veuillez sélectionner un point sur la carte. @enderror</div>
                            </div>
                        </div>

                        <!-- Étape 2: Informations sur le Dirigeant -->
                        <div class="form-step-content" data-step="2">
                            <h4 class="form-section-title">Informations sur le Dirigeant Principal</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Nom & Prénoms</label>
                                    <i class="icon fas fa-user-tie"></i>
                                    <input type="text" class="form-control @error('director_name') is-invalid @enderror" name="director_name" value="{{ old('director_name') }}" required>
                                    <div class="invalid-feedback">@error('director_name') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Poste / Profession</label>
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
                                    <input type="date" class="form-control @error('director_birth_date') is-invalid @enderror" name="director_birth_date" value="{{ old('director_birth_date') }}" required>
                                    <div class="invalid-feedback">@error('director_birth_date') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Lieu de Naissance</label>
                                    <i class="icon fas fa-map-marker-alt"></i>
                                    <input type="text" class="form-control @error('director_birth_place') is-invalid @enderror" name="director_birth_place" value="{{ old('director_birth_place') }}" required>
                                    <div class="invalid-feedback">@error('director_birth_place') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">N° Pièce d'identité</label>
                                    <i class="icon fas fa-id-card"></i>
                                    <input type="text" class="form-control @error('director_id_number') is-invalid @enderror" name="director_id_number" value="{{ old('director_id_number') }}" required>
                                    <div class="invalid-feedback">@error('director_id_number') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Téléphone</label>
                                    <i class="icon fas fa-mobile-alt"></i>
                                    <input type="tel" class="form-control @error('director_phone') is-invalid @enderror" name="director_phone" value="{{ old('director_phone') }}" required pattern="[0-9+()-\s]*">
                                    <div class="invalid-feedback">@error('director_phone') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Nom & Prénoms du Père</label>
                                    <i class="icon fas fa-user"></i>
                                    <input type="text" class="form-control @error('director_father_name') is-invalid @enderror" name="director_father_name" value="{{ old('director_father_name') }}" required>
                                    <div class="invalid-feedback">@error('director_father_name') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Nom & Prénoms de la Mère</label>
                                    <i class="icon fas fa-user"></i>
                                    <input type="text" class="form-control @error('director_mother_name') is-invalid @enderror" name="director_mother_name" value="{{ old('director_mother_name') }}" required>
                                    <div class="invalid-feedback">@error('director_mother_name') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                            </div>
                        </div>

                        <!-- Étape 3: Procès-Verbal -->
                        <div class="form-step-content" data-step="3">
                            <h4 class="form-section-title">Procès-Verbal & Documents</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Procès-verbal de nomination du représentant</label>
                                    <div class="file-upload-wrapper @error('pv_nomination_path') is-invalid @enderror">
                                        <div class="file-upload-content">
                                            <i class="fas fa-file-pdf file-upload-icon"></i>
                                            <p class="file-upload-text">Importer le PV (PDF)</p>
                                        </div>
                                        <div class="file-upload-preview"></div>
                                        <input type="file" name="pv_nomination_path" accept="application/pdf" required>
                                        <div class="invalid-feedback">@error('pv_nomination_path') {{ $message }} @else Le PV est requis (PDF). @enderror</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Statuts de l'entité (PDF)</label>
                                    <div class="file-upload-wrapper @error('statutes_path') is-invalid @enderror">
                                        <div class="file-upload-content">
                                            <i class="fas fa-file-pdf file-upload-icon"></i>
                                            <p class="file-upload-text">Importer les statuts (PDF)</p>
                                        </div>
                                        <div class="file-upload-preview"></div>
                                        <input type="file" name="statutes_path" accept="application/pdf" required>
                                        <div class="invalid-feedback">@error('statutes_path') {{ $message }} @else Les statuts sont requis (PDF). @enderror</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Étape 4: Contacts & Mandataires -->
                        <div class="form-step-content" data-step="4">
                            <h4 class="form-section-title">Personne de Référence</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Nom & Prénoms</label>
                                    <i class="icon fas fa-user-check"></i>
                                    <input type="text" class="form-control @error('ref1_name') is-invalid @enderror" name="ref1_name" value="{{ old('ref1_name') }}" required>
                                    <div class="invalid-feedback">@error('ref1_name') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                                <div class="col-md-6 mb-3 input-group-custom">
                                    <label class="form-label">Téléphone</label>
                                    <i class="icon fas fa-phone"></i>
                                    <input type="tel" class="form-control @error('ref1_phone') is-invalid @enderror" name="ref1_phone" value="{{ old('ref1_phone') }}" pattern="[0-9+()-\s]*" required>
                                    <div class="invalid-feedback">@error('ref1_phone') {{ $message }} @else Ce champ est requis. @enderror</div>
                                </div>
                            </div>
                            <h4 class="form-section-title mt-4">Mandataires</h4>
                            <div id="mandataires-container-morale"></div>
                            <button type="button" class="btn btn-outline-primary mt-2 dynamic-adder-btn" data-container="mandataires-container-morale" data-type="mandataire"><i class="fas fa-plus"></i> Ajouter un mandataire</button>
                        </div>

                        <!-- Étape 5: Pièces Jointes & Signature -->
                        <div class="form-step-content" data-step="5">
                            <h4 class="form-section-title">Pièces Jointes & Identification</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Photo d’identité du dirigeant</label>
                                    <div class="file-upload-wrapper @error('director_photo_path') is-invalid @enderror">
                                        <div class="file-upload-content">
                                            <i class="fas fa-camera file-upload-icon"></i>
                                            <p class="file-upload-text">Cliquez pour choisir une photo</p>
                                        </div>
                                        <div class="file-upload-preview"></div>
                                        <input type="file" name="director_photo_path" accept="image/*" required>
                                        <div class="invalid-feedback">@error('director_photo_path') {{ $message }} @else Une photo est requise. @enderror</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Scan de la pièce d'identité du dirigeant (PDF)</label>
                                    <div class="file-upload-wrapper @error('director_id_scan_path') is-invalid @enderror">
                                        <div class="file-upload-content">
                                            <i class="fas fa-file-pdf file-upload-icon"></i>
                                            <p class="file-upload-text">Cliquez pour choisir un PDF</p>
                                        </div>
                                        <div class="file-upload-preview"></div>
                                        <input type="file" name="director_id_scan_path" accept="application/pdf" required>
                                        <div class="invalid-feedback">@error('director_id_scan_path') {{ $message }} @else Le scan (PDF) est requis. @enderror</div>
                                    </div>
                                </div>
                            </div>
                            <h4 class="form-section-title mt-4">Signature</h4>
                            <div class="row choice-container @error('signature_method_morale') is-invalid @enderror">
                                <div class="col-6">
                                    <input type="radio" name="signature_method_morale" id="draw_morale" value="draw" {{ old('signature_method_morale', 'draw') == 'draw' ? 'checked' : '' }} required>
                                    <label for="draw_morale" class="choice-label"><i class="fas fa-pencil-alt"></i> Dessiner</label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" name="signature_method_morale" id="upload_morale" value="upload" {{ old('signature_method_morale') == 'upload' ? 'checked' : '' }}>
                                    <label for="upload_morale" class="choice-label"><i class="fas fa-upload"></i> Importer</label>
                                </div>
                                <div class="invalid-feedback">@error('signature_method_morale') {{ $message }} @else Une méthode de signature est requise. @enderror</div>
                            </div>
                            <div class="method-area" id="draw-area-morale">
                                <p class="text-muted small">Signez dans le cadre.</p>
                                <canvas id="signature-pad-morale"></canvas>
                                <div class="signature-controls">
                                    <button type="button" class="btn-clear">Effacer</button>
                                </div>
                                <input type="hidden" name="signature_data_morale" id="signature-data-morale">
                                <div class="invalid-feedback" id="signature-draw-error-morale" style="display: none;">Veuillez dessiner une signature.</div>
                            </div>
                            <div class="method-area" id="upload-area-morale">
                                <div class="file-upload-wrapper @error('signature_upload_morale') is-invalid @enderror">
                                    <div class="file-upload-content">
                                        <i class="fas fa-file-image file-upload-icon"></i>
                                        <p class="file-upload-text">Importer (PNG)</p>
                                    </div>
                                    <div class="file-upload-preview"></div>
                                    <input type="file" name="signature_upload_morale" accept="image/png">
                                    <div class="invalid-feedback">@error('signature_upload_morale') {{ $message }} @else L'import de la signature est requis. @enderror</div>
                                </div>
                            </div>
                        </div>

                        <!-- Étape 6: Versements -->
                        <div class="form-step-content" data-step="6">
                            <h4 class="form-section-title">Versements Initiaux</h4>
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="input-group-custom mb-3">
                                        <label class="form-label">Dépôt Initial (FCFA)</label>
                                        <i class="icon fas fa-money-bill-wave"></i>
                                        <input type="number" class="form-control @error('initial_deposit') is-invalid @enderror" id="depot-initial-morale" name="initial_deposit" value="{{ old('initial_deposit', 0) }}" min="0" required>
                                        <div class="invalid-feedback">@error('initial_deposit') {{ $message }} @else Ce champ est requis. @enderror</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="versemants-summary">
                                        <div class="row-item"><span class="label">Droit d'adhésion</span> <span class="value">2,000 FCFA</span></div>
                                        <div class="row-item"><span class="label">Part Sociale</span> <span class="value">15,000 FCFA</span></div>
                                        <div class="row-item total-row"><span class="total-label">TOTAL À VERSER</span> <span class="total-value" id="total-versement-morale">17,000 FCFA</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-navigation-buttons">
                            <button type="button" class="btn btn-nav btn-prev" style="display: none;">Précédent</button>
                            <button type="button" class="btn btn-nav btn-next">Suivant</button>
                            <button type="submit" class="btn btn-submit-form" style="display: none;">Soumettre l'adhésion</button>
                        </div>
                    </form>
                </div>
            </div>
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
            const maps = new Map(); // Stocker les cartes Leaflet

            // Fonction pour mettre à jour la barre de progression
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

            // Fonction pour afficher/masquer les étapes
            function showStep(step) {
                steps.forEach(s => s.classList.remove('active'));
                steps[step - 1].classList.add('active');
                prevBtn.style.display = step === 1 ? 'none' : 'inline-block';
                nextBtn.style.display = step === steps.length ? 'none' : 'inline-block';
                submitBtn.style.display = step === steps.length ? 'inline-block' : 'none';
                updateProgress();

                // Réinitialiser les cartes si l'étape contient une carte
                const mapContainer = steps[step - 1].querySelector('.map-container');
                if (mapContainer) {
                    const formType = mapContainer.id.includes('physique') ? 'physique' : 'morale';
                    const mapObj = maps.get(formType);
                    if (mapObj) {
                        setTimeout(() => mapObj.invalidate(), 100);
                    }
                }
            }

            // Validation des champs obligatoires dans l'étape active
            function validateStep(step) {
                const currentStepContent = steps[step - 1];
                const requiredInputs = currentStepContent.querySelectorAll('input[required], select[required], textarea[required]');
                let isValid = true;

                requiredInputs.forEach(input => {
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });

                // Validation spécifique pour la localisation
                const locMethod = currentStepContent.querySelector('input[name="loc_method_physical"]:checked, input[name="loc_method_moral"]:checked');
                if (locMethod) {
                    if (locMethod.value === 'description') {
                        const descInput = currentStepContent.querySelector('textarea[name="residence_description"], textarea[name="company_address"]');
                        if (descInput && !descInput.value.trim()) {
                            descInput.classList.add('is-invalid');
                            isValid = false;
                        }
                    } else if (locMethod.value === 'map') {
                        const latInput = currentStepContent.querySelector('input[name="residence_lat"]');
                        const lngInput = currentStepContent.querySelector('input[name="residence_lng"]');
                        if (latInput && lngInput && (!latInput.value || !lngInput.value)) {
                            latInput.classList.add('is-invalid');
                            lngInput.classList.add('is-invalid');
                            isValid = false;
                        }
                    }
                }

                // Validation spécifique pour la signature
                const signatureMethod = currentStepContent.querySelector('input[name="signature_method_physique"]:checked, input[name="signature_method_morale"]:checked');
                if (signatureMethod) {
                    const formType = form.id === 'physique' ? 'physique' : 'morale';
                    if (signatureMethod.value === 'draw') {
                        const signatureData = currentStepContent.querySelector(`#signature-data-${formType}`);
                        const canvas = currentStepContent.querySelector(`#signature-pad${formType === 'morale' ? '-morale' : ''}`);
                        const signaturePad = canvas.signaturePadInstance;
                        if (!signatureData.value || signaturePad.isEmpty()) {
                            const errorDiv = currentStepContent.querySelector(`#signature-draw-error-${formType}`);
                            errorDiv.style.display = 'block';
                            isValid = false;
                        } else {
                            currentStepContent.querySelector(`#signature-draw-error-${formType}`).style.display = 'none';
                        }
                    } else if (signatureMethod.value === 'upload') {
                        const signatureUpload = currentStepContent.querySelector(`input[name="signature_upload_${formType}"]`);
                        if (!signatureUpload.files.length) {
                            signatureUpload.classList.add('is-invalid');
                            isValid = false;
                        } else {
                            signatureUpload.classList.remove('is-invalid');
                        }
                    }
                }

                if (!isValid) {
                    const firstInvalid = currentStepContent.querySelector('.is-invalid');
                    if (firstInvalid) {
                        firstInvalid.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                        const feedback = firstInvalid.nextElementSibling;
                        if (feedback && feedback.classList.contains('invalid-feedback')) {
                            feedback.style.display = 'block';
                            setTimeout(() => feedback.style.display = 'none', 6000);
                        }
                    }
                }

                return isValid;
            }

            // Gestion des boutons de navigation
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

            // Gestion du dépôt initial
            const depotInput = form.querySelector('#depot-initial-physique, #depot-initial-morale');
            const totalSpan = form.querySelector('#total-versement-physique, #total-versement-morale');
            if (depotInput && totalSpan) {
                const baseAmount = form.id === 'physique' ? 7000 : 17000;
                depotInput.addEventListener('input', () => {
                    const depot = parseFloat(depotInput.value) || 0;
                    totalSpan.textContent = `${(baseAmount + depot).toLocaleString('fr-FR')} FCFA`;
                });
            }

            // Gestion des champs dynamiques (bénéficiaires/mandataires)
            form.querySelectorAll('.dynamic-adder-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const containerId = btn.dataset.container;
                    const type = btn.dataset.type;
                    const container = document.getElementById(containerId);
                    const index = container.querySelectorAll('.dynamic-field').length;
                    const template = `
                    <div class="dynamic-field p-3 mb-3 border rounded position-relative">
                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 remove-field">X</button>
                        <h5>${type === 'beneficiaire' ? 'Bénéficiaire' : 'Mandataire'} ${index + 1}</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3 input-group-custom">
                                <label class="form-label">Nom & Prénoms</label>
                                <i class="icon fas fa-user"></i>
                                <input type="text" class="form-control" name="${type}s[${index}][name]" required>
                                <div class="invalid-feedback">Ce champ est requis.</div>
                            </div>
                            <div class="col-md-6 mb-3 input-group-custom">
                                <label class="form-label">${type === 'beneficiaire' ? 'Lien / Relation' : 'Poste'}</label>
                                <i class="icon fas fa-${type === 'beneficiaire' ? 'users' : 'user-tag'}"></i>
                                <input type="text" class="form-control" name="${type}s[${index}][${type === 'beneficiaire' ? 'relationship' : 'position'}]" required>
                                <div class="invalid-feedback">Ce champ est requis.</div>
                            </div>
                            <div class="col-md-6 mb-3 input-group-custom">
                                <label class="form-label">Téléphone</label>
                                <i class="icon fas fa-phone"></i>
                                <input type="tel" class="form-control" name="${type}s[${index}][phone]" pattern="[0-9+()-\s]*" required>
                                <div class="invalid-feedback">Ce champ est requis.</div>
                            </div>
                        </div>
                    </div>`;
                    container.insertAdjacentHTML('beforeend', template);
                    container.querySelectorAll('.remove-field').forEach(removeBtn => {
                        removeBtn.addEventListener('click', () => removeBtn.closest('.dynamic-field').remove());
                    });
                });
            });

            // Gestion des uploads de fichiers
            form.querySelectorAll('input[type="file"]').forEach(input => {
                input.addEventListener('change', () => {
                    const wrapper = input.closest('.file-upload-wrapper');
                    const preview = wrapper.querySelector('.file-upload-preview');
                    const file = input.files[0];
                    preview.innerHTML = file ? `<span>${file.name}</span>` : '';
                    input.classList.toggle('is-invalid', !file && input.hasAttribute('required'));
                });
            });

            // Gestion du basculement description/carte
            const locRadios = form.querySelectorAll('input[name="loc_method_physical"], input[name="loc_method_moral"]');
            locRadios.forEach(radio => {
                radio.addEventListener('change', () => {
                    const formType = radio.name.includes('physical') ? 'physique' : 'morale';
                    const descArea = form.querySelector(`#description-area-${formType}`);
                    const mapArea = form.querySelector(`#map-area-${formType}`);
                    const descInput = descArea.querySelector('textarea');
                    const latInput = mapArea.querySelector('input[name="residence_lat"]');
                    const lngInput = mapArea.querySelector('input[name="residence_lng"]');

                    descArea.style.display = radio.value === 'description' ? 'block' : 'none';
                    mapArea.style.display = radio.value === 'map' ? 'block' : 'none';
                    descInput.toggleAttribute('required', radio.value === 'description');
                    latInput.toggleAttribute('required', radio.value === 'map');
                    lngInput.toggleAttribute('required', radio.value === 'map');

                    if (radio.value === 'map') {
                        const mapObj = maps.get(formType);
                        if (mapObj) {
                            setTimeout(() => mapObj.invalidate(), 100);
                        }
                    }
                });
                if (radio.checked) radio.dispatchEvent(new Event('change'));
            });

            // Initialisation des cartes Leaflet
            function initializeLeafletMap(mapId, latInputId, lonInputId) {
                const mapContainer = document.getElementById(mapId);
                if (!mapContainer) return null;

                const latInput = document.getElementById(latInputId);
                const lonInput = document.getElementById(lonInputId);
                const fallbackCoords = [6.1375, 1.2226]; // Lomé, Togo
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

            maps.set('physique', initializeLeafletMap('map-container-physique', 'latitude-physique', 'longitude-physique'));
            maps.set('morale', initializeLeafletMap('map-container-morale', 'latitude-morale', 'longitude-morale'));

            // Gestion du basculement signature
            function setupSignatureChoice(formType) {
                const radioButtons = form.querySelectorAll(`input[name="signature_method_${formType}"]`);
                if (!radioButtons.length) return;
                const drawArea = form.querySelector(`#draw-area-${formType}`);
                const uploadArea = form.querySelector(`#upload-area-${formType}`);
                const canvas = form.querySelector(`#signature-pad${formType === 'morale' ? '-morale' : ''}`);
                const uploadInput = form.querySelector(`input[name="signature_upload_${formType}"]`);
                let signaturePadInstance = null;

                function updateSignatureArea() {
                    const selectedValue = form.querySelector(`input[name="signature_method_${formType}"]:checked`).value;
                    drawArea.style.display = selectedValue === 'draw' ? 'block' : 'none';
                    uploadArea.style.display = selectedValue === 'upload' ? 'block' : 'none';
                    uploadInput.toggleAttribute('required', selectedValue === 'upload');

                    if (selectedValue === 'draw' && !signaturePadInstance) {
                        signaturePadInstance = initializeSignaturePad(canvas, formType);
                    }
                }

                radioButtons.forEach(radio => radio.addEventListener('change', updateSignatureArea));
                updateSignatureArea();
            }

            function initializeSignaturePad(canvas, formType) {
                if (!canvas) return null;
                canvas.width = canvas.offsetWidth;
                canvas.height = canvas.offsetHeight || 150;
                const signaturePad = new SignaturePad(canvas, {
                    backgroundColor: 'rgb(255, 255, 255)',
                    penColor: 'rgb(0, 0, 0)'
                });
                canvas.signaturePadInstance = signaturePad;

                const form = canvas.closest('form');
                const hiddenInput = form.querySelector(`#signature-data-${formType}`);
                const clearBtn = form.querySelector(`#draw-area-${formType} .btn-clear`);

                function resizeCanvas() {
                    const ratio = Math.max(window.devicePixelRatio || 1, 1);
                    if (canvas.offsetWidth > 0) {
                        canvas.width = canvas.offsetWidth * ratio;
                        canvas.height = canvas.offsetHeight * ratio;
                        canvas.getContext('2d').scale(ratio, ratio);
                        signaturePad.fromData(signaturePad.toData());
                    }
                }

                new ResizeObserver(resizeCanvas).observe(canvas.parentElement);
                resizeCanvas();

                clearBtn.addEventListener('click', () => {
                    signaturePad.clear();
                    hiddenInput.value = '';
                    const errorDiv = form.querySelector(`#signature-draw-error-${formType}`);
                    if (errorDiv) errorDiv.style.display = 'none';
                });

                signaturePad.addEventListener('endStroke', () => {
                    hiddenInput.value = signaturePad.toDataURL('image/png');
                });

                form.addEventListener('submit', (e) => {
                    const selectedMethod = form.querySelector(`input[name="signature_method_${formType}"]:checked`).value;
                    if (selectedMethod === 'draw' && !signaturePad.isEmpty()) {
                        hiddenInput.value = signaturePad.toDataURL('image/png');
                    }
                });

                return signaturePad;
            }

            setupSignatureChoice('physique');
            setupSignatureChoice('morale');

            // Gestion de la soumission du formulaire
            form.addEventListener('submit', e => {
                if (!validateStep(currentStep)) {
                    e.preventDefault();
                }
            });

            // Initialiser la première étape
            showStep(currentStep);
        });
    });
</script>
@endsection