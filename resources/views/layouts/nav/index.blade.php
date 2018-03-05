<div class="bs-docs-section clearfix">
  <div class="row">
      <div class="col-lg-12">
          <div class="bs-component">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container-fluid"> <!--container -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Philly Scientists</a>
                  </div>

                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                      <li class="{{ set_active('/') }}" ><a href="/">Home</a></li>
                      <li class="{{ set_active('observations*') }}" ><a href="{{url('/observations')}}">Observations</a></li>
                      <li class="{{ set_active('about')}}"><a href="{{url('/about')}}">About</a></li>
                    </ul>
                    @auth
                      <!--Admin Navigation -->
                       @if(Auth::user()->role == 'admin')                     
                        <ul id="navRole" class="nav navbar-nav danger">
                          <li class="{{ set_active('programs*') }}" style="border:solid 2px #2d3e4f;"><a href="{{url('/programs')}}">Programs</a></li>
                          <li class="{{ set_active('teachers*')}}" style="border:solid 2px #2d3e4f;"><a href="{{url('/teachers')}}">Teachers</a></li>
                        </ul>
                        @endif
                      <!--Teacher Navigation -->
                      @if(Auth::user()->role == 'teacher')
                        <ul id="navRole" class="nav navbar-nav ">
                          <li  class="{{ set_active('groups*')}}"style="border:solid 2px #2d3e4f;"><a href="{{url('/groups')}}">Groups</a></li>
                          <li  class="{{ set_active('locations*') }}"style="border:solid 2px #2d3e4f;"><a href="{{url('/locations')}}">Locations</a></li>
                          <li class="{{ set_active('teach-data*') }}"style="border:solid 2px #2d3e4f;"><a href="{{url('/teach-data')}}">My Observations</a></li>
                        </ul>
                      @endif
                    @endauth
                
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                      <!-- Left Side Of Navbar -->
                      <ul class="nav navbar-nav">
                        &nbsp;
                      </ul>
                      <!-- Right Side Of Navbar -->
                      <ul class="nav navbar-nav navbar-right">
                      <!-- Authentication Links -->
                        @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu">
                              <li>
                                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                  </form>
                              </li>
                          </ul>
                        </li>
                      @endguest
                    </ul>
                  </div>
                </div>
              </div> <!--container -->
            </nav>
          </div>
        </div>
  </div>
</div>