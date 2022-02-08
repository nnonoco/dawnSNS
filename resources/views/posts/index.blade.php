@extends('layouts.login')

@section('content')

<!--投稿画面-->
<div class="post-container">
  {!! Form::open(['url' => 'post/create']) !!}
  <div class="post-wrapper">
    <img src="">
    <!-- $images -->
    <div class="post-item">
      {{ Form::input('text','newPosts',null,['class' => 'form-control','placeholder'=>'何をつぶやこうか…？'])}}
    </div>
    <input type="image" name="submit" src="images/post.png" alt="送信">
    {!! Form::close() !!}
  </div>
  <!--タイムライン-->
  <div class="timeline">
    <table class="timeline-container">
      @foreach ($post as $post)
      <tr>
        <div class="timeline-wrapper">
          <img src="images/dawn.pug">
          <!-- $images -->
          <div class="timeline-post">
            <div class="timeline-name">
              <tb>{{ $post->username }}</tb>
              <tb>{{ $post->created_at }}</tb>
            </div>
            <tb>{{ $post->posts }}</tb>
          </div>
        </div>
      </tr>
      @endforeach
    </table>
  </div>

</div>
@endsection