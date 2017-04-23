<ul class="profile__items">
  <li>
    <div class="col-xs-3 profile__items--item">
      {{ Form::label('name', 'タイトル') }}
    </div>
    <div class="col-xs-9 ">
      {{ Form::text('name', $book->name, ['class' => 'books__title', 'placeholder' => '本のタイトルを記入してください（必須）', 'required' => 'true']) }}
    </div>
  </li>
  <li>
    <div class="col-xs-3 profile__items--item">
      {{ Form::label('authors', '著者名') }}
    </div>
    <div class="col-xs-9">
      {{ Form::select('authors', author_names($authors), null, ['class' => 'books__author_names']) }}
    </div>
  </li>
  <li>
    <div class="col-xs-3 profile__items--item">
    </div>
    <div class="col-xs-4">
      {{ Form::text('last_name', $book->author_last_name(), ['class' => 'books__author_lastname', 'placeholder' => '著者の姓を記入してください（必須）', 'required' => 'true']) }}
    </div>
    <div class="col-xs-1">
    </div>
    <div class="col-xs-4">
      {{ Form::text('first_name', $book->author_first_name(), ['class' => 'books__author_firstname', 'placeholder' => '著者の名を記入してください（必須）', 'required' => 'true']) }}
    </div>
  </li>
  <li>
    <div class="col-xs-3 profile__items--item">
      {{ Form::label('rate', '評価') }}
    </div>
    <div  class="col-xs-9">
      {{ Form::radio('rate', '10') }}&emsp;5. &ensp;非常に良い<br/>
      {{ Form::radio('rate', '8') }}&emsp;4. &ensp;良い<br/>
      {{ Form::radio('rate', '6', ['required' => 'true']) }}&emsp;3. &ensp;普通<br/>
      {{ Form::radio('rate', '4') }}&emsp;2. &ensp;悪い<br/>
      {{ Form::radio('rate', '2') }}&emsp;1. &ensp;非常に悪い
    </div>
  </li>
  <li>
    <div class="col-xs-3 profile__items--item">
      {{ Form::label('image', '表紙イメージ') }}
    </div>
    <div  class="col-xs-9">
      {{ Form::text('image', $book->image, ['class' => 'books__image', 'placeholder' => '本の表紙のイメージのURLを記入してください（任意）']) }}
    </div>
  </li>
  <li>
    <div class="col-xs-3 profile__items--item">
      {{ Form::label('comment', 'コメント') }}
    </div>
    <div  class="col-xs-9">
      {{ Form::textarea('comment', $book->comment, ['class' => 'books__comment', 'placeholder' => '本のコメントを記入してください（任意）']) }}
    </div>
  </li>
  <div class="row">
    <div>
      {{ Form::submit($submit_message, ['class' => 'btn btn-primary']) }}
    </div>
  </div>
</ul>
