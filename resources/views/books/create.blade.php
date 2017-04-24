@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">本を登録する</h1>

    <div class="books">
      {{ Form::model($book, array('action' => array('BooksController@store'))) }}
        @include('books.form', ['submit_message' => '登録する', 'book' => $book])
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
