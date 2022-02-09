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
        <button class="" type="button" name="follow">フォロー中</button>
      </td>
    </tr>
    @endforeach
  </table>
</div>

@endsection