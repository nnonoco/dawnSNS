@extends('layouts.login')

@section('content')
<!--フォローリスト-->
<div class="follow-list">
  <h2>Follow list</h2>
  <div class="follow-icon">
    @foreach($follow_image as $follow_image)
    <a href="/post/{{ $follow_image->id }}/profile">
      <img src="{{asset('images/'.$follow_image->images)}}">
    </a>
    @endforeach
  </div>
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
      <div class="timeline-item">
        <div class="timeline-name">
          <p class="username">{{ $post->username }}</p>
          <p class="created-at">{{ $post->created_at }}</p>
        </div>
        <p class="timeline-post">{{ $post->posts }}</p>
        @if($username === $post->username)
        <div class="icon">
          <div class="update-icon">
            <a href="/post/{{ $post->id }}/update">
              <img src="images/edit.png">
            </a>
          </div>
        </div>
        <div class="delete-icon">
          <a href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
            <img src="images/trash_h.png">
          </a>
        </div>
        @endif
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection