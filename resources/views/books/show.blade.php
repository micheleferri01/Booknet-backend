@extends('layouts.app')
@section('content')
<div class="container d-flex gap-5 flex-column flex-md-row pt-4">
    <img src="{{asset('storage/'. $book->cover)}}" alt="{{$book->title}}" class="book-img">
    <div>
        <h1>{{$book->title}}</h1>
        <ul class="list-unstyled">
            <li><span class="fw-semibold">Autore:</span> {{$book->author->name}}</li>
            <li><span class="fw-semibold">Editore:</span> {{$book->editor->name}}</li>
            <li><span class="fw-semibold">Generi:</span>
                @foreach($book->genres as $genre)
                <a href="{{route('genres.show', $genre)}}" class="badge text-bg-secondary text-decoration-none">{{$genre->name}}</a>
                @endforeach
            </li>
            <li><span class="fw-semibold">Prezzo:</span> <span class="text-success fs-4 fw-bold">{{$book->price}} &euro;</span></li>
            <li><span class="fw-semibold">Descrizione:</span>
                <p>{{$book->plot}}</p>
            </li>
        </ul>
    </div>
</div>
@endsection