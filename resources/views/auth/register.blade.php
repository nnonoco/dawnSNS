@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('UserName') }}
{{ Form::text('username',null,['required','class' => 'input']) }}

{{ Form::label('MailAddress') }}
{{ Form::text('mail',null,['required','class' => 'input']) }}

{{ Form::label('Password') }}
{{ Form::input('password','password',null,['required','class' => 'input']) }}

{{ Form::label('Password confirm') }}
{{ Form::input('password','password-confirm',null,['required','class' => 'input']) }}

{{ Form::submit('REGISTER') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection