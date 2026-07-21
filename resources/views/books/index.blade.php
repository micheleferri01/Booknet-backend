@extends('layouts.app')
@section('content')
<h1 class="py-3">Tutti i libri</h1>

<form class="mb-3 w-50">
    <input
        type="text"
        id="search"
        class="form-control"
        placeholder="Cerca un libro...">
</form>
<div id="books-list" class="row gap-3 mt-4">
    <div>
        <a href="{{route('books.create')}}" class="btn btn-success mb-3">Aggiungi</a>
    </div>
    @include('books.partials.books_list')
</div>
@endsection

@vite('resources/js/books/index.js')