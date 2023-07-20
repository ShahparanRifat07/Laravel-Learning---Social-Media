@extends('layout.app')

@section('content')
<form class="ui form" method="POST" action="{{route('create-post')}}">
    @csrf
    <div class="field">
      <label>Title</label>
      <input type="text" name="title" placeholder="Name">
    </div>
    <div class="field">
      <label>Content</label>
      <textarea name="content" cols="30" rows="5"></textarea>
    </div>

    <button class="ui button" type="submit">Post</button>
  </form>
@endsection