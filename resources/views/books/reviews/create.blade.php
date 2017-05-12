@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">本のレビューを書く</h1>

    <div class="sub_header">
      <h2 class="col-xs-10 sub_header--item"><span>基本情報</span></h2>
    </div>

    <div class="profile">
      <ul class="profile__items">
        <div class="profile__items__lists">
          <li>
            <div class="col-xs-5 profile__items--item">図書名</div>
            <div class="col-xs-7 ">{{ $book->name }}</div>
          </li>
          <li>
            <div class="col-xs-5 profile__items--item">著者</div>
            <div class="col-xs-7">{{ $book->author->full_name() }}</div>
          </li>
        </div>
        <li class="profile__items--image">
          <img class="img-responsive" src="{{ $book->image }}" alt="{{ $book->name }}">
        </li>
      </ul>
    </div>
  </div>
</div>

<hr>

<div class="row">
  <div class="col-lg-12">
    <div class="books">
      {{ Form::model($review, array('action' => array('Books\ReviewsController@store', $book->id))) }}
        <ul class="profile__items">
          <li>
            <div class="col-xs-3 profile__items--item">
              {{ Form::label('rate', '評価') }}
            </div>
            <div  class="col-xs-9">
              {{ Form::select('rate', book_rate(), $review->rate, ['class' => 'books__rate', 'required' => 'true']) }}
            </div>
          </li>
          <li>
            <div class="col-xs-3 profile__items--item">
              {{ Form::label('comment', 'コメント') }}
            </div>
            <div  class="col-xs-9">
              {{ Form::textarea('comment', $review->comment, ['class' => 'books__comment', 'placeholder' => '本のコメントを記入してください']) }}
            </div>
          </li>
          <div class="row">
            <div>
              {{ Form::submit('送信する', ['class' => 'btn btn-primary']) }}
            </div>
          </div>
        </ul>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection
