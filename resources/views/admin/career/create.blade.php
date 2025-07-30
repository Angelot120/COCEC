@extends('layout.admin')

@section('css')
    <link href="{{ URL::asset('assets/summernote/summernote.min.css') }}" rel="stylesheet">
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
                <h4 class="fw-semibold mb-0">Ajouter une offre d'emploi</h4>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li>-</li>
                    <li class="fw-medium">Ajouter une offre d'emploi</li>
                </ul>
            </div>

            <form action="{{ route('career.store') }}" method="POST" enctype="multipart/form-data" class="row g-4">
                @csrf
                <div class="col-12">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="type" class="form-label">Type</label>
                    <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
                        <option value="stage" {{ old('type') == 'stage' ? 'selected' : '' }}>Stage</option>
                        <option value="emploi" {{ old('type') == 'emploi' ? 'selected' : '' }}>Emploi</option>
                    </select>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="status" class="form-label">Statut</label>
                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror"
                        required>
                        <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Ouvert</option>
                        <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Fermé</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label for="bref_description" class="form-label">Bref description</label>
                    <textarea name="bref_description" id="bref_description"
                        class="form-control @error('bref_description') is-invalid @enderror" rows="4" required>{{ old('bref_description') }}</textarea>
                    @error('bref_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="summernote" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
    <script src="{{ URL::asset('assets/summernote/summernote.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialisation de Summernote
            $('#summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection
