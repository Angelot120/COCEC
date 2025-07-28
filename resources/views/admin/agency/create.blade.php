@extends('layout.admin')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>
@endsection

@section('content')
@include('includes.admin.sidebar')

<main class="dashboard-main">
    @include('includes.admin.appbar')
    @include('includes.main.loading')

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
            <h4 class="fw-semibold mb-0">Ajouter une agence</h4>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Ajouter une agence</li>
            </ul>
        </div>

        <form action="{{ route('agency.store') }}" method="POST" class="row g-4">
            @csrf
            <div class="col-12">
                <label for="name" class="form-label">Nom de l'agence</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="number" step="any" name="latitude" id="latitude" class="form-control @error('latitude') is-invalid @enderror" value="{{ old('latitude', 8.6195) }}" required>
                @error('latitude')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="number" step="any" name="longitude" id="longitude" class="form-control @error('longitude') is-invalid @enderror" value="{{ old('longitude', 0.8248) }}" required>
                @error('longitude')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="address" class="form-label">Adresse</label>
                <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" required>{{ old('address') }}</textarea>
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <label for="status" class="form-label">Statut</label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="" {{ old('status') == null ? 'selected' : '' }}>Non défini</option>
                    <option value="Open" {{ old('status') == 'Open' ? 'selected' : '' }}>Ouverte</option>
                    <option value="Close" {{ old('status') == 'Close' ? 'selected' : '' }}>Fermée</option>
                </select>
                @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12">
                <div id="map"></div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-danger">Enregistrer</button>
            </div>
        </form>
    </div>

    @include('includes.admin.footer')
</main>
@endsection

@section('js')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Coordonnées par défaut du Togo (Lomé)
        const defaultLat = 6.1375;
        const defaultLng = 1.2123;
        
        // Récupérer les valeurs de latitude et longitude avec les valeurs par défaut du Togo
        const latitude = parseFloat('<?php echo e(old('latitude', 6.1375)); ?>') || defaultLat;
        const longitude = parseFloat('<?php echo e(old('longitude', 1.2123)); ?>') || defaultLng;
        const hasValidCoords = !isNaN(latitude) && !isNaN(longitude) && latitude >= -90 && latitude <= 90 && longitude >= -180 && longitude <= 180;

        // Initialisation de la carte centrée sur le Togo
        const map = L.map('map').setView([latitude, longitude], hasValidCoords ? 10 : 7);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Initialisation du marqueur
        const marker = L.marker([latitude, longitude]).addTo(map);

        // Mise à jour des champs lors d'un clic sur la carte
        map.on('click', function(e) {
            marker.setLatLng(e.latlng);
            const latitudeInput = document.getElementById('latitude');
            const longitudeInput = document.getElementById('longitude');
            if (latitudeInput && longitudeInput) {
                latitudeInput.value = e.latlng.lat.toFixed(6);
                longitudeInput.value = e.latlng.lng.toFixed(6);
                map.setView(e.latlng, 13);
            }
        });

        // Mise à jour du marqueur lors de la modification manuelle des champs
        function updateMarker() {
            const latitudeInput = document.getElementById('latitude');
            const longitudeInput = document.getElementById('longitude');
            if (latitudeInput && longitudeInput) {
                const lat = parseFloat(latitudeInput.value);
                const lng = parseFloat(longitudeInput.value);
                if (!isNaN(lat) && !isNaN(lng) && lat >= -90 && lat <= 90 && lng >= -180 && lng <= 180) {
                    marker.setLatLng([lat, lng]);
                    map.setView([lat, lng], 13);
                }
            }
        }

        const latitudeInput = document.getElementById('latitude');
        const longitudeInput = document.getElementById('longitude');
        if (latitudeInput && longitudeInput) {
            latitudeInput.addEventListener('input', updateMarker);
            longitudeInput.addEventListener('input', updateMarker);
        }
    });
</script>
@endsection