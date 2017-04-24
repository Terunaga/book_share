@extends('layouts.master')

@section('content')

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">図書ページ</h1>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="sub_header">
      <h2 class="col-xs-10 sub_header--item"><span>基本情報</span></h2>
      @if (Auth::user() == $book->user)
        <p class="col-xs-2 sub_header--button">
          <a href="/books/{{ $book->id }}/edit" class="btn btn-primary">編集</a>
        </p>
      @endif
    </div>

    <div class="profile">
      <ul class="profile__items">
        <li>
          <div class="col-xs-3 profile__items--item">図書名</div>
          <div class="col-xs-9 ">{{ $book->name }}</div>
        </li>
        <li>
          <div class="col-xs-3 profile__items--item">著者</div>
          <div class="col-xs-9">{{ $book->author->full_name() }}</div>
        </li>
        <li>
          <div class="col-xs-3 profile__items--item">図書のオーナー</div>
          <div class="col-xs-9">
            <a href="/users/{{ $book->user->id }}">{{ $book->user->name }}</a>
          </div>
        </li>
        <li>
          <div class="col-xs-3 profile__items--item">図書オーナーのコメント</div>
          <div class="col-xs-9">{{ $book->comment }}</div>
        </li>
        <li>
          <div class="col-xs-3 profile__items--item">図書オーナーのオススメ度</div>
          <div class="col-xs-9">
            <span class="rating-star">
              <i class="star-actived rate-{{ $book->rate }}0"></i>
            </span>
          </div>
        </li>
        <li>
          <img class="img-responsive" src="{{ $book->image }}" alt="{{ $book->name }}">
        </li>
      </ul>
    </div>
  </div>
</div>

<hr>

@endsection
