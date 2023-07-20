<div class="ui secondary  menu">
    <a href="{{route('home')}}" class="active item">
      Home
    </a>
    <a href="{{route('create-post')}}" class="item">
      Create Post
    </a>
    <a class="item">
      Friends
    </a>
    <div class="right menu">
      <div class="item">
        <div class="ui icon input">
          <input type="text" placeholder="Search...">
          <i class="search link icon"></i>
        </div>
      </div>
      @auth
      <a class="ui item" href="">
        {{auth()->user()->name}}
      </a>
      <form class="ui item" action="{{route('logout')}}" method="POST">
        @csrf
        <button class="ui item">Logout</button>
      </form>
      @else
      <a href="{{route('register')}}" class="ui item">
        Register
      </a>
      <a href="{{route('login')}}" class="ui item">
        Login
      </a>
      @endauth
      
    </div>
</div>