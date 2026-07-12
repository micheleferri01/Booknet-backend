@extends('layouts.app')
@section('content')
<h1 class="py-3">I generi</h1>
<form class="mb-3 w-50">
    <input
        type="text"
        id="search"
        class="form-control"
        placeholder="Cerca un genere...">
</form>
<div id="genres-list">
    @include('genres.partials.genres-list')
</div>
@endsection

@vite('resources/js/genres/index.js')