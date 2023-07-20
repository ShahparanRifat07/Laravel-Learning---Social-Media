@extends('layout.app')

@section('content')
    <div class="ui centered card" style="margin:auto; width:60%;">
        <div class="content">
            <a href="{{route('post-detail',$post->id)}}" class="header">{{$post->title}}</a>
          <div class="meta">
            <span class="category">{{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span>
          </div>
          <div class="description">
            {{$post->content}}
          </div>
        </div>
        <div class="extra content">
            <div class="left floated" style="display: flex;">
                @if (auth()->user()->id === $post->user->id)
                <a href="{{route('edit-post',$post->id)}}" class="ui primary basic button">Edit</a>
                <form action="{{route('delete-post',$post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="ui negative basic button">Delete</button>
                </form>
                @endif
                
              </div>
          <div class="right floated author">
            {{-- <img class="ui avatar image" src="/images/avatar/small/matt.jpg"> Matt --}}
            <div class="meta">{{$post->user->name}}</div>
          </div>
        </div>
      </div>
    
@endsection