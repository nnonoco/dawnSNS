@extends('layouts.login')

@section('content')

<!--投稿画面-->
<div class="post-container">
  {!! Form::open(['url' => 'post/create']) !!}
  <div class="post-wrapper">
    <img src="{{asset('images/'.$userimage)}}">
    <div class="post-item">
      {{ Form::input('text','newPosts',null,['class' => 'form-control','placeholder'=>'何をつぶやこうか…？'])}}
    </div>
    <input type="image" class="submit" name="submit" src="images/post.png" alt="送信">
    {!! Form::close() !!}
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
            <a href="/post/{{ $post->id }}/update-form">
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
</div>
@endsection