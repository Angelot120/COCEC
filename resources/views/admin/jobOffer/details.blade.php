@extends('layout.admin')

@section('css')
    <style>
        /* =================================================================
                       PALETTE ET FONDATIONS DU DESIGN
                    ================================================================= */
        :root {
            --primary-color: #4A90E2;
            --primary-light-color: #eaf2fb;
            --success-color: #28a745;
            --success-light-color: #eaf7ec;
            --danger-color: #c82333;
            --danger-light-color: #fae9eb;
            --secondary-color: #6c757d;
            --secondary-light-color: #f1f3f5;
            --border-color: #e9ecef;
            --text-color: #212529;
            --text-muted-color: #6c757d;
            --body-bg: #f8f9fa;
            /* Fond de page très clair pour faire ressortir les cartes */
            --card-bg: #ffffff;
            --font-family-sans-serif: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        body {
            font-family: var(--font-family-sans-serif);
            color: var(--text-color);
            background-color: var(--body-bg);
        }

        /* =================================================================
                       NOUVEL EN-TÊTE DE PAGE "WOW"
                    ================================================================= */
        .page-header-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .page-header-card h2 {
            font-weight: 700;
            font-size: 2rem;
            /* Titre plus impactant */
            margin-bottom: 0.5rem;
        }

        .job-meta-badges {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-top: 0.5rem;
        }

        .badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.4em 0.8em;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 50px;
            /* Forme de pilule */
        }

        .badge-subtle-success {
            color: var(--success-color);
            background-color: var(--success-light-color);
        }

        .badge-subtle-danger {
            color: var(--danger-color);
            background-color: var(--danger-light-color);
        }

        .badge-subtle-secondary {
            color: var(--secondary-color);
            background-color: var(--secondary-light-color);
        }

        .page-header-actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        /* =================================================================
                       CARTES ET CONTENU GÉNÉRAL
                    ================================================================= */
        .card {
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            background-color: var(--card-bg);
        }

        .card-header {
            background-color: transparent;
            border-bottom: 1px solid var(--border-color);
            padding: 1.25rem 1.5rem;
        }

        /* CORRECTION UI : La description longue n'a plus de fond coloré */
        .job-description-box {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 1rem;
            background-color: #fff;
            /* Fond neutre pour la lisibilité */
        }

        .job-description-box>*:last-child {
            margin-bottom: 0;
        }

        /* =================================================================
                       TABLEAU DES CANDIDATURES (STYLES EXISTANTS CONSERVÉS)
                    ================================================================= */
        .table-applications {
            border-collapse: collapse;
            width: 100%;
        }

        .table-applications th,
        .table-applications td {
            padding: 1rem;
            text-align: left;
            vertical-align: middle;
            border-bottom: 1px solid var(--border-color);
        }

        .table-applications thead th {
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            color: var(--text-muted-color);
            border-top: none;
            border-bottom-width: 2px;
        }

        .table-applications tbody tr:hover {
            background-color: #f8f9fa;
        }

        .applicant-info {
            display: flex;
            align-items: center;
        }

        .applicant-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            margin-right: 12px;
            text-transform: uppercase;
        }

        .applicant-details {
            display: flex;
            flex-direction: column;
        }

        .applicant-details .name {
            font-weight: 600;
        }

        .applicant-details .email {
            font-size: 0.85rem;
            color: var(--text-muted-color);
        }

        .table-actions {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
        }

        .table-actions .btn-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            padding: 0;
            font-size: 1.1rem;
            border-radius: 0.375rem;
        }

        /* =================================================================
               DESIGN AUDACIEUX POUR LES ONGLETS DE DESCRIPTION
            ================================================================= */
        .job-description-tabs .nav-tabs {
            border-bottom: 2px solid var(--border-color);
        }

        .job-description-tabs .nav-link {
            border: none;
            border-bottom: 2px solid transparent;
            color: var(--text-muted-color);
            font-weight: 600;
            padding: 0.75rem 1.25rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s ease-in-out;
            margin-bottom: -2px;
            /* Pour que la bordure se superpose parfaitement */
        }

        .job-description-tabs .nav-link:hover {
            color: var(--primary-color);
        }

        .job-description-tabs .nav-link.active {
            color: var(--primary-color);
            background-color: transparent;
            border-bottom-color: var(--primary-color);
        }

        .job-description-tabs .nav-link iconify-icon {
            font-size: 1.2rem;
        }

        .tab-content .tab-pane {
            padding: 1.5rem 0.5rem;
            /* Ajoute de l'espace vertical */
        }

        /* Style pour le contenu riche (généré par un éditeur) */
        .prose-style h1,
        .prose-style h2,
        .prose-style h3 {
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .prose-style p {
            line-height: 1.7;
            margin-bottom: 1rem;
        }

        .prose-style ul {
            list-style: none;
            padding-left: 0;
        }

        .prose-style ul li {
            padding-left: 1.5rem;
            position: relative;
            margin-bottom: 0.75rem;
        }

        /* Puces personnalisées pour un look plus pro */
        .prose-style ul li::before {
            content: '✓';
            /* Ou utilisez une icône SVG/Iconify */
            position: absolute;
            left: 0;
            top: 2px;
            color: var(--primary-color);
            font-weight: 700;
        }
    </style>
    {{-- Police Inter pour un look professionnel --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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

            <!-- =================================================================
                           LE NOUVEL EN-TÊTE "WOW"
                        ================================================================= -->
            <div class="page-header-card">
                <div class="d-flex flex-wrap align-items-start justify-content-between gap-3">
                    {{-- Partie gauche : Titre et Badges --}}
                    <div>
                        <ul class="d-flex align-items-center gap-2 small text-muted mb-2">
                            <li><a href="{{ route('admin.dashboard') }}" class="hover-text-primary">Dashboard</a></li>
                            <li>/</li>
                            <li><a href="{{ route('career.index') }}" class="hover-text-primary">Offres</a></li>
                            <li>/</li>
                            <li>Détails</li>
                        </ul>

                        <h2>{{ $job->title }}</h2>

                        <div class="job-meta-badges">
                            <span
                                class="badge-pill {{ $job->status == 'open' ? 'badge-subtle-success' : 'badge-subtle-danger' }}">
                                <iconify-icon
                                    icon="{{ $job->status == 'open' ? 'solar:check-circle-bold' : 'solar:close-circle-bold' }}"></iconify-icon>
                                {{ $job->status == 'open' ? 'Ouvert' : 'Fermé' }}
                            </span>
                            <span class="badge-pill badge-subtle-secondary">
                                <iconify-icon icon="solar:suitcase-tag-bold"></iconify-icon>
                                {{ $job->type == 'stage' ? 'Stage' : 'Emploi' }}
                            </span>
                            <span class="badge-pill badge-subtle-secondary">
                                <iconify-icon icon="solar:calendar-date-bold"></iconify-icon>
                                Créé le {{ $job->created_at->format('d M Y') }}
                            </span>
                        </div>
                    </div>
                    {{-- Partie droite : Actions --}}
                    <div class="page-header-actions">
                        <a href="{{ route('career.index') }}" class="btn btn-danger">
                            {{-- <iconify-icon icon="solar:arrow-left-outline" class="me-1  "></iconify-icon> --}}
                            Liste des offres
                        </a>
                    </div>
                </div>
            </div>

            <!-- =================================================================
                           NOUVEAU DESIGN AUDACIEUX POUR LA DESCRIPTION
                        ================================================================= -->
            <div class="card radius-12 mb-24 job-description-tabs">
                <div class="card-body">
                    <!-- Navigation des onglets -->
                    <ul class="nav nav-tabs" id="jobDescriptionTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="summary-tab" data-bs-toggle="tab"
                                data-bs-target="#summary-tab-pane" type="button" role="tab"
                                aria-controls="summary-tab-pane" aria-selected="true">
                                <iconify-icon icon="solar:pen-new-square-outline"></iconify-icon>
                                Résumé
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                data-bs-target="#details-tab-pane" type="button" role="tab"
                                aria-controls="details-tab-pane" aria-selected="false">
                                <iconify-icon icon="solar:document-text-outline"></iconify-icon>
                                Description Détaillée
                            </button>
                        </li>
                    </ul>

                    <!-- Contenu des onglets -->
                    <div class="tab-content" id="jobDescriptionTabContent">
                        {{-- Onglet 1 : Résumé --}}
                        <div class="tab-pane fade show active" id="summary-tab-pane" role="tabpanel"
                            aria-labelledby="summary-tab" tabindex="0">
                            <p class="lead text-body-secondary mt-3">
                                {{ $job->bref_description ?? 'Aucun résumé disponible pour cette offre.' }}
                            </p>
                        </div>

                        {{-- Onglet 2 : Description Complète --}}
                        <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab"
                            tabindex="0">
                            {{-- La classe 'prose-style' permet de styliser le HTML généré --}}
                            <div class="prose-style mt-3">
                                {!! $job->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Liste des candidatures (Design conservé car jugé bon) -->
            <div class="card radius-12">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="fw-semibold mb-0">Candidatures reçues</h6>
                    <span class="text-primary fw-bold">{{ $jobApplications->total() }} Candidature(s)</span>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-applications sm-table mb-0">
                            <thead>
                                <tr>
                                    <th>Candidat</th>
                                    <th>Contact</th>
                                    <th>Type de demande</th>
                                    <th>Date</th>
                                    <th class="text-center">Documents</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jobApplications as $jobApplication)
                                    <tr>
                                        <td>
                                            <div class="applicant-info">
                                                <div class="applicant-avatar">
                                                    {{ substr($jobApplication->first_name, 0, 1) }}{{ substr($jobApplication->last_name, 0, 1) }}
                                                </div>
                                                <div class="applicant-details">
                                                    <span class="name">{{ $jobApplication->last_name }}
                                                        {{ $jobApplication->first_name }}</span>
                                                    <span class="email">{{ $jobApplication->email }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $jobApplication->phone }}</td>
                                        <td>
                                            <span
                                                class="fw-medium">{{ $jobApplication->intitule ?? 'Non défini' }}</span><br>
                                            <small
                                                class="text-muted">{{ $jobApplication->application_type === 'emploi' ? 'Demande d\'emploi' : 'Demande de Stage' }}</small>
                                        </td>
                                        <td>{{ $jobApplication->created_at->format('d/m/Y') }}</td>
                                        <td class="text-center">
                                            <div class="table-actions">
                                                @if ($jobApplication->cv_path && Storage::disk('public')->exists($jobApplication->cv_path))
                                                    <a href="{{ route('jobList.download', ['id' => $jobApplication->id, 'type' => 'cv']) }}"
                                                        class="btn btn-sm btn-outline-primary btn-icon"
                                                        title="Télécharger le CV"><iconify-icon
                                                            icon="solar:document-text-outline"></iconify-icon></a>
                                                @endif
                                                @if ($jobApplication->motivation_letter_path && Storage::disk('public')->exists($jobApplication->motivation_letter_path))
                                                    <a href="{{ route('jobList.download', ['id' => $jobApplication->id, 'type' => 'motivation_letter']) }}"
                                                        class="btn btn-sm btn-outline-secondary btn-icon"
                                                        title="Télécharger la lettre"><iconify-icon
                                                            icon="solar:letter-outline"></iconify-icon></a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5">
                                            <iconify-icon icon="solar:file-remove-outline"
                                                class="fs-1 text-muted d-block mx-auto mb-2"></iconify-icon>
                                            <p class="mb-0 text-muted">Aucune candidature pour cette offre pour le moment.
                                            </p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if ($jobApplications->hasPages())
                        <div class="p-24 border-top">
                            {{ $jobApplications->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @include('includes.admin.footer')
    </main>
@endsection
