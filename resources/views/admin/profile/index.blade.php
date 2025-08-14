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
                <h6 class="fw-semibold mb-0">Mon Profil</h6>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium">Mon Profil</li>
                </ul>
            </div>

            <div class="row">
                <!-- Informations du profil -->
                <div class="col-lg-8">
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Informations personnelles</h6>
                        </div>
                        <div class="card-body p-24">
                            <form action="{{ route('admin.profile.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-16">
                                            <label for="name" class="form-label">Nom complet *</label>
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                                                   value="{{ old('name', $user->name) }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-16">
                                            <label for="email" class="form-label">Adresse email *</label>
                                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                                                   value="{{ old('email', $user->email) }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-16">
                                            <label for="phone_num" class="form-label">Numéro de téléphone</label>
                                            <input type="text" name="phone_num" id="phone_num" class="form-control @error('phone_num') is-invalid @enderror" 
                                                   value="{{ old('phone_num', $user->phone_num) }}" placeholder="+228 XX XX XX XX">
                                            @error('phone_num')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-16">
                                            <label class="form-label">Rôle</label>
                                            <input type="text" class="form-control" value="Administrateur" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-16">
                                            <label class="form-label">Membre depuis</label>
                                            <input type="text" class="form-control" value="{{ $user->created_at->format('d/m/Y') }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-16">
                                            <label class="form-label">Dernière connexion</label>
                                            <input type="text" class="form-control" value="{{ $user->updated_at->format('d/m/Y à H:i') }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-warning d-flex align-items-center gap-2">
                                        <iconify-icon icon="lucide:save" class="icon"></iconify-icon>
                                        Mettre à jour le profil
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Photo de profil -->
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Photo de profil</h6>
                        </div>
                        <div class="card-body p-24 text-center">
                            <div class="mb-16">
                                <img src="{{ URL::asset('assets/images/user.png') }}" alt="Photo de profil" 
                                     class="w-120-px h-120-px object-fit-cover rounded-circle border">
                            </div>
                            <p class="text-sm text-secondary-light mb-0">Photo de profil par défaut</p>
                        </div>
                    </div>

                    <!-- Changer le mot de passe -->
                    <div class="card">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Changer le mot de passe</h6>
                        </div>
                        <div class="card-body p-24">
                            <form action="{{ route('admin.profile.password') }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="mb-16">
                                    <label for="current_password" class="form-label">Mot de passe actuel *</label>
                                    <input type="password" name="current_password" id="current_password" 
                                           class="form-control @error('current_password') is-invalid @enderror" required>
                                    @error('current_password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-16">
                                    <label for="password" class="form-label">Nouveau mot de passe *</label>
                                    <input type="password" name="password" id="password" 
                                           class="form-control @error('password') is-invalid @enderror" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Le mot de passe doit contenir au moins 8 caractères.</div>
                                </div>

                                <div class="mb-16">
                                    <label for="password_confirmation" class="form-label">Confirmer le nouveau mot de passe *</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" 
                                           class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-warning w-100 d-flex align-items-center justify-content-center gap-2">
                                    <iconify-icon icon="lucide:lock" class="icon"></iconify-icon>
                                    Changer le mot de passe
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('includes.admin.footer')
    </main>
@endsection 