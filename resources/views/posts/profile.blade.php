@extends('layouts.login')

@section('content')
<div class="">
  <!--アイコン-->
  <div class="">
    <img src="{{asset('images/'.$userimage)}}">
  </div>
  <!--情報-->
  <div class="">
    <form action="/login-profile/update" method="post" class="" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{$id}}">
      <label>UserName</label>
      <input type="text" name="username" class="" value="{{$username}}">
      <label>MailAddress</label>
      <input type="text" name="userAddress" class="" value="{{$user_address}}">
      <label>Password</label>
      <input type="password" name="password" class="" value="{{$password}}">
      <label>new Password</label>
      <input type="password" name="newPassword" class="" value="">
      <label>Bio</label>
      <input type="text" name="bio" class="" value="{{$bio}}">
      <label>Icon Image</label>
      <input type="file" name="image" class="">
      <!--ボタン-->
      <input type="submit" name="submit" class="" value="更新">
    </form>
  </div>
</div>
@endsection