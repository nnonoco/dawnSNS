@extends('layouts.logout')

@section('content')
<p class="title">Social Network Service</p>
{!! Form::open() !!}
<div class="form">
  <p class="form-title">DAWNSNSへようこそ</p>
  <div>
    <div class="label">
      {{ Form::label('MAilAddress') }}
    </div>
    <div>
      {{ Form::text('mail',null,['class' => 'input','required']) }}
    </div>
    <div class="label">
      {{ Form::label('password') }}
    </div>
    <div>
      {{ Form::password('password',['class' => 'input','required']) }}
    </div>
    <div class="btn">
      {{ Form::submit('LOGIN',['class'=> 'submit']) }}
    </div>
  </div>
  <p><a href="/register">新規ユーザーの方はこちら</a></p>
</div>
{!! Form::close() !!}

@endsection