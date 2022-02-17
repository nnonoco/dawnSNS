@extends('layouts.login')

@section('content')
<!--フォローリスト-->
<div class="">
  @foreach($follower_image as $follower_image)
  <div class="">
    <a href="/post/{{ $follower_image->id }}/profile">
      <img src="{{asset('images/'.$follower_image->images)}}">
    </a>
  </div>
  @endforeach
</div>
<!--タイムライン-->
<div class="timeline">
  <div class="timeline-container">
    @foreach ($post as $post)
    <div class="timeline-wrapper">
      <div class="timeline-image">
        <a href="/post/{{ $post->user_id }}/profile">
          <img src="{{asset('images/'.$post->images)}}">
        </a>
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