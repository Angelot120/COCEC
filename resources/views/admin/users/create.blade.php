@extends('layout.admin')

@section('title', 'Créer un Compte Utilisateur')

@section('content')
@include('includes.admin.sidebar')
<main class="dashboard-main">
    @include('includes.main.loading')
    @include('includes.admin.appbar')

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Créer un Compte Utilisateur</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Créer un Compte</li>
            </ul>
        </div>

        <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Créer un Nouveau Compte Utilisateur</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom complet <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Rôle <span class="text-danger">*</span></label>
                                    <select class="form-select @error('role') is-invalid @enderror" 
                                            id="role" name="role" required>
                                        <option value="">Sélectionner un rôle</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->value }}" {{ old('role') == $role->value ? 'selected' : '' }}>
                                                {{ $role->getLabel() }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone_num" class="form-label">Numéro de téléphone</label>
                                    <input type="text" class="form-control @error('phone_num') is-invalid @enderror" 
                                           id="phone_num" name="phone_num" value="{{ old('phone_num') }}">
                                    @error('phone_num')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <iconify-icon icon="lucide:info" class="menu-icon"></iconify-icon>
                            <strong>Information :</strong> Un mot de passe aléatoire sera généré et envoyé par email à l'utilisateur.
                        </div>

                        <div class="d-flex justify-content-between">
                            {{-- <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                                <iconify-icon icon="lucide:arrow-left" class="menu-icon"></iconify-icon> Retour
                            </a> --}}
                            <button type="submit" class="btn btn-danger">
                                Créer le Compte
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
    </main>
</div>
@endsection 