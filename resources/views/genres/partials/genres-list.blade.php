<a href="{{route('genres.create')}}" class="btn btn-success mb-3">Aggiungi</a>
<ul class="list-group w-50">
    @foreach($genres as $genre)
    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap flex-column flex-md-row">
        <span class="fw-semibold">
            {{$genre->name}}
        </span>
        <div class="d-flex gap-2 mt-2 mt-md-0">
            <a href="{{route('genres.show', $genre)}}" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
            <a href="{{route('genres.edit', $genre)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{$genre->id}}">
                <i class="bi bi-trash"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="{{$genre->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina Genere</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Sei sicuro di voler eliminare il genere "{{$genre->name}}"?
                        </div>
                        <div class="d-flex justify-content-center gap-3 pb-3">
                            <div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                            </div>
                            <form action="{{route('genres.destroy', $genre)}}" method="post">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </li>
    @endforeach
</ul>