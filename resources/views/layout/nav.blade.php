<div class="ui secondary  menu">
    <a class="active item">
      Home
    </a>
    <a class="item">
      Messages
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
      <form class="ui item" action="{{route('logout')}}" method="POST">
        @csrf
        <a class="ui item">
            Logout
          </a>
      </form>
      @else
      <a class="ui item">
        Register
      </a>
      <a class="ui item">
        Login
      </a>
      @endauth
      
    </div>
</div>