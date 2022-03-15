@extends('layouts.login')

@section('content')

<!--投稿画面-->
<div class="post-container">
  {!! Form::open(['url' => 'post/create']) !!}
  <div class="post-wrapper">
    <img src="{{asset('images/'.$userimage)}}">
    <div class="post-item">
      {{ Form::input('textarea','posts',null,['class' => 'form-control','placeholder'=>'何をつぶやこうか…？'])}}
    </div>
    <input type="image" class="submit" name="submit" src="{{asset('images/post.png')}}" alt="送信">
    {!! Form::close() !!}
    <!--エラー文-->
    @if($errors->has('posts'))
    <div class="error">
      {{$errors->first('posts')}}
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
          @if($username === $post->username)
          <div class="icon">
            <!--編集ボタン-->
            <a class="update-icon">
              <img src="{{asset('images/edit.png')}}" id="timeline" data-id="{{$post->id}}" data-post="{{$post->posts}}">
            </a>
            <!--削除画面-->
            <div class="delete-icon">
              <a href="/post/{{ $post->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">
                <img src="{{asset('images/trash_h.png')}}">
              </a>
            </div>
          </div>
          @endif
        </div>
      </div>
      @endforeach
      <!--編集画面-->
      <div class="modal-container">
        <div class="modal-body">
          <div class="modal-content">
            <form action="/post/update" method="POST" name="formModal">
              @csrf
              <input type="hidden" name="id" id="id" value="">
              <input type="textarea" name="posts" id="posts" class="update_post" value="">
              <input type="hidden" name="updated_at">
              <input type="image" class="update_submit" name="submit" src="{{asset('images/edit.png')}}" alt="送信">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection