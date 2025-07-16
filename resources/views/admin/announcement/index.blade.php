@extends('layout.admin')

@section('css')
<link href="{{ URL::asset('assets/summernote/summernote.min.css') }}" rel="stylesheet">
@endsection

@section('content')
@include('includes.admin.sidebar')

<main class="dashboard-main">
    @include('includes.admin.appbar')

    <div class="dashboard-main-body">
        <h1>Add announcements?</h1>
    </div>

    @include('includes.admin.footer')
</main>
@endsection

@section('js')

@endsection