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
    <div class="sub_header">
      <h2 class="col-xs-10 sub_header--item"><span>マイブックリスト</span></h2>
      @foreach($books as $book)
        @include('top.book', ['book' => $book])
      @endforeach
    </div>
  </div>
</div>
@endsection
