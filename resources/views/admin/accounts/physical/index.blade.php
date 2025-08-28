
@extends('layout.admin')

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

            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
                <h6 class="fw-semibold mb-0">Soumissions des comptes physiques</h6>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium">Comptes physiques</li>
                </ul>
            </div>

            <div class="card h-100 p-0 radius-12">
                <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                    <form action="{{ route('accounts.physical.index') }}" method="GET" class="d-flex align-items-center flex-wrap gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <span class="text-md fw-medium text-secondary-light mb-0">Afficher</span>
                            <select name="per_page" class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" onchange="this.form.submit()">
                                <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                                <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                                <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                            </select>
                        </div>
                        <div class="navbar-search">
                            <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Rechercher par nom ou numéro de compte..." value="{{ request('search') }}">
                            <button type="submit" style="border:none; background:transparent; cursor:pointer;">
                                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                            </button>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <select name="status" class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px">
                                <option value="">Tous les statuts</option>
                                <option value="en_attente" {{ request('status') == 'en_attente' ? 'selected' : '' }}>En attente</option>
                                <option value="accepter" {{ request('status') == 'accepter' ? 'selected' : '' }}>Accepté</option>
                                <option value="refuser" {{ request('status') == 'refuser' ? 'selected' : '' }}>Refusé</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="card-body p-24">
                    <div class="table-responsive scroll-sm">
                        <table class="table bordered-table sm-table mb-0">
                            <thead>
                                <tr>
                                    <th>Date de soumission</th>
                                    <th>Nom complet</th>
                                    <th>Téléphone</th>
                                    <th>N° de compte</th>
                                    <th class="text-center">Statut</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($submissions as $submission)
                                    <tr>
                                        <td>{{ $submission->created_at->format('d M Y') }}</td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fw-medium">{{ $submission->last_name }}</span>
                                                <span class="text-sm text-secondary-light">{{ $submission->first_names }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $submission->phone ?? '-' }}</td>
                                        <td>
                                            @if($submission->account_number)
                                                <span class="fw-medium text-primary">{{ $submission->account_number }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($submission->statut === 'accepter')
                                                <span class="bg-success-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm">Accepté</span>
                                            @elseif ($submission->statut === 'refuser')
                                                <span class="bg-danger-focus text-danger-600 border border-danger-main px-24 py-4 radius-4 fw-medium text-sm">Refusé</span>
                                            @else
                                                <span class="bg-warning-focus text-warning-600 border border-warning-main px-24 py-4 radius-4 fw-medium text-sm">En attente</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center gap-10 justify-content-center">
                                                <!-- Bouton VOIR -->
                                                <a href="{{ route('accounts.physical.show', $submission->id) }}"
                                                    class="bg-info-focus text-info-600 bg-hover-info-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                                    title="Voir les détails">
                                                    <iconify-icon icon="lucide:eye" class="menu-icon"></iconify-icon>
                                                </a>

                                                <!-- Bouton PDF -->
                                                <a href="{{ route('accounts.physical.pdf', $submission->id) }}"
                                                    class="bg-primary-focus text-primary-600 bg-hover-primary-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                                    title="Télécharger PDF">
                                                    <iconify-icon icon="lucide:file-text" class="menu-icon"></iconify-icon>
                                                </a>

                                                <!-- Bouton IMPRIMER -->
                                                <!-- {{-- <button onclick="printSubmission({{ $submission->id }})"
                                                    class="bg-secondary-focus text-secondary-600 bg-hover-secondary-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle"
                                                    title="Imprimer">
                                                    <iconify-icon icon="lucide:printer" class="menu-icon"></iconify-icon>
                                                </button> --}} -->
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-24">
                                            <div class="d-flex flex-column align-items-center gap-3">
                                                <iconify-icon icon="lucide:file-x" class="icon text-4xl text-secondary-light"></iconify-icon>
                                                <span class="text-secondary-light">Aucune soumission trouvée</span>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-24">
                        {{ $submissions->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>

        @include('includes.admin.footer')
    </main>

    <script>
        function printSubmission(id) {
            window.open('{{ url('admin/accounts/physical') }}/' + id + '?print=1', '_blank');
        }
    </script>

    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            .printable, .printable * {
                visibility: visible;
            }
            .printable {
                position: absolute;
                left: 0;
                top: 0;
            }
            .no-print {
                display: none;
            }
        }
    </style>
@endsection
