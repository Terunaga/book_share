<div class="col-xs-3 portfolio-item">
    <a href="#">
        <img class="img-responsive" src="http://placehold.it/700x400" alt="">
    </a>
    <h3>
        <a href="#">{{ $book->name }}</a>
    </h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
    <span class="rating-star">
        <i class="star-actived rate-90"></i>
    </span>
    <p><a href="/books/{{ $book->id }}/edit" class="btn btn-primary">Button</a></p>
</div>