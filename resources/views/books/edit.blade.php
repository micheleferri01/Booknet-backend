@extends('layouts.app')
@section('content')
<div class="container pt-4 d-flex justify-content-center align-items-center">
    <div class="row justify-content-center w-100">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifica libro') }}</div>

                <div class="card-body">
                    <form action="{{route('books.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-4 row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Titolo</label>
                            <div class="col-md-6">
                                <input type="text" id='title' name='title' class="form-control @error('title') is-invalid @enderror" required value="{{ old('title', $book->title) }}" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="Publication_year" class="col-md-4 col-form-label text-md-right">Anno di pubblicazione</label>
                            <div class="col-md-6">
                                <input type="number" id='Publication_year' name='Publication_year' class="form-control @error('Publication_year') is-invalid @enderror" required value="{{ old('Publication_year',$book->Publication_year) }}">

                                @error('Publication_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Prezzo</label>
                            <div class="col-md-6">
                                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" required value="{{old('price', $book->price)}}" step="0.01" min='0.01'>
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="plot" class="col-md-4 col-form-label text-md-right">Trama</label>
                            <div class="col-md-6">
                                <textarea name="plot" id="plot" class="form-control @error('plot') is-invalid @enderror">{{old('plot', $book->plot)}}</textarea>
                                @error('plot')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="author_id" class="col-md-4 col-form-label text-md-right">Autore</label>
                            <div class="col-md-6">
                                <select id="author_id" name="author_id" class="form-control" required>
                                    <option value="">Seleziona un autore</option>

                                    @foreach($authors as $author)
                                    <option value="{{ $author->id }}" {{ old('author_id', $book->author_id) == $author->id ? 'selected' : '' }}>
                                        {{ $author->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="editor_id" class="col-md-4 col-form-label text-md-right">Casa editrice</label>
                            <div class="col-md-6">
                                <select id="editor_id" name="editor_id" class="form-control" required>
                                    <option value="">Seleziona una casa editrice</option>

                                    @foreach($editors as $editor)
                                    <option value="{{ $editor->id }}" {{ old('editor_id', $book->editor_id) == $editor->id ? 'selected' : '' }}>
                                        {{ $editor->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="genres" class="col-md-4 col-form-label text-md-right">Generi</label>
                            <div class="col-md-6">
                                @php
                                $selectedGenres = old('genres', $book->genres->pluck('id')->toArray());
                                @endphp
                                <select id="genres" name="genres[]" class="form-control">
                                    <option value="">Seleziona generi</option>

                                    @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}" {{ in_array($genre->id, $selectedGenres) ? 'selected' : '' }}>
                                        {{ $genre->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="cover" class="col-md-4 col-form-label text-md-right">Cover del libro</label>
                            <div class="col-md-6">
                                <input type="file" name="cover" id="cover" class="form-control @error('cover') is-invalid @enderror" required>
                                @error('cover')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-4 row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Salva') }}
                                </button>

                                <a href="{{route('books.index')}}" class="btn btn-secondary">{{ __('Annulla')}}</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@vite('resources/js/books/create.js')