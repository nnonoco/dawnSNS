@extends('layouts.login')

@section('content')
<div class="profile">
  <!--アイコン-->
  <div class="profile-icon">
    <img src="{{asset('images/'.$userimage)}}">
  </div>
  <!--情報-->
  <div class="profile-container">
    <form action="/login-profile/update" method="post" class="" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{$id}}">
      <div class="profile-item">
        <label>UserName</label>
        <input type="text" name="username" class="profile-box" value="{{$username}}">
      </div>
      <div class="profile-item">
        <label>MailAddress</label>
        <input type="text" name="userAddress" class="profile-box" value="{{$user_address}}">
      </div>
      <div class="profile-item">
        <label>Password</label>
        <input type="password" name="password" class="profile-box" value="{{$password}}">
      </div>
      <div class="profile-item">
        <label>new Password</label>
        <input type="password" name="newPassword" class="profile-box" value="">
      </div>
      <div class="profile-item">
        <label>Bio</label>
        <input type="text" name="bio" class="profile-bio" value="{{$bio}}">
      </div>
      <div class="profile-item">
        <label>Icon Image</label>
        <input type="file" name="image" class="profile-img">
      </div>
      <!--ボタン-->
      <div class="profile-btn">
        <input type="submit" name="submit" class="profile-submit" value="更新">
      </div>
    </form>
  </div>
</div>
@endsection