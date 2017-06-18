@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">貸出リクエスト</h1>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <ul class="books_box">
      @foreach($books as $book)
        <li class="books_box--list">
          <img class="books_box--list__image" src="{{ $book->image }}" src="hogehoge">
          <div class="books_box--list__info">
            <div>
              <span class="book_name_key">図書名</span>
              <span class="book_name_value">{{ $book->name }}</span>
            </div>
            <div>
              <span class="borrower_key">貸出依頼者</span>
              <span class="borrower_value">{{ $book->applicable_client()->name }}</span>
            </div>
            <div>
              <span class="duration_key">貸出期間</span>
              <span class="duration_value">{{ $book->loan_period() }}</span>
            </div>
            <div class='message'>
              <div class="borrower_message_key">メッセージ</div>
              <div class="borrower_message_value">{{ $book->applicable_loan()->comment }}</div>
            </div>
          </div>
          <div class="books_box--list__buttons">
            {{ Form::open(['route' => ['users.lends.update', Auth::user()->id, $book->applicable_loan()->id], 'method' => 'PATCH']) }}
              {{Form::hidden('status', 1)}}
              {{Form::submit('許可', ['class' => 'allow_button btn btn-primary'])}}
            {{ Form::close() }}
            {{ Form::open(['route' => ['users.lends.update', Auth::user()->id, $book->applicable_loan()->id], 'method' => 'PATCH']) }}
              {{Form::hidden('status', 5)}}
              {{Form::submit('却下', ['class' => 'reject_button btn btn-default'])}}
            {{ Form::close() }}
          </div>
        </li>
      @endforeach
    </ul>
  </div>
</div>

@endsection
