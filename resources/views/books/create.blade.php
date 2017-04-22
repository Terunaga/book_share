@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">本を登録する</h1>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="books">
      {{ Form::model($book, array('action' => array('BooksController@store'))) }}
        <ul class="profile__items">
          <li>
            <div class="col-xs-3 profile__items--item">
              {{ Form::label('name', '名前') }}
            </div>
            <div class="col-xs-9 ">
              {{ Form::text('name', '', ['class' => 'books__name', 'placeholder' => '本の名前を記入してください（必須）', 'required' => 'true']) }}
            </div>
          </li>
          <li>
            <div class="col-xs-3 profile__items--item">
              {{ Form::label('rate', '評価') }}
            </div>
            <div  class="col-xs-9">
              {{ Form::radio('rate', '5') }}&emsp;5. &ensp;非常に良い<br/>
              {{ Form::radio('rate', '4') }}&emsp;4. &ensp;良い<br/>
              {{ Form::radio('rate', '3', ['required' => 'true']) }}&emsp;3. &ensp;普通<br/>
              {{ Form::radio('rate', '2') }}&emsp;2. &ensp;悪い<br/>
              {{ Form::radio('rate', '1') }}&emsp;1. &ensp;非常に悪い
            </div>
          </li>
          <li>
            <div class="col-xs-3 profile__items--item">
              {{ Form::label('image', '表紙イメージ') }}
            </div>
            <div  class="col-xs-9">
              {{ Form::text('image', '', ['class' => 'books__image', 'placeholder' => '本の表紙のイメージのURLを記入してください（任意）']) }}
            </div>
          </li>
          <li>
            <div class="col-xs-3 profile__items--item">
              {{ Form::label('comment', 'コメント') }}
            </div>
            <div  class="col-xs-9">
              {{ Form::textarea('comment', '', ['class' => 'books__comment', 'placeholder' => '本のコメントを記入してください（任意）']) }}
            </div>
          </li>
          <div class="row">
            <div>
              {{ Form::submit('登録', ['class' => 'btn btn-primary']) }}
            </div>
          </div>
        </ul>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
