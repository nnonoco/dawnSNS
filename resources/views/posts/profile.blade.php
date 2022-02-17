@extends('layouts.login')

@section('content')
<div class="">
  <!--アイコン-->
  <div class="">
    <img src="{{asset('images/'.$userimage)}}">
  </div>
  <!--情報-->
  <div class="">
    <form class="">
      <input type="hidden" name="" value="{{$id}}">
      <label>UserName</label>
      <input type="text" name="" class="" value="{{$username}}">
      <label>MailAddress</label>
      <input type="text" name="" class="" value="{{$user_address}}">
      <label>Password</label>
      <input type="text" name="" class="" value="{{$password}}">
      <label>new Password</label>
      <input type="text" name="" class="" value="">
      <label>Bio</label>
      <input type="text" name="" class="" value="{{$bio}}">
      <label>Icon Image</label>
      <input type="text" name="" class="" value="">
      <!--ボタン-->
      <input type="submit" name="submit" class="" value="更新">
    </form>
  </div>
</div>
@endsection