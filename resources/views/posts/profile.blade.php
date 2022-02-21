@extends('layouts.login')

@section('content')
<div class="">
  <!--アイコン-->
  <div class="">
    <img src="{{asset('images/'.$userimage)}}">
  </div>
  <!--情報-->
  <div class="">
    <form action="/login-profile/update" method="POST" class="">
      @csrf
      <input type="hidden" name="id" value="{{$id}}">
      <label>UserName</label>
      <input type="text" name="username" class="" value="{{$username}}">
      <label>MailAddress</label>
      <input type="text" name="userAddress" class="" value="{{$user_address}}">
      <label>Password</label>
      <input type="text" name="password" class="" value="{{$password}}">
      <label>new Password</label>
      <input type="text" name="newPassword" class="" value="">
      <label>Bio</label>
      <input type="text" name="bio" class="" value="{{$bio}}">
      <label>Icon Image</label>
      <input type="text" name="image" class="" value="">
      <!--ボタン-->
      <input type="submit" name="submit" class="" value="更新">
    </form>
  </div>
</div>
@endsection