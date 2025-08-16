@extends('layout.admin')

@section('css')
<style>
    /* =================================================================
                   PALETTE ET FONDATIONS DU DESIGN
                ================================================================= */
    :root {
        --primary-color: #EC281C;
        --primary-light-color: #fef2f2;
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
        --card-bg: #ffffff;
        --font-family-sans-serif: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    body {
        font-family: var(--font-family-sans-serif);
        color: var(--text-color);
        background-color: var(--body-bg);
    }

    /* =================================================================
                   EN-TÊTE DE PAGE STANDARD
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
        font-size: 1.4rem;
        margin-bottom: 0.5rem;
        color: var(--text-color);
    }

    .page-header-card p {
        color: var(--text-muted-color);
        margin-bottom: 0;
        font-size: 1rem;
    }

    /* =================================================================
                   CARTES ET CONTENU GÉNÉRAL
                ================================================================= */
    .card {
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        background-color: var(--card-bg);
        border-radius: 12px;
    }

    .card-header {
        background-color: transparent;
        border-bottom: 1px solid var(--border-color);
        padding: 1.5rem;
    }

    .card-body {
        padding: 1.5rem;
    }

    /* =================================================================
                   TABLEAU ET DONNÉES
                ================================================================= */
    .table {
        margin-bottom: 0;
    }

    .table th {
        border-top: none;
        border-bottom: 2px solid var(--border-color);
        font-weight: 600;
        color: var(--text-color);
        padding: 1rem 0.75rem;
        background-color: var(--body-bg);
    }

    .table td {
        border-top: none;
        border-bottom: 1px solid var(--border-color);
        padding: 1rem 0.75rem;
        vertical-align: middle;
    }

    .table tbody tr:hover {
        background-color: var(--primary-light-color);
    }

    /* =================================================================
                   BADGES ET STATUTS
                ================================================================= */
    .badge {
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.5em 0.75em;
        border-radius: 6px;
    }

    .badge-pending {
        background-color: #fff3cd;
        color: #856404;
    }

    .badge-active {
        background-color: #d4edda;
        color: #155724;
    }

    .badge-terminated {
        background-color: #f8d7da;
        color: #721c24;
    }

    /* =================================================================
                   BOUTONS ET ACTIONS
                ================================================================= */
    .btn {
        border-radius: 8px;
        font-weight: 500;
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }

    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .btn-primary:hover {
        background-color: #d6251a;
        border-color: #d6251a;
    }

    .btn-success {
        background-color: var(--success-color);
        border-color: var(--success-color);
    }

    .btn-danger {
        background-color: var(--danger-color);
        border-color: var(--danger-color);
    }

    .btn-sm {
        padding: 0.375rem 0.75rem;
        font-size: 0.8rem;
    }

    /* =================================================================
                   PAGINATION
                ================================================================= */
    .pagination {
        margin-bottom: 0;
    }

    .page-link {
        border: none;
        color: var(--text-color);
        padding: 0.5rem 0.75rem;
        margin: 0 0.125rem;
        border-radius: 6px;
    }

    .page-link:hover {
        background-color: var(--primary-light-color);
        color: var(--primary-color);
    }

    .page-item.active .page-link {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    /* =================================================================
                   RESPONSIVE
                ================================================================= */
    @media (max-width: 768px) {
        .page-header-card {
            padding: 1.5rem;
        }
        
        .page-header-card h2 {
            font-size: 1.2rem;
        }
        
        .table-responsive {
            font-size: 0.875rem;
        }
    }
</style>
@endsection

@section('content')
@include('includes.admin.sidebar')
<main class="dashboard-main">
    @include('includes.admin.appbar')
    @include('includes.main.loading')

    <div class="dashboard-main-body">
        <!-- En-tête de page -->
        <div class="page-header-card">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <h2>📋 Gestion des Contrats de Finance Digitale</h2>
                    <p>COCEC - Suivi et gestion des contrats d'adhésion</p>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 text-muted text-decoration-none">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon"></iconify-icon>
                        Dashboard
                    </a>
                    <span class="text-muted">-</span>
                    <span class="fw-medium">Finance Digitale</span>
                </div>
            </div>
        </div>

        <!-- Statistiques -->
        <div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="w-50-px h-50-px bg-primary rounded-circle d-flex justify-content-center align-items-center mx-auto mb-3">
                            <iconify-icon icon="ph:file-contract-fill" class="text-white text-xl"></iconify-icon>
                        </div>
                        <h5 class="card-title mb-1">{{ $contracts->total() }}</h5>
                        <p class="card-text text-muted mb-0">Total des contrats</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="w-50-px h-50-px bg-warning rounded-circle d-flex justify-content-center align-items-center mx-auto mb-3">
                            <iconify-icon icon="ph:clock-fill" class="text-white text-xl"></iconify-icon>
                        </div>
                        <h5 class="card-title mb-1">{{ $contracts->where('status', 'pending')->count() }}</h5>
                        <p class="card-text text-muted mb-0">En attente</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="w-50-px h-50-px bg-success rounded-circle d-flex justify-content-center align-items-center mx-auto mb-3">
                            <iconify-icon icon="ph:check-circle-fill" class="text-white text-xl"></iconify-icon>
                        </div>
                        <h5 class="card-title mb-1">{{ $contracts->where('status', 'active')->count() }}</h5>
                        <p class="card-text text-muted mb-0">Actifs</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="w-50-px h-50-px bg-danger rounded-circle d-flex justify-content-center align-items-center mx-auto mb-3">
                            <iconify-icon icon="ph:x-circle-fill" class="text-white text-xl"></iconify-icon>
                        </div>
                        <h5 class="card-title mb-1">{{ $contracts->where('status', 'terminated')->count() }}</h5>
                        <p class="card-text text-muted mb-0">Terminés</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tableau des contrats -->
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <h5 class="mb-0">Liste des Contrats Soumis</h5>
                    <div class="d-flex align-items-center gap-2">
                        <input type="text" class="form-control form-control-sm" id="searchInput" placeholder="Rechercher..." style="width: 200px;">
                        <select class="form-select form-select-sm" id="statusFilter" style="width: 150px;">
                            <option value="">Tous les statuts</option>
                            <option value="pending">En attente</option>
                            <option value="active">Actif</option>
                            <option value="terminated">Terminé</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Compte</th>
                                <th>Téléphone</th>
                                <th>Services</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contracts as $contract)
                            <tr>
                                <td>
                                    <div>
                                        <div class="fw-medium">{{ $contract->full_name }}</div>
                                        @if($contract->cni_type)
                                            <small class="text-muted">{{ $contract->cni_type }}: {{ $contract->cni_number }}</small>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-medium">{{ $contract->account_number }}</span>
                                </td>
                                <td>
                                    <span class="fw-medium">{{ $contract->phone }}</span>
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap gap-1">
                                        @if($contract->mobile_money)
                                            <span class="badge bg-primary">Mobile Money</span>
                                        @endif
                                        @if($contract->mobile_banking)
                                            <span class="badge bg-info">Mobile Banking</span>
                                        @endif
                                        @if($contract->web_banking)
                                            <span class="badge bg-warning">Web Banking</span>
                                        @endif
                                        @if($contract->sms_banking)
                                            <span class="badge bg-secondary">SMS Banking</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="fw-medium">{{ $contract->contract_date->format('d/m/Y') }}</div>
                                        <small class="text-muted">{{ $contract->created_at->format('H:i') }}</small>
                                    </div>
                                </td>
                                <td>
                                    @if($contract->status == 'pending')
                                        <span class="badge badge-pending">En attente</span>
                                    @elseif($contract->status == 'active')
                                        <span class="badge badge-active">Actif</span>
                                    @elseif($contract->status == 'terminated')
                                        <span class="badge badge-terminated">Terminé</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $contract->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('admin.digitalfinance.contracts.show', $contract->id) }}" 
                                           class="btn btn-sm btn-outline-primary" 
                                           title="Voir les détails">
                                            <iconify-icon icon="ph:eye"></iconify-icon>
                                        </a>
                                        <a href="{{ route('admin.digitalfinance.contracts.edit', $contract->id) }}" 
                                           class="btn btn-sm btn-outline-warning" 
                                           title="Modifier">
                                            <iconify-icon icon="ph:pencil"></iconify-icon>
                                        </a>
                                        @if($contract->status == 'pending')
                                            <form action="{{ route('admin.digitalfinance.contracts.activate', $contract->id) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-success" 
                                                        title="Activer"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir activer ce contrat ?')">
                                                    <iconify-icon icon="ph:check"></iconify-icon>
                                                </button>
                                            </form>
                                        @endif
                                        @if($contract->status == 'active')
                                            <form action="{{ route('admin.digitalfinance.contracts.terminate', $contract->id) }}" 
                                                  method="POST" 
                                                  class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-danger" 
                                                        title="Terminer"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir terminer ce contrat ?')">
                                                    <iconify-icon icon="ph:x"></iconify-icon>
                                                </button>
                                            </form>
                                        @endif
                                        <form action="{{ route('admin.digitalfinance.contracts.destroy', $contract->id) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-outline-danger" 
                                                    title="Supprimer"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce contrat ?')">
                                                <iconify-icon icon="ph:trash"></iconify-icon>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <div class="text-muted">
                                        <iconify-icon icon="ph:file-contract" class="text-3xl mb-2"></iconify-icon>
                                        <p class="mb-0">Aucun contrat soumis pour le moment</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        @if($contracts->hasPages())
        <div class="d-flex justify-content-center mt-4">
            {{ $contracts->links() }}
        </div>
        @endif
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Recherche en temps réel
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');
    const tableRows = document.querySelectorAll('tbody tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const statusTerm = statusFilter.value.toLowerCase();

        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const status = row.querySelector('td:nth-child(6)').textContent.toLowerCase();
            
            const matchesSearch = text.includes(searchTerm);
            const matchesStatus = !statusTerm || status.includes(statusTerm);
            
            row.style.display = matchesSearch && matchesStatus ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', filterTable);
    statusFilter.addEventListener('change', filterTable);
});
</script>
@endsection