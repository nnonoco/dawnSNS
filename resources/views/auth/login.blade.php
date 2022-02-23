@extends('layouts.logout')

@section('content')

{!! Form::open() !!}
<div class="form">
  <p class="form-title">DAWNSNSへようこそ</p>
  <div>
    <div class="label">
      {{ Form::label('MAilAddress') }}
    </div>
    <div>
      {{ Form::text('mail',null,['class' => 'input']) }}
    </div>
    <div class="label">
      {{ Form::label('password') }}
    </div>
    <div>
      {{ Form::password('password',['class' => 'input']) }}
    </div>
    <div class="btn">
      {{ Form::submit('ログイン',['class'=> 'submit']) }}
    </div>
  </div>
  <p><a href="/register">新規ユーザーの方はこちら</a></p>
</div>
{!! Form::close() !!}

@endsection