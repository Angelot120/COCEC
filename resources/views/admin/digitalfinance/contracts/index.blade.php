@extends('layout.admin')

@section('title', 'Contrats d\'Adhésion - Finance Digitale')
    }

    /* 

@section('content')
@include('includes.admin.sidebar')
<main class="dashboard-main">
    @include('includes.admin.appbar')
    @include('includes.main.loading')

    <div class="dashboard-main-body">

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

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contracts as $contract)

                            @endforelse
                        </tbody>
                    </table>
                </div>

</script>
@endsection