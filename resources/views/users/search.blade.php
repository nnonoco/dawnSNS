@extends('layouts.login')

@section('content')
<div class="">
  {!! Form::open(['url' => '/search/result']) !!}
  <div class="">
    {!! Form::input('text','searchName',null,['required','class' => 'searchname','placeholder' => 'ユーザー名']) !!}
  </div>
  <input type="image" class="submit" name="submit" src="images/post.png" alt="検索">
  {!! Form::close() !!}
</div>

<div class="">
  <table class="">
    @foreach($result as $result)
    <tr></tr>
    <td>{{ $result->images }}</td>
    <td>{{ $result->username }}</td>
    </tr>
    @endforeach
  </table>
</div>

@endsection