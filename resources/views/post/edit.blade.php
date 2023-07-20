@extends('layout.app')

@section('content')
<form class="ui form" method="POST" action="{{route('edit-post',$post->id)}}">
    @csrf
    @method('PATCH')
    <div class="field">
      <label>Title</label>
      <input type="text" name="title" value="{{$post->title}}" placeholder="Name">
    </div>
    <div class="field">
      <label>Content</label>
      <textarea name="content" cols="30" rows="5">{{$post->content}}</textarea>
    </div>

    <button class="ui button" type="submit">Save Changes</button>
  </form>
@endsection