<div class="col-xs-6 col-md-3 portfolio-item">
    <a href="/books/{{ $book->id }}">
        <img class="img-responsive" src="{{ $book->image }}" alt="{{ $book->name }}">
        <h3>
            {{ $book->name }}
        </h3>
    </a>
    <p class="author">著者：{{ $book->author->full_name() }}</p>
    <span class="rating-star">
        <i class="star-actived rate-90"></i>
    </span>
    <p>
      @if(Auth::user() != $book->user)
        <a href="/books/{{ $book->id }}/borrows/create" class="btn btn-primary">借りる</a>
      @endif
      @if(Auth::check() && Auth::user() == $book->user)
        <a href="/books/{{ $book->id }}/edit" class="btn btn-default">編集</a>
      @endif
    </p>
</div>
