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
      <p class="col-xs-2 sub_header--button">
        @if(Auth::user() != $book->user)
          <a href="/books/{{ $book->id }}/borrows/create" class="btn btn-primary">借りる</a>
        @endif
        @if (Auth::user() == $book->user)
          <a href="/books/{{ $book->id }}/edit" class="btn btn-primary">編集</a>
        @endif
      </p>
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
          <li>
            <div class="col-xs-5 profile__items--item">図書のオーナー</div>
            <div class="col-xs-7">
              <a href="/users/{{ $book->user->id }}">{{ $book->user->name }}</a>
            </div>
          </li>
          <li>
            <div class="col-xs-5 profile__items--item">貸出状態</div>
            <div class="col-xs-7 ">{{ $book->show_status() }}</div>
          </li>
          <li>
            <div class="col-xs-5 profile__items--item">図書オーナーのコメント</div>
            <div class="col-xs-7">{{ $review->comment }}</div>
          </li>
          <li>
            <div class="col-xs-5 profile__items--item">図書オーナーのオススメ度</div>
            <div class="col-xs-7">
              <span class="rating-star">
                <i class="star-actived rate-{{ $review->rate }}0"></i>
              </span>
            </div>
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

@endsection
