@extends('layout.admin')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        .map-container {
            height: 300px;
            border-radius: 8px;
            overflow: hidden;
        }

        .document-preview {
            max-width: 200px;
            max-height: 200px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .document-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            text-decoration: none;
            color: #495057;
            transition: all 0.3s ease;
        }

        .document-link:hover {
            background: #e9ecef;
            color: #212529;
            text-decoration: none;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-en_attente {
            background: #fff3cd;
            color: #856404;
        }

        .status-accepter {
            background: #d4edda;
            color: #155724;
        }

        .status-refuser {
            background: #f8d7da;
            color: #721c24;
        }

        /* Styles pour l'impression - Design conforme au PDF */
        @media print {

            /* Masquer TOUS les éléments de navigation et boutons */
            .dashboard-main header,
            .dashboard-main aside,
            .dashboard-main footer,
            .btn,
            .dropdown,
            .alert,
            .no-print,
            .d-flex.flex-wrap.align-items-center.justify-content-between.gap-3.mb-24,
            .d-flex.align-items-center.gap-2,
            .breadcrumb,
            .navigation,
            .appbar,
            .sidebar,
            .map-container,
            .document-link,
            .document-preview {
                display: none !important;
            }

            /* Masquer les icônes de mode clair/sombre */
            iconify-icon[icon*="sun"],
            iconify-icon[icon*="moon"],
            iconify-icon[icon*="solar"],
            .theme-toggle,
            .mode-toggle,
            button[data-theme-toggle],
            [data-theme-toggle] {
                display: none !important;
            }

            /* Afficher le titre d'impression */
            .print-only {
                display: block !important;
                font-size: 24px !important;
                font-weight: bold !important;
                margin-bottom: 30px !important;
                text-align: center !important;
                color: #000000 !important;
            }

            /* Masquer le titre normal */
            h6.fw-semibold.mb-0 {
                display: none !important;
            }

            /* Ajuster la mise en page pour l'impression */
            .dashboard-main {
                margin: 0 !important;
                padding: 0 !important;
                background: white !important;
            }

            .dashboard-main-body {
                padding: 0 !important;
            }

            /* Style des cartes pour l'impression - EXACTEMENT comme le PDF */
            .card {
                border: 2px solid #EC281C !important;
                box-shadow: none !important;
                margin-bottom: 15px !important;
                page-break-inside: avoid !important;
                background: white !important;
            }

            .card-body {
                padding: 10px !important;
            }

            /* Style des titres de section - EXACTEMENT comme le PDF */
            .card-header {
                display: block !important;
                background-color: #EC281C !important;
                color: white !important;
                padding: 8px 12px !important;
                margin: -10px -10px 10px -10px !important;
                font-weight: bold !important;
                font-size: 14px !important;
            }

            /* Style des informations - EXACTEMENT comme le PDF */
            .text-sm.text-secondary-light {
                font-weight: bold !important;
                color: #000000 !important;
                font-size: 11px !important;
                margin-bottom: 2px !important;
            }

            .fw-medium.mb-0 {
                font-weight: normal !important;
                color: #000000 !important;
                font-size: 11px !important;
                margin-bottom: 8px !important;
            }

            /* Style des tableaux - EXACTEMENT comme le PDF */
            .table {
                width: 100% !important;
                border-collapse: collapse !important;
                font-size: 10px !important;
            }

            .table th {
                background-color: #EC281C !important;
                color: white !important;
                padding: 6px !important;
                text-align: left !important;
                font-weight: bold !important;
                border: 1px solid #EC281C !important;
            }

            .table td {
                padding: 6px !important;
                border: 1px solid #EC281C !important;
                color: #000000 !important;
            }

            /* Masquer les cartes de mise à jour du statut */
            .col-lg-4 .card:last-child {
                display: none !important;
            }

            /* Masquer les cartes d'actions */
            .card.mb-24.no-print,
            .card:first-child {
                display: none !important;
            }

            /* Ajuster la largeur des colonnes pour l'impression */
            .col-lg-8 {
                width: 100% !important;
            }

            .col-lg-4 {
                width: 100% !important;
            }

            /* Masquer les cartes de documents dans la sidebar */
            .col-lg-4 .card:first-child {
                display: none !important;
            }

            /* Masquer les cartes d'informations du compte dans la sidebar */
            .col-lg-4 .card:nth-child(2) {
                display: none !important;
            }

            /* Forcer le masquage de tous les éléments avec no-print */
            *[class*="no-print"] {
                display: none !important;
            }

            /* Style du statut - EXACTEMENT comme le PDF */
            .status-badge {
                display: inline-block !important;
                padding: 4px 8px !important;
                border-radius: 4px !important;
                font-size: 10px !important;
                font-weight: bold !important;
                color: white !important;
            }

            .status-en_attente {
                background-color: #FFA500 !important;
            }

            .status-accepter {
                background-color: #28a745 !important;
            }

            .status-refuser {
                background-color: #dc3545 !important;
            }
        }
    </style>
@endsection

@section('content')
    @include('includes.admin.sidebar')

    <main class="dashboard-main">
        @include('includes.admin.appbar')

        <div class="dashboard-main-body">
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

            <!-- Titre pour l'impression -->
            <h1 class="print-only"
                style="display: none; text-align: center; font-size: 24px; font-weight: bold; margin-bottom: 30px;">
                Détails de la soumission #{{ $submission->id }}
            </h1>

            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24 no-print">
                <h6 class="fw-semibold mb-0">Détails de la soumission #{{ $submission->id }}</h6>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium">
                        <a href="{{ route('accounts.physical.index') }}" class="hover-text-primary">
                            Comptes physiques
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium">Détails</li>
                </ul>
            </div>

            <!-- Actions -->
            <div class="card mb-24 no-print">
                <div class="card-body d-flex align-items-center gap-3">
                    <a href="{{ route('accounts.physical.index') }}" class="btn btn-danger d-flex align-items-center gap-2">
                        <iconify-icon icon="lucide:arrow-left" class="icon"></iconify-icon>
                        Retour à la liste
                    </a>
                    <a href="{{ route('accounts.physical.pdf', $submission->id) }}"
                        class="btn btn-warning d-flex align-items-center gap-2">
                        <iconify-icon icon="lucide:file-text" class="icon"></iconify-icon>
                        Télécharger PDF
                    </a>
                    <!-- <button onclick="window.print()" class="btn btn-danger d-flex align-items-center gap-2">
                            <iconify-icon icon="lucide:printer" class="icon"></iconify-icon>
                            Imprimer
                        </button> -->
                </div>
            </div>

            <div class="row">
                <!-- Informations principales -->
                <div class="col-lg-8">
                    <!-- Informations personnelles -->
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Informations personnelles</h6>
                        </div>
                        <div class="card-body p-24">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Nom complet</label>
                                        <p class="fw-medium mb-0">{{ $submission->last_name }}
                                            {{ $submission->first_names }}</p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Genre</label>
                                        <p class="fw-medium mb-0">{{ $submission->gender == 'M' ? 'Masculin' : 'Féminin' }}
                                        </p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Date de naissance</label>
                                        <p class="fw-medium mb-0">
                                            {{ $submission->birth_date ? $submission->birth_date->format('d/m/Y') : '-' }}
                                        </p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Lieu de naissance</label>
                                        <p class="fw-medium mb-0">{{ $submission->birth_place }}</p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Nationalité</label>
                                        <p class="fw-medium mb-0">{{ $submission->nationality }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Nom du père</label>
                                        <p class="fw-medium mb-0">{{ $submission->father_name }}</p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Nom de la mère</label>
                                        <p class="fw-medium mb-0">{{ $submission->mother_name }}</p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Téléphone</label>
                                        <p class="fw-medium mb-0">{{ $submission->phone ?? '-' }}</p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Catégorie</label>
                                        <p class="fw-medium mb-0">{{ $submission->category ?? '-' }}</p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Statut</label>
                                        <span class="status-badge status-{{ $submission->statut }}">
                                            @if ($submission->statut == 'en_attente')
                                                En attente
                                            @elseif($submission->statut == 'accepter')
                                                Accepté
                                            @elseif($submission->statut == 'refuser')
                                                Refusé
                                            @else
                                                {{ $submission->statut }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Informations professionnelles -->
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Informations professionnelles</h6>
                        </div>
                        <div class="card-body p-24">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Profession</label>
                                        <p class="fw-medium mb-0">{{ $submission->occupation }}</p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Nom de l'entreprise</label>
                                        <p class="fw-medium mb-0">{{ $submission->company_name_activity ?? '-' }}</p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Type d'activité</label>
                                        <p class="fw-medium mb-0">{{ $submission->activity_type ?? '-' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Statut marital</label>
                                        <p class="fw-medium mb-0">{{ $submission->marital_status }}</p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Nom du conjoint</label>
                                        <p class="fw-medium mb-0">{{ $submission->spouse_name ?? '-' }}</p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Téléphone du conjoint</label>
                                        <p class="fw-medium mb-0">{{ $submission->spouse_phone ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                            @if ($submission->activity_description)
                                <div class="mt-16">
                                    <label class="text-sm text-secondary-light mb-4">Description de l'activité</label>
                                    <p class="fw-medium mb-0">{{ $submission->activity_description }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Adresses et coordonnées -->
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Adresses et coordonnées</h6>
                        </div>
                        <div class="card-body p-24">
                            <div class="row">
                                {{-- Section Résidence --}}
                                <div class="col-md-6">
                                    <h6 class="fw-semibold mb-16">Résidence</h6>
                                    @if ($submission->residence_description)
                                        {{-- Si une description manuelle existe --}}
                                        <div class="mb-16">
                                            <label class="text-sm text-secondary-light mb-4">Description</label>
                                            <p class="fw-medium mb-0">{{ $submission->residence_description }}</p>
                                        </div>
                                    @endif

                                    @if (!$submission->residence_description && $submission->residence_lat && $submission->residence_lng)
                                        <div class="mb-16">
                                            <label class="text-sm text-secondary-light mb-4">Coordonnées</label>
                                            <p class="fw-medium mb-0">{{ $submission->residence_lat }},
                                                {{ $submission->residence_lng }}</p>
                                            {{-- Afficher la carte si la description est VIDE (cela signifie que c'était via la carte) --}}
                                            @if (empty($submission->residence_description))
                                                {{-- La chaîne vide ou null sera TRUE ici --}}
                                                <div id="residence-map" class="map-container mt-8"></div>
                                            @endif
                                        </div>
                                    @endif

                                    @if ($submission->residence_plan_path)
                                        <div class="mb-16">
                                            <label class="text-sm text-secondary-light mb-4">Plan de résidence</label>
                                            <a href="{{ Storage::url($submission->residence_plan_path) }}"
                                                target="_blank" class="document-link">
                                                <iconify-icon icon="lucide:download" class="icon"></iconify-icon>
                                                Télécharger le plan
                                            </a>
                                        </div>
                                    @endif
                                </div>

                                {{-- Section Lieu de travail --}}
                                <div class="col-md-6">
                                    <h6 class="fw-semibold mb-16">Lieu de travail</h6>
                                    @if ($submission->workplace_description)
                                        {{-- Si une description manuelle existe --}}
                                        <div class="mb-16">
                                            <label class="text-sm text-secondary-light mb-4">Description</label>
                                            <p class="fw-medium mb-0">{{ $submission->workplace_description }}</p>
                                        </div>
                                    @endif

                                    @if (!$submission->workplace_description && $submission->workplace_lat && $submission->workplace_lng)
                                        <div class="mb-16">
                                            <label class="text-sm text-secondary-light mb-4">Coordonnées</label>
                                            <p class="fw-medium mb-0">{{ $submission->workplace_lat }},
                                                {{ $submission->workplace_lng }}</p>
                                            {{-- Afficher la carte si la description est VIDE (cela signifie que c'était via la carte) --}}
                                            @if (empty($submission->workplace_description))
                                                {{-- La chaîne vide ou null sera TRUE ici --}}
                                                <div id="workplace-map" class="map-container mt-8"></div>
                                            @endif
                                        </div>
                                    @endif

                                    @if ($submission->workplace_plan_path)
                                        <div class="mb-16">
                                            <label class="text-sm text-secondary-light mb-4">Plan du lieu de
                                                travail</label>
                                            <a href="{{ Storage::url($submission->workplace_plan_path) }}"
                                                target="_blank" class="document-link">
                                                <iconify-icon icon="lucide:download" class="icon"></iconify-icon>
                                                Télécharger le plan
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- KYC Information -->
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">KYC (Know Your Customer)</h6>
                        </div>
                        <div class="card-body p-24">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Type de pièce</label>
                                        <p class="fw-medium mb-0">{{ $submission->id_type }}</p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Numéro de pièce</label>
                                        <p class="fw-medium mb-0">{{ $submission->id_number }}</p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Date d'émission</label>
                                        <p class="fw-medium mb-0">
                                            {{ $submission->id_issue_date ? $submission->id_issue_date->format('d/m/Y') : '-' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Personne politiquement exposée
                                            (nationale)</label>
                                        <p class="fw-medium mb-0">{{ $submission->is_ppe_national ? 'Oui' : 'Non' }}</p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Personne politiquement exposée
                                            (étrangère)</label>
                                        <p class="fw-medium mb-0">{{ $submission->ppe_foreign ? 'Oui' : 'Non' }}</p>
                                    </div>
                                    <div class="mb-16">
                                        <label class="text-sm text-secondary-light mb-4">Dépôt initial</label>
                                        <p class="fw-medium mb-0">{{ number_format($submission->initial_deposit, 2) }}
                                            FCFA</p>
                                    </div>
                                </div>
                            </div>
                            @if ($submission->sanctions || $submission->terrorism_financing)
                                <div class="row mt-16">
                                    <div class="col-md-6">
                                        @if ($submission->sanctions)
                                            <div class="mb-16">
                                                <label class="text-sm text-secondary-light mb-4">Sanctions</label>
                                                <p class="fw-medium mb-0">{{ $submission->sanctions }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        @if ($submission->terrorism_financing)
                                            <div class="mb-16">
                                                <label class="text-sm text-secondary-light mb-4">Financement du
                                                    terrorisme</label>
                                                <p class="fw-medium mb-0">{{ $submission->terrorism_financing }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Références -->
                    @if (!$submission->references->isEmpty())
                        <div class="card mb-24">
                            <div class="card-header bg-base py-16 px-24">
                                <h6 class="fw-semibold mb-0">Références</h6>
                            </div>
                            <div class="card-body p-24">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Téléphone</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($submission->references as $reference)
                                                <tr>
                                                    <td>{{ $reference->name }}</td>
                                                    <td>{{ $reference->phone }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Bénéficiaires -->
                    @if (!$submission->beneficiaries->isEmpty())
                        <div class="card mb-24">
                            <div class="card-header bg-base py-16 px-24">
                                <h6 class="fw-semibold mb-0">Bénéficiaires</h6>
                            </div>
                            <div class="card-body p-24">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Contact</th>
                                                <th>Lien</th>
                                                <th>Date de naissance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($submission->beneficiaries as $beneficiary)
                                                <tr>
                                                    <td>{{ $beneficiary->nom }}</td>
                                                    <td>{{ $beneficiary->contact }}</td>
                                                    <td>{{ $beneficiary->lien }}</td>
                                                    <td>{{ $beneficiary->birth_date ? $beneficiary->birth_date->format('d/m/Y') : '-' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Documents -->
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Documents</h6>
                        </div>
                        <div class="card-body p-24">
                            @if ($submission->photo_path)
                                <div class="mb-24">
                                    <label class="text-sm text-secondary-light mb-8">Photo d'identité</label>
                                    <div class="text-center">
                                        <img src="{{ Storage::url($submission->photo_path) }}" alt="Photo d'identité"
                                            class="document-preview">
                                    </div>
                                    <div class="text-center mt-8">
                                        <a href="{{ Storage::url($submission->photo_path) }}" target="_blank"
                                            class="document-link">
                                            <iconify-icon icon="lucide:external-link" class="icon"></iconify-icon>
                                            Voir en plein écran
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if ($submission->id_scan_path)
                                <div class="mb-24">
                                    <label class="text-sm text-secondary-light mb-8">Scan de la pièce d'identité</label>
                                    <div class="text-center">
                                        <a href="{{ Storage::url($submission->id_scan_path) }}" target="_blank"
                                            class="document-link">
                                            <iconify-icon icon="lucide:download" class="icon"></iconify-icon>
                                            Télécharger le scan
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if ($submission->signature_method === 'draw' && $submission->signature_base64)
                                <div class="mb-24">
                                    <label class="text-sm text-secondary-light mb-8">Signature</label>
                                    <div class="text-center">
                                        @if (str_starts_with($submission->signature_base64, 'data:image/png;base64,'))
                                            <img src="{{ $submission->signature_base64 }}" alt="Signature"
                                                class="document-preview">
                                        @else
                                            <img src="data:image/png;base64,{{ $submission->signature_base64 }}"
                                                alt="Signature" class="document-preview">
                                        @endif
                                    </div>
                                    <div class="text-center mt-8">
                                        <button type="button"
                                            onclick="openSignatureFullscreen('{{ $submission->signature_base64 }}')"
                                            class="document-link"
                                            style="border: none; background: none; cursor: pointer;">
                                            <iconify-icon icon="lucide:external-link" class="icon"></iconify-icon>
                                            Voir en plein écran
                                        </button>
                                    </div>
                                </div>
                            @elseif($submission->signature_method === 'upload' && $submission->signature_upload_path)
                                <div class="mb-24">
                                    <label class="text-sm text-secondary-light mb-8">Signature</label>
                                    <div class="text-center">
                                        <a href="{{ Storage::url($submission->signature_upload_path) }}" target="_blank"
                                            class="document-link">
                                            <iconify-icon icon="lucide:download" class="icon"></iconify-icon>
                                            Télécharger la signature
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Informations du compte -->
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Informations du compte</h6>
                        </div>
                        <div class="card-body p-24">
                            <div class="mb-16">
                                <label class="text-sm text-secondary-light mb-4">Numéro de compte</label>
                                <p class="fw-medium mb-0">{{ $submission->account_number ?? 'Non attribué' }}</p>
                            </div>
                            <div class="mb-16">
                                <label class="text-sm text-secondary-light mb-4">Date d'adhésion</label>
                                <p class="fw-medium mb-0">
                                    {{ $submission->membership_date ? $submission->membership_date->format('d/m/Y') : 'Non définie' }}
                                </p>
                            </div>
                            <div class="mb-16">
                                <label class="text-sm text-secondary-light mb-4">Date d'ouverture</label>
                                <p class="fw-medium mb-0">
                                    {{ $submission->account_opening_date ? $submission->account_opening_date->format('d/m/Y') : 'Non définie' }}
                                </p>
                            </div>
                            @if ($submission->remarks)
                                <div class="mb-16">
                                    <label class="text-sm text-secondary-light mb-4">Remarques</label>
                                    <p class="fw-medium mb-0">{{ $submission->remarks }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Mise à jour du statut -->
                    <div class="card">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Mettre à jour le statut</h6>
                        </div>
                        <div class="card-body p-24">
                            <form action="{{ route('accounts.physical.update', $submission->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-16">
                                    <label for="statut" class="form-label">Statut</label>
                                    <select name="statut" id="statut" class="form-select">
                                        <option value="en_attente"
                                            {{ $submission->statut == 'en_attente' ? 'selected' : '' }}>En attente</option>
                                        <option value="accepter"
                                            {{ $submission->statut == 'accepter' ? 'selected' : '' }}>Accepté</option>
                                        <option value="refuser" {{ $submission->statut == 'refuser' ? 'selected' : '' }}>
                                            Refusé</option>
                                    </select>
                                </div>
                                <div class="mb-16">
                                    <label for="account_number" class="form-label">Numéro de compte</label>
                                    <input type="text" name="account_number" id="account_number" class="form-control"
                                        value="{{ $submission->account_number }}">
                                </div>
                                <div class="mb-16">
                                    <label for="membership_date" class="form-label">Date d'adhésion</label>
                                    <input type="date" name="membership_date" id="membership_date"
                                        class="form-control"
                                        value="{{ $submission->membership_date ? $submission->membership_date->format('Y-m-d') : '' }}">
                                </div>
                                <div class="mb-16">
                                    <label for="account_opening_date" class="form-label">Date d'ouverture de
                                        compte</label>
                                    <input type="date" name="account_opening_date" id="account_opening_date"
                                        class="form-control"
                                        value="{{ $submission->account_opening_date ? $submission->account_opening_date->format('Y-m-d') : '' }}">
                                </div>
                                <div class="mb-16">
                                    <label for="remarks" class="form-label">Remarques</label>
                                    <textarea name="remarks" id="remarks" class="form-control" rows="4">{{ $submission->remarks }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-danger w-100">Mettre à jour</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('includes.admin.footer')
    </main>
@endsection

@section('js')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Initialisation des cartes
        @if ($submission->residence_lat && $submission->residence_lng && empty(trim($submission->residence_description)))
            const residenceMap = L.map('residence-map').setView([{{ $submission->residence_lat }},
                {{ $submission->residence_lng }}
            ], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(residenceMap);
            L.marker([{{ $submission->residence_lat }}, {{ $submission->residence_lng }}]).addTo(residenceMap)
                .bindPopup('Résidence')
                .openPopup();
        @endif

        @if ($submission->workplace_lat && $submission->workplace_lng && empty(trim($submission->workplace_description)))
            const workplaceMap = L.map('workplace-map').setView([{{ $submission->workplace_lat }},
                {{ $submission->workplace_lng }}
            ], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(workplaceMap);
            L.marker([{{ $submission->workplace_lat }}, {{ $submission->workplace_lng }}]).addTo(workplaceMap)
                .bindPopup('Lieu de travail')
                .openPopup();
        @endif

        // Fonction pour ouvrir la signature en plein écran
        function openSignatureFullscreen(signatureData) {
            // Créer une nouvelle fenêtre
            const newWindow = window.open('', '_blank', 'width=800,height=600,scrollbars=yes,resizable=yes');

            // Préparer le contenu HTML
            const htmlContent = `
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Signature - Vue plein écran</title>
                    <style>
                        body {
                            margin: 0;
                            padding: 20px;
                            background: #f8f9fa;
                            font-family: Arial, sans-serif;
                        }
                        .container {
                            max-width: 100%;
                            text-align: center;
                        }
                        .signature-image {
                            max-width: 100%;
                            max-height: 80vh;
                            border: 2px solid #ddd;
                            border-radius: 8px;
                            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                        }
                        .title {
                            color: #333;
                            margin-bottom: 20px;
                            font-size: 24px;
                            font-weight: bold;
                        }
                        .close-btn {
                            position: fixed;
                            top: 20px;
                            right: 20px;
                            background: #dc3545;
                            color: white;
                            border: none;
                            padding: 10px 20px;
                            border-radius: 5px;
                            cursor: pointer;
                            font-size: 14px;
                        }
                        .close-btn:hover {
                            background: #c82333;
                        }
                    </style>
                </head>
                <body>
                    <button class="close-btn" onclick="window.close()">Fermer</button>
                    <div class="container">
                        <h1 class="title">Signature</h1>
                        <img src="${signatureData}" alt="Signature" class="signature-image">
                    </div>
                </body>
                </html>
            `;

            // Écrire le contenu dans la nouvelle fenêtre
            newWindow.document.write(htmlContent);
            newWindow.document.close();
        }
    </script>
@endsection
