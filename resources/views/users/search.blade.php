@extends('layouts.login')

@section('content')
<div class="">
  {!! Form::open(['url' => '/search/result']) !!}
  <div class="">
    {!! Form::input('text','searchName',null,['required','class' => 'searchname','placeholder' => 'ユーザー名']) !!}
  </div>
  <input type="image" class="submit" name="submit" src="{{asset('images/post.png')}}" alt="検索">
  {!! Form::close() !!}
  @if(isset($search_username))
  <div class="">
    <p>検索ワード：{{$search_username}}</p>
  </div>
  @endif
</div>

<div class="">
  <table class="">
    @foreach($result as $result)
    <tr>
      <td><img src="{{asset('images/'.$userimage)}}"></td>
      <td>{{ $result->username }}</td>
      <td>
        <form action="" method="post">
          <input type="hidden" name="loginName" value="{{$id}}" class="login_name">
          <input type="hidden" name="currentName" value="{{$result->id}}" class="current_name">
          <button class="" type="button" name="follow">フォロー中</button>
          <button class="" type="button" name="follow">フォローする</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>

@endsection