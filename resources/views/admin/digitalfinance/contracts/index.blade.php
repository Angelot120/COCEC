@extends('layout.admin')

@section('title', 'Contrats d\'Adhésion - Finance Digitale')

@section('content')
@include('includes.admin.sidebar')
<main class="dashboard-main">
    @include('includes.admin.appbar')
    @include('includes.main.loading')

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Contrats d'Adhésion - Finance Digitale</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="mdi:cellphone-banking" class="icon text-lg"></iconify-icon>
                        Finance Digitale
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Contrats d'Adhésion</li>
            </ul>
        </div>

        <!-- Statistiques -->
        <div class="row row-cols-1 row-cols-md-4 g-4 mb-24">
            <div class="col">
                <div class="card shadow-none border h-100">
                    <div class="card-body p-20">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="fw-medium text-muted mb-1">Total</p>
                                <h6 class="mb-0">{{ $totalContracts }}</h6>
                            </div>
                            <div class="w-50-px h-50-px bg-primary rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:file-contract" class="text-white text-2xl"></iconify-icon>
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
                                <h6 class="mb-0">{{ $pendingContracts }}</h6>
                            </div>
                            <div class="w-50-px h-50-px bg-warning rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:clock" class="text-white text-2xl"></iconify-icon>
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
                                <p class="fw-medium text-muted mb-1">Actifs</p>
                                <h6 class="mb-0">{{ $activeContracts }}</h6>
                            </div>
                            <div class="w-50-px h-50-px bg-success rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:check-circle" class="text-white text-2xl"></iconify-icon>
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
                                <p class="fw-medium text-muted mb-1">Terminés</p>
                                <h6 class="mb-0">{{ $terminatedContracts }}</h6>
                            </div>
                            <div class="w-50-px h-50-px bg-danger rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:x-circle" class="text-white text-2xl"></iconify-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtres et Recherche -->
        <div class="card mb-24">
            <div class="card-header bg-base py-16 px-24">
                <h6 class="fw-semibold mb-0">Filtres et Recherche</h6>
            </div>
            <div class="card-body p-24">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="search" class="form-label">Recherche par nom</label>
                        <input type="text" class="form-control" id="search" name="search" 
                               value="{{ request('search') }}" placeholder="Saisissez le nom du souscripteur..."
                               oninput="filterTable()">
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label">Statut</label>
                        <select class="form-select" id="status" name="status" onchange="filterTable()">
                            <option value="">Tous les statuts</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>En attente</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Actif</option>
                            <option value="terminated" {{ request('status') == 'terminated' ? 'selected' : '' }}>Terminé</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableau des contrats -->
        <div class="card">
            <div class="card-header bg-base py-16 px-24">
                <h6 class="fw-semibold mb-0">Liste des Contrats d'Adhésion</h6>
            </div>
            <div class="card-body p-24">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Souscripteur</th>
                                <th>Compte</th>
                                <th>Services</th>
                                <th>Statut</th>
                                <th>Date Contrat</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contracts as $contract)
                                <tr>
                                    <td>
                                        <span class="fw-semibold">#{{ $contract->id }}</span>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="fw-semibold">{{ $contract->full_name }}</div>
                                            <small class="text-muted">{{ $contract->phone }}</small>
                                            @if($contract->address)
                                                <br><small class="text-muted">{{ Str::limit($contract->address, 50) }}</small>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $contract->account_number }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-1">
                                            @if($contract->mobile_money)
                                                <span class="badge bg-success">Mobile Money</span>
                                            @endif
                                            @if($contract->mobile_banking)
                                                <span class="badge bg-primary">Mobile Banking</span>
                                            @endif
                                            @if($contract->web_banking)
                                                <span class="badge bg-info">Web Banking</span>
                                            @endif
                                            @if($contract->sms_banking)
                                                <span class="badge bg-warning">SMS Banking</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $contract->status_color }}">
                                            {{ $contract->status_label }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <small class="fw-semibold">{{ $contract->contract_date ? $contract->contract_date->format('d/m/Y') : 'N/A' }}</small>
                                            <small class="text-muted">{{ $contract->created_at->format('H:i') }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-10 justify-content-center">
                                            <!-- Bouton VOIR -->
                                            <a href="{{ route('admin.digitalfinance.contracts.show', $contract) }}" 
                                               class="bg-info-focus text-info-600 bg-hover-info-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                               title="Voir">
                                                <iconify-icon icon="lucide:eye" class="menu-icon"></iconify-icon>
                                            </a>

                                            <!-- Bouton PDF -->
                                            <a href="{{ route('admin.digitalfinance.contracts.pdf', $contract->id) }}" 
                                               class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                               title="Télécharger PDF">
                                                <iconify-icon icon="lucide:file-text" class="menu-icon"></iconify-icon>
                                            </a>

                                            <!-- Bouton SUPPRIMER -->
                                            <form action="{{ route('admin.digitalfinance.contracts.destroy', $contract) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-danger-focus text-danger-600 bg-hover-danger-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                                        title="Supprimer"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contrat ?')">
                                                    <iconify-icon icon="lucide:trash-2" class="menu-icon"></iconify-icon>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <div class="text-muted">
                                            <iconify-icon icon="ph:file-contract" class="text-4xl mb-2"></iconify-icon>
                                            <p class="mb-0">Aucun contrat d'adhésion trouvé</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($contracts->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $contracts->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('includes.admin.footer')
</main>
@endsection

@section('js')
<script>
function filterTable() {
    const searchTerm = document.getElementById('search').value.toLowerCase();
    const statusFilter = document.getElementById('status').value;
    const table = document.querySelector('table tbody');
    const rows = table.querySelectorAll('tr');

    rows.forEach(row => {
        const nameCell = row.querySelector('td:nth-child(2)');
        const statusCell = row.querySelector('td:nth-child(5)');
        
        if (nameCell && statusCell) {
            const name = nameCell.textContent.toLowerCase();
            const status = statusCell.textContent.trim();
            
            let showRow = true;
            
            // Filtre par nom
            if (searchTerm && !name.includes(searchTerm)) {
                showRow = false;
            }
            
            // Filtre par statut
            if (statusFilter && status !== getStatusLabel(statusFilter)) {
                showRow = false;
            }
            
            row.style.display = showRow ? '' : 'none';
        }
    });
}

function getStatusLabel(status) {
    const statusMap = {
        'pending': 'En attente',
        'active': 'Actif',
        'terminated': 'Terminé'
    };
    return statusMap[status] || status;
}
</script>
@endsection