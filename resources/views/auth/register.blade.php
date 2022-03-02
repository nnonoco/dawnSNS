@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<div class="form">
  <h2 class="form-title">新規ユーザー登録</h2>
  <div>
    <div class="label">
      {{ Form::label('UserName') }}
    </div>
    <div>
      {{ Form::text('username',null,['class' => 'input']) }}
    </div>
    @if($errors->has('username'))
    {{$errors->first('username')}}
    @endif
    <div class="label">
      {{ Form::label('MailAddress') }}
    </div>
    <div>
      {{ Form::text('mail',null,['class' => 'input']) }}
    </div>
    @if($errors->has('mail'))
    {{$errors->first('mail')}}
    @endif
    <div class="label">
      {{ Form::label('Password') }}
    </div>
    <div>
      {{ Form::input('password','password',null,['class' => 'input']) }}
    </div>
    @if($errors->has('password'))
    {{$errors->first('password')}}
    @endif
    <div class="label">
      {{ Form::label('Password confirm') }}
    </div>
    <div>
      {{ Form::input('password','password-confirm',null,['class' => 'input']) }}
    </div>
    @if($errors->has('password-confirm'))
    {{$errors->first('password-confirm')}}
    @endif
    <div class="btn">
      {{ Form::submit('REGISTER',['class'=> 'submit']) }}
    </div>
    <p><a href="/login">ログイン画面へ戻る</a></p>

    {!! Form::close() !!}
  </div>
</div>
@endsection