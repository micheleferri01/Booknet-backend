@extends('layouts.app')
@section('content')
<h1 class="py-3">Le case editrici</h1>
<form class="mb-3 w-50">
    <input
        type="text"
        id="search"
        class="form-control"
        placeholder="Cerca una casa editrice...">
</form>
<div id="editors-list">
    @include('editors.partials.editors-list')
</div>
@endsection

@vite('resources/js/editors/index.js')