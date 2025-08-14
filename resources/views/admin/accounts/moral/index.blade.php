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
                <h6 class="fw-semibold mb-0">Demandes morales</h6>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium">Demandes morales</li>
                </ul>
            </div>

            <div class="card h-100 p-0 radius-12">
                <div
                    class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                    <form action="{{ route('accounts.moral.index') }}" method="GET"
                        class="d-flex align-items-center flex-wrap gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <span class="text-md fw-medium text-secondary-light mb-0">Afficher</span>
                            <select name="per_page" class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px"
                                onchange="this.form.submit()">
                                <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
                                <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                                <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
                                <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                            </select>
                        </div>
                        <div class="navbar-search">
                            <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Rechercher..."
                                value="{{ request('search') }}">
                            <button type="submit" style="border:none; background:transparent; cursor:pointer;">
                                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                            </button>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <span class="text-md fw-medium text-secondary-light mb-0">Statut</span>
                            <select name="status" class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px"
                                onchange="this.form.submit()">
                                <option value="">Tous</option>
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
                                    <th>Date de Création</th>
                                    <th>Nom de l'entreprise</th>
                                    <th>Directeur</th>
                                    <th>RCCM</th>
                                    <th class="text-center">Statut</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($submissions as $submission)
                                    <tr>
                                        <td>{{ $submission->created_at->format('d M Y') }}</td>
                                        <td>{{ $submission->company_name }}</td>
                                        <td>{{ $submission->director_name }}</td>
                                        <td>{{ $submission->rccm }}</td>
                                        <td class="text-center">
                                            @if ($submission->statut === 'en_attente')
                                                <span
                                                    class="bg-warning-focus text-warning-600 border border-warning-main px-24 py-4 radius-4 fw-medium text-sm">En attente</span>
                                            @elseif ($submission->statut === 'accepter')
                                                <span
                                                    class="bg-success-focus text-success-600 border border-success-main px-24 py-4 radius-4 fw-medium text-sm">Accepté</span>
                                            @elseif ($submission->statut === 'refuser')
                                                <span
                                                    class="bg-danger-focus text-danger-600 border border-danger-main px-24 py-4 radius-4 fw-medium text-sm">Refusé</span>
                                            @else
                                                <span
                                                    class="bg-neutral-200 text-neutral-600 border border-neutral-400 px-24 py-4 radius-4 fw-medium text-sm">{{ $submission->statut }}</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center gap-10 justify-content-center">
                                                <!-- Bouton VOIR -->
                                                <a href="{{ route('accounts.moral.show', $submission->id) }}"
                                                    class="bg-info-focus text-info-600 bg-hover-info-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                    <iconify-icon icon="lucide:eye" class="menu-icon"></iconify-icon>
                                                </a>

                                                <!-- Bouton PDF -->
                                                <a href="{{ route('accounts.moral.pdf', $submission->id) }}"
                                                    class="bg-warning-focus text-warning-600 bg-hover-warning-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                    <iconify-icon icon="lucide:file-text" class="menu-icon"></iconify-icon>
                                                </a>

                                                <!-- Bouton IMPRIMER -->
                                                {{-- <button onclick="window.open('{{ route('accounts.moral.show', $submission->id) }}?print=1', '_blank')"
                                                    class="bg-danger-focus text-danger-600 bg-hover-danger-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                    <iconify-icon icon="lucide:printer" class="menu-icon"></iconify-icon>
                                                </button> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Aucune demande morale trouvée.</td>
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
@endsection 