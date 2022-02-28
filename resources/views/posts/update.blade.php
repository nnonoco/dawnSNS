@extends('layouts.login')

@section('content')
<form action="/post/update" method="GET">
  <input type="hidden" name="id" value="{{$update_post->id}}">
  <input type="text" name="posts" class="" value="{{$update_post->posts}}">
  <input type="hidden" name="updated_at" value="{{$update_post->updated_at}}">
  <input type="image" class="submit" name="submit" src="images/edit.png" alt="送信">
</form>
@endsection