<nav class="navbar navbar-expand-md navbar-light fixed-top" >
            <div class="container ">
                <a class="navbar-brand d-flex" href="{{ url('/') }}">
                
                    <div>
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="100%" height="100%" viewBox="0 0 338.000000 316.000000"
                             preserveAspectRatio="xMidYMid meet" style="height: 2em;width: 2em ;" class="">

                            <g transform="translate(-80,370) scale(0.15,-0.15)"
                               fill="#ffffffff" stroke="none">
                                <path d="M1147 1962 c-202 -202 -367 -372 -367 -377 0 -6 157 -167 350 -360
l350 -349 40 39 c22 21 40 44 40 50 0 5 -135 145 -300 310 -165 165 -300 304
-300 310 0 6 51 61 114 124 97 97 116 112 132 103 11 -6 149 -141 309 -301
159 -160 294 -291 300 -291 6 0 28 17 48 38 l37 37 -296 295 c-162 162 -300
303 -306 314 -9 16 6 35 103 132 63 63 120 114 129 114 8 0 151 -136 317 -302
l303 -302 40 39 c22 21 40 44 40 50 0 16 -683 695 -700 695 -8 0 -180 -165
-383 -368z"/>
                                <path d="M1831 2286 c-18 -19 -32 -39 -30 -45 2 -6 138 -145 302 -309 163
-164 297 -303 297 -308 0 -12 -232 -244 -245 -244 -5 0 -148 138 -317 307
l-308 308 -42 -43 -43 -42 310 -310 309 -309 -122 -123 -122 -123 -310 310
-310 310 -45 -45 -45 -45 353 -353 353 -353 372 373 c205 205 373 376 375 380
2 8 -682 698 -692 698 -4 0 -22 -15 -40 -34z"/>
                            </g>
                        </svg>
                        <span class="pl-2" style="border-left : 0.1em solid #fff; color: #fff;">ENSET Event</span></div>
                </a>
                </a>
                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">
                                        <button class="btn btn-primary">Inscription</button>
                                    </a>
                                </li>
                            @endif
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <button class="btn btn-primary ">Connexion</button>
                                    </a>
                                </li>
                            @endif
                        @else
                        
                      <li class="nav-item active mr-5 ">
                        <a class="nav-link " href="{{ url('/') }}"><i class="fas fa-home " style="font-size: large; color: #fff;"></i> </a>
                      </li>
                      <li class="nav-item mr-5">
                        <a class="nav-link" href="/profile/{{Auth::user()->id}}"><i class="fas fa-user" style="font-size: large; color: #fff;"></i></a>
                      </li>
                      <li class="nav-item mr-5 ">
                        <a class="nav-link" href="#" style="color: #fff;">Contact-Us</a>
                      </li>
                
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: #fff;">
                                    {{ Auth::user()->profile->pseudo_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
