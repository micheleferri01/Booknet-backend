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
<div >
    <div>
        <a href="{{route('books.create')}}" class="btn btn-success mb-3">Aggiungi</a>
    </div>
    <div id="books-list" class="row g-3 pb-4">
        @include('books.partials.books_list')
    </div>
</div>
@endsection

@vite('resources/js/books/index.js')