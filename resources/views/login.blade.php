@extends('layout.app')

@section('content')
<form class="ui form" method="POST" action="{{route('login')}}">
    @csrf
    <div class="field">
      <label>Email</label>
      <input type="email" name="email" placeholder="Email">
    </div>

    <div class="field">
        <label>Password</label>
        <input type="password" name="password" placeholder="Password">
    </div>

    <button class="ui button" type="submit">Login</button>
  </form>
@endsection