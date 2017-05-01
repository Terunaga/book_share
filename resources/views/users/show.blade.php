@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">ユーザーページ</h1>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="sub_header">
      <h2 class="col-xs-10 sub_header--item"><span>基本情報</span></h2>
      @if (Auth::user()->id == $user->id)
        <p class="col-xs-2 sub_header--button">
          <a href="/users/{{ $user->id }}/edit" class="btn btn-primary">編集</a>
        </p>
      @endif
    </div>

    <div class="profile">
      <ul class="profile__items">
        <li>
          <div class="col-xs-3 profile__items--item">名前</div>
          <div class="col-xs-9 ">{{ $user->name }}</div>
        </li>
        <li>
          <div class="col-xs-3 profile__items--item">メールアドレス</div>
          <div class="col-xs-9">{{ $user->email }}</div>
        </li>
      </ul>
    </div>
  </div>
</div>

<hr>

<div class="row">
  <div class="col-lg-12">
    <ul class="nav nav-pills">
      <li id="myBooks" role="presentation" class="active"><a>マイブック</a></li>
      <li id="applying" role="presentation"><a>貸出申請中</a></li>
      <li id="toBorrow" role="presentation"><a>借り出し待ち</a></li>
      <li id="borrowing" role="presentation"><a>借り出し中</a></li>
      <li id="borrowed" role="presentation"><a>読み終わった本</a></li>
    </ul>
    <div class="sub_header book_lists">
      <div class="myBooks category" style="height: 600px">
        @foreach($my_books as $book)
          @include('top.book', ['book' => $book])
        @endforeach
      </div>
      <div class="applying category">
        @foreach($applying_books as $book)
          @include('top.book', ['book' => $book])
        @endforeach
      </div>
      <div class="toBorrow category">
        @foreach($to_borrow_books as $book)
          @include('top.book', ['book' => $book])
        @endforeach
      </div>
      <div class="borrowing category">
        @foreach($borrowing_books as $book)
          @include('top.book', ['book' => $book])
        @endforeach
      </div>
      <div class="borrowed category">
        @foreach($borrowed_books as $book)
          @include('top.book', ['book' => $book])
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
