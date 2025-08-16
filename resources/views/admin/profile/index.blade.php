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
                                            <input type="text" class="form-control" value="{{ $user->role->getLabel() }}" readonly>
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

                                <!-- Informations sur les permissions -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-16">
                                            <label class="form-label">Permissions</label>
                                            <div class="d-flex flex-wrap gap-2">
                                                @if($user->hasFullAccess())
                                                    <span class="badge bg-success">Accès complet à toutes les fonctionnalités</span>
                                                @else
                                                    <span class="badge bg-warning">Accès limité</span>
                                                @endif
                                                
                                                @if($user->canCreateAccounts())
                                                    <span class="badge bg-warning1">Peut créer des comptes utilisateurs</span>
                                                @endif
                                                
                                                @if($user->canManageAccounts())
                                                    <span class="badge bg-danger1">Peut gérer les comptes</span>
                                                @endif
                                            </div>
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

                    <!-- Changer le mot de passe -->
                    <div class="card">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Changer le mot de passe</h6>
                        </div>
                        <div class="card-body p-24">
                            <form action="{{ route('admin.profile.password') }}" method="POST">
                                @csrf
                                @method('PUT')
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-16">
                                            <label for="current_password" class="form-label">Mot de passe actuel *</label>
                                            <input type="password" name="current_password" id="current_password" 
                                                   class="form-control @error('current_password') is-invalid @enderror" required>
                                            @error('current_password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-16">
                                            <label for="password" class="form-label">Nouveau mot de passe *</label>
                                            <input type="password" name="password" id="password" 
                                                   class="form-control @error('password') is-invalid @enderror" required>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-16">
                                            <label for="password_confirmation" class="form-label">Confirmer le nouveau mot de passe *</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation" 
                                                   class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-16">
                                            <label class="form-label">Exigences</label>
                                            <div class="form-text">
                                                <ul class="mb-0 text-muted">
                                                    <li>Au moins 8 caractères</li>
                                                    <li>Lettres et chiffres</li>
                                                    <li>Caractères spéciaux recommandés</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-warning d-flex align-items-center gap-2">
                                        <iconify-icon icon="lucide:lock" class="icon"></iconify-icon>
                                        Changer le mot de passe
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Informations du compte -->
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Photo de profil</h6>
                        </div>
                        <div class="card-body p-24 text-center">
                            <div class="mb-16">
                                @if($user->profile_image)
                                    <img src="{{ Storage::url($user->profile_image) }}" 
                                         alt="Photo de profil" 
                                         class="w-120-px h-120-px object-fit-cover rounded-circle border">
                                @else
                                    <div class="w-120-px h-120-px bg-{{ $user->role->value === 'super_admin' ? 'danger' : ($user->role->value === 'dg' ? 'warning' : ($user->role->value === 'informaticien' ? 'info' : 'success')) }} rounded-circle d-flex justify-content-center align-items-center mx-auto">
                                        <iconify-icon icon="ph:user-fill" class="text-white text-4xl"></iconify-icon>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Formulaire de changement d'image -->
                            <form action="{{ route('admin.profile.image') }}" method="POST" enctype="multipart/form-data" class="mb-3">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="profile_image" class="form-label">Changer la photo</label>
                                    <input type="file" name="profile_image" id="profile_image" 
                                           class="form-control form-control-sm @error('profile_image') is-invalid @enderror" 
                                           accept="image/*">
                                    @error('profile_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-danger btn-sm w-100 d-flex align-items-center justify-content-center gap-2">
                                    <iconify-icon icon="lucide:upload" class="icon"></iconify-icon>
                                    Mettre à jour
                                </button>
                            </form>

                            <h6 class="fw-semibold mb-2">{{ $user->name }}</h6>
                            <p class="text-sm text-secondary-light mb-2">{{ $user->email }}</p>
                            <span class="badge bg-{{ $user->role->value === 'super_admin' ? 'danger1' : ($user->role->value === 'dg' ? 'warning' : ($user->role->value === 'informaticien' ? 'info' : 'success')) }} mb-3">
                                {{ $user->role->getLabel() }}
                            </span>
                            <div class="text-start">
                                <p class="text-sm text-muted mb-1">
                                    <iconify-icon icon="lucide:calendar" class="me-1"></iconify-icon>
                                    Membre depuis {{ $user->created_at->format('d/m/Y') }}
                                </p>
                                @if($user->phone_num)
                                    <p class="text-sm text-muted mb-0">
                                        <iconify-icon icon="lucide:phone" class="me-1"></iconify-icon>
                                        {{ $user->phone_num }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Niveau d'accès -->
                    <div class="card mb-24">
                        <div class="card-header bg-base py-16 px-24">
                            <h6 class="fw-semibold mb-0">Niveau d'accès</h6>
                        </div>
                        <div class="card-body p-24">
                            <div class="text-center">
                                @if($user->hasFullAccess())
                                    <div class="w-60-px h-60-px bg-success rounded-circle d-flex justify-content-center align-items-center mx-auto mb-3">
                                        <iconify-icon icon="lucide:shield-check" class="text-white text-2xl"></iconify-icon>
                                    </div>
                                    <h6 class="text-success mb-2">Accès Complet</h6>
                                    <p class="text-sm text-muted mb-0">Vous avez accès à toutes les fonctionnalités du système</p>
                                @else
                                    <div class="w-60-px h-60-px bg-warning rounded-circle d-flex justify-content-center align-items-center mx-auto mb-3">
                                        <iconify-icon icon="lucide:shield" class="text-white text-2xl"></iconify-icon>
                                    </div>
                                    <h6 class="text-warning mb-2">Accès Limité</h6>
                                    <p class="text-sm text-muted mb-0">Votre accès est restreint selon votre rôle</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('includes.admin.footer')
    </main>
@endsection 