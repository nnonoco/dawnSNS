@extends('layouts.login')

@section('content')
<div class="search">
  <div class="search-container">
    {!! Form::open(['url' => '/search/result']) !!}
    <div class="search-wrapper">
      {!! Form::input('text','searchName',null,['required','class' => 'search_name','placeholder' => 'ユーザー名']) !!}
    </div>
    <input type="image" class="search-submit" name="submit" src="{{asset('images/post.png')}}" alt="検索">
    {!! Form::close() !!}
    @if(isset($search_username))
    <div class="search-result">
      <p>検索ワード：{{$search_username}}</p>
    </div>
    @endif
  </div>
</div>

<div class="search-user">
  <table class="">
    @foreach($result as $result)
    <tr class="search-item">
      <td class="search-image"><img src="{{asset('images/'.$result->images)}}"></td>
      <td class="search-username">{{ $result->username }}</td>
      @if(in_array( $result->id,array_column($follow,'follow')))
      <!--フォロー中ボタン-->
      <td class="search-button">
        <form action="/follow/delete" method="POST">
          @csrf
          <input type="hidden" name="loginId" value="{{$id}}" class="login_name">
          <input type="hidden" name="currentId" value="{{$result->id}}" class="current_name">
          <input type="submit" class="nofollow_button" name="submit" value="フォローをはずす">
        </form>
      </td>
      @else
      <!--フォローするボタン-->
      <td class="search-button">
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