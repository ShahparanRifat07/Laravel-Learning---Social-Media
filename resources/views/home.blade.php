@extends('layout.app')

@section('content')
<div class="ui centered four column grid">
    <div class="row">
    @foreach ($posts as $post)

              <div class="ui raised link card" style="margin:1rem">
                <div class="content">
                    <a href="{{route('post-detail',$post->id)}}" class="header">{{$post->title}}</a>
                  <div class="meta">
                    <span class="category">{{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span>
                  </div>
                  <div class="description">
                    @if (Str::length($post->content)>300)
                    <p>{{Str::limit($post->content,300)}} <a href="{{route('post-detail',$post->id)}}">read more</a></p>
                    @else
                    <p>{{Str::limit($post->content,300)}}</p>
                    @endif
                  </div>
                </div>
                <div class="extra content">
                  <div class="right floated author">
                    {{-- <img class="ui avatar image" src="/images/avatar/small/matt.jpg"> Matt --}}
                    <div class="meta">{{$post->user->name}}</div>
                  </div>
                </div>
              </div>
    @endforeach
</div>
</div>
@endsection