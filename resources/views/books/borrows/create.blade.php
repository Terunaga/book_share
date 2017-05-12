@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">本の貸出を依頼する</h1>

    <div class="borrows">
      {{ Form::model($loan, array('action' => array('Books\BorrowsController@store', $book->id))) }}
        @include('books.borrows.form', ['submit_message' => '貸出を依頼する', 'loan' => $loan])
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
