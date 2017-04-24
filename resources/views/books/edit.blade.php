@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">本を編集する</h1>

    <div class="books">
      {{ Form::model($book, array('action' => array('BooksController@update', $book->id), 'method' => 'PATCH')) }}
        @include('books.form', ['submit_message' => '編集する', 'book' => $book])
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
