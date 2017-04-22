@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">ユーザー情報編集</h1>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="profile">
      {{ Form::model($user, array('action' => array('UsersController@update', $user->id), 'method' => 'PATCH')) }}
        <ul class="profile__items">
          <li>
            <div class="col-xs-3 profile__items--item">
              {{ Form::label('name', '名前') }}
            </div>
            <div class="col-xs-9 ">
              {{ Form::text('name') }}
            </div>
          </li>
          <li>
            <div class="col-xs-3 profile__items--item">
              {{ Form::label('email', 'メールアドレス') }}
            </div>
            <div  class="col-xs-9">
              {{ Form::text('email') }}
            </div>
          </li>
          <div class="row">
            <div>
              {{ Form::submit('更新', ['class' => 'btn btn-primary']) }}
            </div>
          </div>
        </ul>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@endsection
