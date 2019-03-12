<nav id="mynav" class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a style="font-size:1.8em;margin-top:20px;" class="navbar-brand" href="{{url('/')}}">Philly Scientists</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobileMenu" aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div style="margin-top:20px;font-size:1.2em;" class="collapse navbar-collapse" id="mobileMenu">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ set_active('/') }}" ><a class="nav-link" href="{{ url('/') }}">Home</a></li>
      <li class="nav-item {{ set_active('observations*') }}" ><a class="nav-link" href="{{url('/observations')}}">Observations</a></li>
      <li <li class="nav-item {{ set_active('about')}}"><a class="nav-link" href="{{url('/help')}}">Help</a></li>
        @auth
          <!--Admin Navigation -->
           @if(Auth::user()->role == 'admin')                     
              <li class="nav-item {{ set_active('programs*') }}" style="border:solid 2px #2d3e4f;"><a  class="nav-link" href="{{url('/programs')}}">Programs</a></li>
              <li class="nav-item {{ set_active('teachers*')}}" style="border:solid 2px #2d3e4f;"><a  class="nav-link" href="{{url('/teachers')}}">Teachers</a></li>
            @endif
          <!--Teacher Navigation -->
          @if(Auth::user()->role == 'teacher')
              <li  class="nav-item {{ set_active('groups*')}}" style="border:solid 2px #2d3e4f;"><a href="{{url('/groups')}}" class="nav-link">Groups</a></li>
              <li  class="{{ set_active('locations*') }}" style="border:solid 2px #2d3e4f;"><a href="{{url('/locations')}}" class="nav-link">Locations</a></li>
              <li class="nav-item {{ set_active('teach-data*') }}" style="border:solid 2px #2d3e4f;"><a href="{{url('/teach-data')}}" class="nav-link">My Observations</a></li>
          @endif
        @endauth
      </ul>
                
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
        @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
        @endguest
      </ul>
    </div>
</nav>
