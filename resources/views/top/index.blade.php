@extends('layouts.master')

@section('content')

<div class="navbar-right top_register">
  <a class="btn btn-primary btn-lg top_register--button" href="/books/create" role="button">本を登録する</a>
</div>
<div class="row">
  <div class="col-lg-12">
    <ul class="nav nav-pills">
      <li id="lendable" role="presentation" class="active"><a>貸出可能リスト</a></li>
      <li id="borrowing" role="presentation"><a>貸出中リスト</a></li>
      <li id="popular" role="presentation"><a>人気リスト</a></li>
      <li id="new" role="presentation"><a>新しいリスト</a></li>
    </ul>
  </div>
    <div class="book_lists">
      <div class="lendable category">
        @foreach($lendable_books as $book)
          @include('top.book', ['book' => $book])
        @endforeach
      </div>
      <div class="borrowing category">
        @foreach($borrowing_books as $book)
          @include('top.book', ['book' => $book])
        @endforeach
      </div>
      <div class="popular category">
        @foreach($popular_books as $book)
          @include('top.book', ['book' => $book])
        @endforeach
      </div>
      <div class="new category">
        @foreach($new_books as $book)
          @include('top.book', ['book' => $book])
        @endforeach
      </div>
    </div>
</div>

<hr>

<div class="row text-center">
  <div class="col-lg-12">
  </div>
</div>

<hr>
@endsection
