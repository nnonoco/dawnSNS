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
      <!--フォロー中ボタン-->
      @if(isset($follow))
      <td>
        <form action="/follow/delete" method="POST">
          @csrf
          <input type="hidden" name="loginId" value="{{$id}}" class="login_name">
          <input type="hidden" name="currentId" value="{{$result->id}}" class="current_name">
          <input type="submit" class="follow_button" name="submit" value="フォロー中">
        </form>
      </td>
      @else
      <!--フォローするボタン-->
      <td>
        <form action="/follow" method="POST">
          @csrf
          <input type="hidden" name="loginId" value="{{$id}}" class="login_name">
          <input type="hidden" name="currentId" value="{{$result->id}}" class="current_name">
          <input type="submit" class="follow_button" name="submit" value="フォローする">
        </form>
      </td>
      @endif
    </tr>
    @endforeach
  </table>
</div>

@endsection