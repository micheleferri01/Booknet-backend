@foreach($books as $book)
<div class="col-auto">
    @include('books.partials.book_card')
</div>
@endforeach