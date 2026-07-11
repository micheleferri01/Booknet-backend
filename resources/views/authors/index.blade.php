@extends('layouts.app')
@section('content')
<h1 class="py-3">Gli autori</h1>
<form class="mb-3 w-50">
    <input
        type="text"
        id="search"
        class="form-control"
        placeholder="Cerca un autore...">
</form>
<div id="authors-list">
    @include('authors.partials.authors-list')
</div>
@endsection

@vite('resources/js/authors/index.js')