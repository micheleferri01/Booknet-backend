<a href="{{route('authors.create')}}" class="btn btn-success mb-3">Aggiungi</a>
<ul class="list-group w-50">
    @foreach($authors as $author)
    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap flex-column flex-md-row">
        <span class="fw-semibold">
            {{$author->name}}
        </span>
        <div class="d-flex gap-2 mt-2 mt-md-0">
            <a href="{{route('authors.show', $author)}}" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
            <a href="{{route('authors.edit', $author)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{$author->id}}">
                <i class="bi bi-trash"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="{{$author->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina autore</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Sei sicuro di voler eliminare "{{$author->name}}" dagli autori?
                        </div>
                        <div class="d-flex justify-content-center gap-3 pb-3">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                            <form action="{{route('authors.destroy', $author)}}" method="post">
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