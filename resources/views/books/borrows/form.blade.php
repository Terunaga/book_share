<ul class="profile__items">
  <li>
    <div class="col-xs-3 profile__items--item">図書名</div>
    <div class="col-xs-9 ">{{ $book->name }}</div>
  </li>
  <li>
    <div class="col-xs-3 profile__items--item">貸出状態</div>
    <div class="col-xs-9 ">{{ $book->show_status() }}</div>
  </li>
  <li>
  <li>
    <div class="col-xs-3 profile__items--item">貸出開始日</div>
    <div  class="col-xs-9">
      {{ Form::date('start_date', $loan->start_date, ['class' => 'start_date']) }}
    </div>
  </li>
  <li>
    <div class="col-xs-3 profile__items--item">貸出終了日</div>
    <div  class="col-xs-9">
      {{ Form::date('finish_date', $loan->finish_date, ['class' => 'finish_date', 'readonly']) }}
    </div>
  </li>
  <li>
    <div class="col-xs-3 profile__items--item">
      {{ Form::label('comment', 'メッセージ') }}
    </div>
    <div  class="col-xs-9">
      {{ Form::textarea('comment', $loan->comment, ['class' => 'books__comment', 'placeholder' => '本のコメントを記入してください（任意）']) }}
    </div>
  </li>
  <div class="row">
    <div>
      {{ Form::submit($submit_message, ['class' => 'btn btn-primary']) }}
    </div>
  </div>
</ul>
