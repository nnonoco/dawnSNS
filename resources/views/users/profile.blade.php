@extends('layouts.login')

@section('content')
<!--自己紹介-->
<div class="current">
  <!--ユーザーアイコン-->
  <div class="current_icon">
    <img src="{{asset('images/'.$user->images)}}">
  </div>
  <!--情報-->
  <div class="current-profile">
    <!--名前-->
    <div class="current-item">
      <p class="current-label">Name</p>
      <p>{{$user->username}}</p>
    </div>
    <!--自己紹介-->
    <div class="current-item">
      <p class="current-label">Bio</p>
      <p>{{$user->bio}}</p>
    </div>
  </div>
  @if(in_array( $user->id,array_column($follow,'follow')))
  <!--フォロー中ボタン-->
  <div class="current-btn">
    <form action="/follow/delete" method="POST">
      @csrf
      <input type="hidden" name="loginId" value="{{$id}}" class="login_name">
      <input type="hidden" name="currentId" value="{{$user->id}}" class="current_name">
      <input type="submit" class="follow_button" name="submit" value="フォロー中">
    </form>
  </div>
  @else
  <!--フォローするボタン-->
  <div class="current-btn">
    <form action="/follow" method="POST">
      @csrf
      <input type="hidden" name="loginId" value="{{$id}}" class="login_name">
      <input type="hidden" name="currentId" value="{{$user->id}}" class="current_name">
      <input type="submit" class="follow_button" name="submit" value="フォローする">
    </form>
  </div>
  @endif
</div>
<!--タイムライン-->
<div class="timeline">
  <div class="timeline-container">
    @foreach ($post as $post)
    <div class="timeline-wrapper">
      <div class="timeline-image">
        <img src="{{asset('images/'.$post->images)}}">
      </div>
      <div class="timeline-item">
        <div class="timeline-name">
          <p class="username">{{ $post->username }}</p>
          <p class="created-at">{{ $post->created_at }}</p>
        </div>
        <p class="timeline-post">{{ $post->posts }}</p>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection