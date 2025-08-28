@extends('layout.admin')

@section('title', 'Gestion des Plaintes - Admin')

@section('content')
@include('includes.admin.sidebar')
<main class="dashboard-main">
    @include('includes.admin.appbar')
    @include('includes.main.loading')


    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Gestion des Plaintes</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Gestion des Plaintes</li>
            </ul>
        </div>

        <!-- Statistiques -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 gy-4 mb-24">
            <div class="col">
                <div class="card shadow-none border h-100">
                    <div class="card-body p-20">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="fw-medium text-muted mb-1">Total Plaintes</p>
                                <h6 class="mb-0">{{ number_format($stats['total'] ?? 0) }}</h6>
                            </div>
                            <div class="w-50-px h-50-px bg-cocec-red rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="mdi:message-text-outline" class="text-white text-2xl"></iconify-icon>
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
                                <p class="fw-medium text-muted mb-1">En Attente</p>
                                <h6 class="mb-0">{{ number_format($stats['pending'] ?? 0) }}</h6>
                            </div>
                            <div class="w-50-px h-50-px bg-warning rounded-circle d-flex justify-content-center align-items-center">
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
                                <p class="fw-medium text-muted mb-1">En Traitement</p>
                                <h6 class="mb-0">{{ number_format($stats['processing'] ?? 0) }}</h6>
                            </div>
                            <div class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:gear-fill" class="text-white text-2xl"></iconify-icon>
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
                                <p class="fw-medium text-muted mb-1">Résolues</p>
                                <h6 class="mb-0">{{ number_format($stats['resolved'] ?? 0) }}</h6>
                            </div>
                            <div class="w-50-px h-50-px bg-success rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:check-circle-fill" class="text-white text-2xl"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Liste des Plaintes -->
        <div class="card h-100 p-0 radius-12">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                <form action="{{ route('admin.complaint.index') }}" method="GET" class="d-flex align-items-center flex-wrap gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <span class="text-md fw-medium text-secondary-light mb-0">Afficher</span>
                        <select name="per_page" class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" onchange="this.form.submit()">
                            <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
                            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                            <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
                        </select>
                    </div>
                    <div class="navbar-search">
                        <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Rechercher par nom, numéro, référence..." value="{{ request('search') }}">
                        <button type="submit" style="border:none; background:transparent; cursor:pointer;">
                            <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                        </button>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <select name="status" class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" onchange="this.form.submit()">
                            <option value="">Tous les statuts</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>En attente</option>
                            <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>En traitement</option>
                            <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Résolues</option>
                            <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Fermées</option>
                        </select>
                        <select name="category" class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" onchange="this.form.submit()">
                            <option value="">Toutes les catégories</option>
                            <option value="service" {{ request('category') == 'service' ? 'selected' : '' }}>Service</option>
                            <option value="credit" {{ request('category') == 'credit' ? 'selected' : '' }}>Crédit</option>
                            <option value="epargne" {{ request('category') == 'epargne' ? 'selected' : '' }}>Épargne</option>
                            <option value="technique" {{ request('category') == 'technique' ? 'selected' : '' }}>Technique</option>
                            <option value="autre" {{ request('category') == 'autre' ? 'selected' : '' }}>Autre</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="card-body p-24">
                <div class="table-responsive scroll-sm">
                    <table class="table bordered-table sm-table mb-0">
                        <thead>
                            <tr>
                                <th>Référence</th>
                                <th>Membre</th>
                                <th>Catégorie</th>
                                <th>Objet</th>
                                <th class="text-center">Statut</th>
                                <th>Date</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Debug: Afficher les informations de débogage -->
                            @if(isset($complaints) && $complaints->count() > 0)
                                <tr>
                                    <td colspan="7" class="text-center py-12 bg-info-light">
                                        <strong>Debug:</strong> {{ $complaints->count() }} plaintes trouvées, Total: {{ $complaints->total() }}
                                    </td>
                                </tr>
                            @endif
                            
                            @forelse($complaints as $complaint)
                                <tr>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $complaint->reference }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fw-medium">{{ $complaint->member_name }}</span>
                                            <span class="text-sm text-secondary-light">{{ $complaint->member_number }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        @if($complaint->category === 'service')
                                            <span class="bg-primary-focus text-primary-600 border border-primary-main px-24 py-4 radius-4 fw-medium text-sm">Service</span>
                                        @elseif($complaint->category === 'credit')
                                            <span class="bg-warning-focus text-warning-600 border border-warning-main px-24 py-4 radius-4 fw-medium text-sm">Crédit</span>
                                        @elseif($complaint->category === 'epargne')
                                            <span class="bg-info-focus text-info-600 border border-info-main px-24 py-4 radius-4 fw-medium text-sm">Épargne</span>
                                        @elseif($complaint->category === 'technique')
                                            <span class="bg-danger-focus text-danger-600 border border-danger-main px-24 py-4 radius-4 fw-medium text-sm">Technique</span>
                                        @else
                                            <span class="bg-secondary-focus text-secondary-600 border border-secondary-main px-24 py-4 radius-4 fw-medium text-sm">Autre</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-truncate" style="max-width: 200px;" title="{{ $complaint->subject }}">
                                            {{ $complaint->subject }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if($complaint->status === 'pending')
                                            <span class="bg-warning-focus text-warning-600 border border-warning-main px-24 py-4 radius-4 fw-medium text-sm">En attente</span>
                                        @elseif($complaint->status === 'processing')
                                            <span class="bg-info-focus text-info-600 border border-info-main px-24 py-4 radius-4 fw-medium text-sm">En traitement</span>
                                        @elseif($complaint->status === 'resolved')
                                            <span class="bg-success-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm">Résolue</span>
                                        @else
                                            <span class="bg-secondary-focus text-secondary-600 border border-secondary-main px-24 py-4 radius-4 fw-medium text-sm">Fermée</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $complaint->created_at->format('d M Y') }}</small>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex align-items-center gap-10 justify-content-center">
                                            <a href="{{ route('admin.complaint.show', $complaint->id) }}" 
                                               class="bg-info-focus text-info-600 bg-hover-info-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                               title="Voir les détails">
                                                <iconify-icon icon="lucide:eye" class="menu-icon"></iconify-icon>
                                            </a>
                                            <button onclick="updateStatus({{ $complaint->id }})" 
                                                    class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                                    title="Mettre à jour le statut">
                                                <iconify-icon icon="lucide:pencil" class="menu-icon"></iconify-icon>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-24">
                                        <div class="d-flex flex-column align-items-center gap-3">
                                            <iconify-icon icon="lucide:file-x" class="icon text-4xl text-secondary-light"></iconify-icon>
                                            <span class="text-secondary-light">Aucune plainte trouvée</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-24">
                    {{ $complaints->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
    @include('includes.admin.footer')
</main>
@endsection

@section('js')
<script>
function updateStatus(complaintId) {
    window.location.href = `/admin/complaint/${complaintId}`;
}
</script>
@endsection