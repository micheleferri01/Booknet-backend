<div class="card text-bg-dark" style="width: 18rem;">
    <img src="{{asset('storage/'. $book->cover)}}" class="card-img-top" alt="{{$book->title}}">
    <div class="card-body">
        <h5 class="card-title">{{$book->title}}</h5>
        <p class="card-text">{{$book->price}}</p>
        <div>
            <a href="{{route('books.show', $book)}}" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
            <a href="{{route('books.edit', $book)}}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{$book->id}}">
                <i class="bi bi-trash"></i>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina libro</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Sei sicuro di voler eliminare "{{$book->title}}" dai libri?
                        </div>
                        <div class="d-flex justify-content-center gap-3 pb-3">
                            <div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                            </div>
                            <form action="{{route('books.destroy', $book)}}" method="post">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-danger">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>