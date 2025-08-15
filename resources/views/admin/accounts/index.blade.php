@extends('layout.admin')

@section('title', 'Gestion des Comptes - Vue d\'ensemble')

@section('content')
@include('includes.admin.sidebar')
<main class="dashboard-main">
    @include('includes.admin.appbar')
    @include('includes.main.loading')

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Gestion des Comptes - Vue d'ensemble</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Gestion des Comptes</li>
            </ul>
        </div>

        <!-- Statistiques -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 gy-4 mb-24">
            <div class="col">
                <div class="card shadow-none border h-100">
                    <div class="card-body p-20">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="fw-medium text-muted mb-1">Total Comptes Physiques</p>
                                <h6 class="mb-0">{{ number_format($totalPhysical) }}</h6>
                            </div>
                            <div class="w-50-px h-50-px bg-danger1 rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:user-fill" class="text-white text-2xl"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-none border h-100">
                    <div class="card-body p-20">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="fw-medium text-muted mb-1">Total Comptes Moraux</p>
                                <h6 class="mb-0">{{ number_format($totalMoral) }}</h6>
                            </div>
                            <div class="w-50-px h-50-px bg-success rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:buildings-fill" class="text-white text-2xl"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-none border h-100">
                    <div class="card-body p-20">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="fw-medium text-muted mb-1">En Attente Physiques</p>
                                <h6 class="mb-0">{{ number_format($pendingPhysical) }}</h6>
                            </div>
                            <div class="w-50-px h-50-px bg-warning1 rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:clock-fill" class="text-white text-2xl"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-none border h-100">
                    <div class="card-body p-20">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="fw-medium text-muted mb-1">En Attente Moraux</p>
                                <h6 class="mb-0">{{ number_format($pendingMoral) }}</h6>
                            </div>
                            <div class="w-50-px h-50-px bg-danger1 rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:clock-fill" class="text-white text-2xl"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comptes Physiques Récents -->
        <div class="row mb-24">
            <div class="col-12">
                <div class="card shadow-none border">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Comptes Physiques Récents</h5>
                        <a href="{{ route('accounts.physical.index') }}" class="btn btn-danger btn-sm">
                            Voir tous
                        </a>
                    </div>
                    <div class="card-body">
                        @if($physicalSubmissions->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Statut</th>
                                            <th>Date de création</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($physicalSubmissions as $submission)
                                            <tr>
                                                <td>{{ $submission->id }}</td>
                                                <td>{{ $submission->last_name }} {{ $submission->first_names }}</td>
                                                <td>
                                                    <span class="badge bg-{{ $submission->statut === 'en_attente' ? 'warning' : ($submission->statut === 'accepter' ? 'success' : 'danger1') }}">
                                                        {{ $submission->statut === 'en_attente' ? 'En attente' : ($submission->statut === 'accepter' ? 'Accepté' : 'Refusé') }}
                                                    </span>
                                                </td>
                                                <td>{{ $submission->created_at->format('d/m/Y H:i') }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                                        <!-- Bouton VOIR -->
                                                        <a href="{{ route('accounts.physical.show', $submission->id) }}" 
                                                           class="bg-info-focus text-info-600 bg-hover-info-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                                           title="Voir">
                                                            <iconify-icon icon="lucide:eye" class="menu-icon"></iconify-icon>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted text-center py-4">Aucun compte physique trouvé</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Comptes Moraux Récents -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-none border">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Comptes Moraux Récents</h5>
                        <a href="{{ route('accounts.moral.index') }}" class="btn btn-danger btn-sm">
                            Voir tous
                        </a>
                    </div>
                    <div class="card-body">
                        @if($moralSubmissions->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nom de l'entreprise</th>
                                            <th>Statut</th>
                                            <th>Date de création</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($moralSubmissions as $submission)
                                            <tr>
                                                <td>{{ $submission->id }}</td>
                                                <td>{{ $submission->company_name }}</td>
                                                <td>
                                                    <span class="badge bg-{{ $submission->statut === 'en_attente' ? 'warning1' : ($submission->statut === 'accepter' ? 'success' : 'danger') }}">
                                                        {{ $submission->statut === 'en_attente' ? 'En attente' : ($submission->statut === 'accepter' ? 'Accepté' : 'Refusé') }}
                                                    </span>
                                                </td>
                                                <td>{{ $submission->created_at->format('d/m/Y H:i') }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                                        <!-- Bouton VOIR -->
                                                        <a href="{{ route('accounts.moral.show', $submission->id) }}" 
                                                           class="bg-info-focus text-info-600 bg-hover-info-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                                           title="Voir">
                                                            <iconify-icon icon="lucide:eye" class="menu-icon"></iconify-icon>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted text-center py-4">Aucun compte moral trouvé</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection 