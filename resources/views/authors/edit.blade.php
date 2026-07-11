@extends('layouts.app')
@section('content')
<div class="container pt-4 d-flex justify-content-center align-items-center">
    <div class="row justify-content-center w-100">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifica autore') }}</div>

                <div class="card-body">
                    <form action="{{route('authors.update', $author)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nome autore</label>
                            <div class="col-md-6">
                                <input type="text" id='name' name='name' class="form-control @error('name') is-invalid @enderror" required value="{{ old('name',$author->name) }}" autofocus>

                                @error('name')
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

                                <a href="{{route('authors.show', $author)}}" class="btn btn-secondary">{{ __('Annulla')}}</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection