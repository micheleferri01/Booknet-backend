@extends('layouts.app')
@section('content')
<h1 class="py-3">Libri pubblicati dalla casa editrice {{$editor->name}}</h1>
<div id="books-list" class="row g-3 pb-4">
    @include('books.partials.books_list')
</div>
@endsection