@extends('layout.admin')

@section('title', 'Formulaires de Mise à Jour - Finance Digitale')

@section('content')
@include('includes.admin.sidebar')
<main class="dashboard-main">
    @include('includes.admin.appbar')
    @include('includes.main.loading')

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Formulaires de Mise à Jour - Finance Digitale</h6>
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
                <li class="fw-medium">Formulaires de Mise à Jour</li>
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
                                <h6 class="mb-0">{{ $totalUpdates }}</h6>
                            </div>
                            <div class="w-50-px h-50-px bg-primary rounded-circle d-flex justify-content-center align-items-center">
                                <iconify-icon icon="ph:files" class="text-white text-2xl"></iconify-icon>
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
                                <h6 class="mb-0">{{ $pendingUpdates }}</h6>
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
                                <p class="fw-medium text-muted mb-1">Approuvés</p>
                                <h6 class="mb-0">{{ $approvedUpdates }}</h6>
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
                                <p class="fw-medium text-muted mb-1">Rejetés</p>
                                <h6 class="mb-0">{{ $rejectedUpdates }}</h6>
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
                               value="{{ request('search') }}" placeholder="Saisissez le nom du client..."
                               oninput="filterTable()">
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label">Statut</label>
                        <select class="form-select" id="status" name="status" onchange="filterTable()">
                            <option value="">Tous les statuts</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>En attente</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approuvé</option>
                            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejeté</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableau des formulaires -->
        <div class="card">
            <div class="card-header bg-base py-16 px-24">
                <h6 class="fw-semibold mb-0">Liste des Formulaires de Mise à Jour</h6>
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
                                <th>Client</th>
                                <th>Compte</th>
                                <th>Contacts</th>
                                <th>Services</th>
                                <th>Statut</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($updates as $update)
                                <tr>
                                    <td>
                                        <span class="fw-semibold">#{{ $update->id }}</span>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="fw-semibold">{{ $update->full_name }}</div>
                                            <small class="text-muted">{{ $update->cni_type }}: {{ $update->cni_number }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $update->account_number }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column gap-1">
                                            @if($update->email)
                                                <small class="text-muted">{{ $update->email }}</small>
                                            @endif
                                            @if($update->togocel)
                                                <small class="text-muted">Togocel: {{ $update->togocel }}</small>
                                            @endif
                                            @if($update->moov)
                                                <small class="text-muted">Moov: {{ $update->moov }}</small>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-1">
                                            @if($update->mobile_banking_togocel || $update->mobile_banking_moov)
                                                <span class="badge bg-success">Mobile Banking</span>
                                            @endif
                                            @if($update->mobile_money_togocel || $update->mobile_money_moov)
                                                <span class="badge bg-primary">Mobile Money</span>
                                            @endif
                                            @if($update->web_banking_togocel || $update->web_banking_moov)
                                                <span class="badge bg-info">Web Banking</span>
                                            @endif
                                            @if($update->sms_banking_togocel || $update->sms_banking_moov)
                                                <span class="badge bg-warning">SMS Banking</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $update->status_color }}">
                                            {{ $update->status_label }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <small class="fw-semibold">{{ $update->created_at->format('d/m/Y') }}</small>
                                            <small class="text-muted">{{ $update->created_at->format('H:i') }}</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-10 justify-content-center">
                                            <!-- Bouton VOIR -->
                                            <a href="{{ route('admin.digitalfinance.updates.show', $update) }}" 
                                               class="bg-info-focus text-info-600 bg-hover-info-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                               title="Voir">
                                                <iconify-icon icon="lucide:eye" class="menu-icon"></iconify-icon>
                                            </a>

                                            <!-- Bouton PDF -->
                                            <a href="{{ route('admin.digitalfinance.updates.pdf', $update) }}" 
                                               class="bg-success-focus text-success-600 bg-hover-success-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                               title="Télécharger PDF">
                                                <iconify-icon icon="lucide:file-text" class="menu-icon"></iconify-icon>
                                            </a>

                                            <!-- Bouton SUPPRIMER -->
                                            <form action="{{ route('admin.digitalfinance.updates.destroy', $update) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-danger-focus text-danger-600 bg-hover-danger-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                                        title="Supprimer"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce formulaire ?')">
                                                    <iconify-icon icon="lucide:trash-2" class="menu-icon"></iconify-icon>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="text-muted">
                                            <iconify-icon icon="ph:file-text" class="text-4xl mb-2"></iconify-icon>
                                            <p class="mb-0">Aucun formulaire de mise à jour trouvé</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($updates->hasPages())
                    <div class="d-flex justify-content-center mt-4">
                        {{ $updates->links() }}
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
        const statusCell = row.querySelector('td:nth-child(6)');
        
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
        'approved': 'Approuvé',
        'rejected': 'Rejeté'
    };
    return statusMap[status] || status;
}
</script>
@endsection