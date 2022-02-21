@extends('layouts.login')

@section('content')
<!--自己紹介-->
<div class="">
  <!--ユーザーアイコン-->
  <div class="">
    <img src="{{asset('images/'.$user->images)}}">
  </div>
  <!--情報-->
  <div class="">
    <!--名前-->
    <div class="">
      <p>Name</p>
      <p>{{$user->username}}</p>
    </div>
    <!--自己紹介-->
    <div class="">
      <p>Bio</p>
      <p>{{$user->bio}}</p>
    </div>
  </div>
  <!--フォローボタン-->
  <!--フォローするボタン-->
  <td>
    <form action="/follow" method="POST">
      @csrf
      <input type="hidden" name="loginId" value="{{$id}}" class="login_name">
      <input type="hidden" name="currentId" value="{{$user->id}}" class="current_name">
      <input type="submit" class="follow_button" name="submit" value="フォローする">
    </form>
  </td>
  <!--フォロー中ボタン-->
  <td>
    <form action="/follow/delete" method="POST">
      @csrf
      <input type="hidden" name="loginId" value="{{$id}}" class="login_name">
      <input type="hidden" name="currentId" value="{{$user->id}}" class="current_name">
      <input type="submit" class="follow_button" name="submit" value="フォロー中">
    </form>
  </td>
</div>
<!--タイムライン-->
<div class="timeline">
  <div class="timeline-container">
    @foreach ($post as $post)
    <div class="timeline-wrapper">
      <div class="timeline-image">
        <img src="{{asset('images/'.$post->images)}}">
      </div>
      <div>
        <div class="timeline-name">
          <p class="username">{{ $post->username }}</p>
          <p class="created-at">{{ $post->created_at }}</p>
        </div>
        <p class="timeline-post">{{ $post->posts }}</p>
      </div>
      @if($username === $post->username)
      <div class="">
        <button type="button">
          <a href="/post/{{ $post->id }}/update">
            <img src="images/edit.png">
          </a>
        </button>
      </div>
      <div class="">
        <button type="button">
          <a href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
            <img src="images/trash_h.png">
          </a>
        </button>
      </div>
      @endif
    </div>
    @endforeach
  </div>
</div>

@endsection