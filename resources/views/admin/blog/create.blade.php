@extends('layout.admin')

@section('css')
<link href="{{ URL::asset('assets/summernote/summernote.min.css') }}" rel="stylesheet">
@endsection

@section('content')
@include('includes.admin.sidebar')

<main class="dashboard-main">
    @include('includes.admin.appbar')

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h4 class="fw-semibold mb-0">Ajouter un blog</h4>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Ajouter un blog</li>
            </ul>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data" class="row g-4">
            @csrf

            <div class="col-12">
                <label for="title" class="form-label">Titre</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="is_published" class="form-label">Statut</label>
                <select name="is_published" id="is_published" class="form-select" required>
                    <option value="1">Publié</option>
                    <option value="0">Non publié</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
            </div>

            <div class="col-12">
                <label for="short_description" class="form-label">Brève description</label>
                <textarea name="short_description" id="short_description" class="form-control" rows="3" required></textarea>
            </div>

            <div class="col-12">
                <label for="long_description" class="form-label">Longue description</label>
                <textarea name="long_description" id="summernote" class="form-control" required></textarea>
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
    $(document).ready(function() {
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

