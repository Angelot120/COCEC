@extends('layout.admin')

@section('title', 'Détails de l\'Utilisateur')

@section('content')
@include('includes.admin.sidebar')
<main class="dashboard-main">
    @include('includes.admin.appbar')
    @include('includes.main.loading')

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Détails de l'Utilisateur</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Détails Utilisateur</li>
            </ul>
        </div>

        <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Détails de l'Utilisateur</h4>
                    <div>
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Retour
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="150">ID :</th>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <th>Nom complet :</th>
                                    <td>{{ $user->name }}</td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email :</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Rôle :</th>
                                    <td>
                                        <span class="badge bg-{{ $user->role->value === 'super_admin' ? 'danger' : ($user->role->value === 'dg' ? 'warning' : ($user->role->value === 'informaticien' ? 'info' : 'success')) }}">
                                            {{ $user->role->getLabel() }}
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="150">Téléphone :</th>
                                    <td>{{ $user->phone_num ?? 'Non renseigné' }}</td>
                                </tr>
                                <tr>
                                    <th>Date de création :</th>
                                    <td>{{ $user->created_at->format('d/m/Y à H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Dernière connexion :</th>
                                    <td>{{ $user->updated_at->format('d/m/Y à H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Permissions :</th>
                                    <td>
                                        @if($user->hasFullAccess())
                                            <span class="badge bg-success">Accès complet</span>
                                        @else
                                            <span class="badge bg-warning">Accès limité</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <h5>Actions disponibles</h5>
                            <div class="btn-group" role="group">
                                <form action="{{ route('admin.users.reset-password', $user) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary" onclick="return confirm('Réinitialiser le mot de passe ?')">
                                        <i class="fas fa-key"></i> Réinitialiser le mot de passe
                                    </button>
                                </form>
                                
                                @if($user->id !== auth()->id())
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </main>
</div>
@endsection 