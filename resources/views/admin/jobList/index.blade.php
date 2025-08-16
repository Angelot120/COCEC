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
                <h6 class="fw-semibold mb-0">Liste des candidatures spontanées</h6>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium">Candidatures spontanées</li>
                </ul>
            </div>

            <div class="card h-100 p-0 radius-12">
                <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                    <form action="{{ route('jobList.index') }}" method="GET" class="d-flex align-items-center flex-wrap gap-3">
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
                            <input type="text" class="bg-base h-40-px w-auto" name="search" placeholder="Rechercher..." value="{{ request('search') }}">
                            <button type="submit" style="border:none; background:transparent; cursor:pointer;">
                                <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-body p-24">
                    <div class="table-responsive scroll-sm">
                        <table class="table bordered-table sm-table mb-0">
                            <thead>
                                <tr>
                                    <th>Date de soumission</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Intitulé</th>
                                    <th>Type</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jobApplications as $jobApplication)
                                    <tr>
                                        <td>{{ $jobApplication->created_at->format('d M Y') }}</td>
                                        <td>{{ $jobApplication->last_name }} {{ $jobApplication->first_name }}</td>
                                        <td>{{ $jobApplication->email }}</td>
                                        <td>{{ $jobApplication->phone }}</td>
                                        <td>{{ $jobApplication->intitule ?? 'Non défini' }}</td>
                                        <td>{{ $jobApplication->application_type === 'emploi' ? 'Emploi' : 'Stage' }}</td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center gap-10 justify-content-center">
                                                <!-- Bouton VOIR -->
                                                <button type="button" class="bg-info-focus text-info-600 bg-hover-info-200 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle" data-bs-toggle="modal" data-bs-target="#viewJobApplicationModal{{ $jobApplication->id }}">
                                                    <iconify-icon icon="lucide:eye" class="menu-icon"></iconify-icon>
                                                </button>

                                                <!-- Bouton SUPPRIMER -->
                                                <form method="POST" action="{{ route('jobList.destroy', $jobApplication->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="remove-item-btn bg-danger-focus bg-hover-danger-200 text-danger-600 fw-medium w-40-px h-40-px d-flex justify-content-center align-items-center rounded-circle">
                                                        <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal de visualisation -->
                                    <div class="modal fade" id="viewJobApplicationModal{{ $jobApplication->id }}" tabindex="-1" aria-labelledby="viewJobApplicationModalLabel{{ $jobApplication->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewJobApplicationModalLabel{{ $jobApplication->id }}">Détails de la candidature</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Nom :</strong> {{ $jobApplication->last_name }} {{ $jobApplication->first_name }}</p>
                                                    <p><strong>Email :</strong> {{ $jobApplication->email }}</p>
                                                    <p><strong>Téléphone :</strong> {{ $jobApplication->phone }}</p>
                                                    <p><strong>Intitulé :</strong> {{ $jobApplication->intitule ?? 'Non défini' }}</p>
                                                    <p><strong>Type :</strong> {{ $jobApplication->application_type === 'emploi' ? 'Emploi' : 'Stage' }}</p>
                                                    <p><strong>Date de soumission :</strong> {{ $jobApplication->created_at->format('d M Y') }}</p>
                                                    <p><strong>CV :</strong>
                                                        @if ($jobApplication->cv_path && Storage::disk('public')->exists($jobApplication->cv_path))
                                                            <a href="{{ route('jobList.download', ['id' => $jobApplication->id, 'type' => 'cv']) }}" class="btn btn-sm btn-primary">Télécharger</a>
                                                        @else
                                                            Non disponible
                                                        @endif
                                                    </p>
                                                    <p><strong>Lettre de motivation :</strong>
                                                        @if ($jobApplication->motivation_letter_path && Storage::disk('public')->exists($jobApplication->motivation_letter_path))
                                                            <a href="{{ route('jobList.download', ['id' => $jobApplication->id, 'type' => 'motivation_letter']) }}" class="btn btn-sm btn-primary">Télécharger</a>
                                                        @else
                                                            Non disponible
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Aucune candidature spontanée trouvée.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-24">
                        {{ $jobApplications->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>

        @include('includes.admin.footer')
    </main>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Confirmation avant suppression
            document.querySelectorAll('.remove-item-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (confirm("Êtes-vous sûr de vouloir supprimer cette candidature ?")) {
                        this.closest('form').submit();
                    }
                });
            });
        });
    </script>
@endsection