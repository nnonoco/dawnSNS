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
        <!--エラー文-->
        @if($errors->has('username'))
        <div class="error">
          {{$errors->first('username')}}
        </div>
        @endif
      </div>
      <div class="profile-item">
        <label>MailAddress</label>
        <input type="text" name="mail" class="profile-box" value="{{$user_address}}">
      </div>
      <!--エラー文-->
      @if($errors->has('mail'))
      <div class="error">
        {{$errors->first('mail')}}
      </div>
      @endif

      <div class="profile-item">
        <label>Password</label>
        <input type="password" name="oldPassword" class="profile-box" readonly value="{{$password}}">
      </div>
      <div class="profile-item">
        <label>new Password</label>
        <input type="password" name="password" class="profile-box">
      </div>
      <!--エラー文-->
      @if($errors->has('password'))
      <div class="error">
        {{$errors->first('password')}}
      </div>
      @endif

      <div class="profile-item">
        <label>Bio</label>
        <input type="textarea" name="bio" class="profile-bio" value="{{$bio}}" placeholder="自己紹介をいれてね">
      </div>
      <!--エラー文-->
      @if($errors->has('bio'))
      <div class="error">
        {{$errors->first('bio')}}
      </div>
      @endif

      <div class="profile-item">
        <label>Icon Image</label>
        <input type="file" name="image" class="profile-img">
      </div>
      <!--エラー文-->
      @if($errors->has('image'))
      <div class="error">
        {{$errors->first('image')}}
      </div>
      @endif

      <!--ボタン-->
      <div class="profile-btn">
        <input type="submit" name="submit" class="profile-submit" value="更新">
      </div>
    </form>
  </div>
</div>
@endsection