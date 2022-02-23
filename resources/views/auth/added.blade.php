@extends('layouts.logout')

@section('content')

<div class="form">
  <div class="added">
    <p>{{ $list->username }}さん、</p>
    <p>ようこそ！DAWNSNSへ！</p>
  </div>
  <div class="added-text">
    <p>ユーザー登録が完了しました。</p>
    <p>さっそく、ログインをしてみましょう。</p>
  </div>
  <p class="login-submit"><a href="/login" class="login-btn">ログイン画面へ</a></p>
</div>

@endsection