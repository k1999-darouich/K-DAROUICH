<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body style="overflow-x: hidden;  overflow-y: auto;">


    <!------ Include the above in your HEAD tag ---------->

    <div class=" login">
        <div class="row">
            <div class="col-md-4 register-left">
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="100.000000pt" height="100.000000pt" viewBox="0 0 338.000000 316.000000" preserveAspectRatio="xMidYMid meet">
                    <g transform="translate(0.000000,316.000000) scale(0.100000,-0.100000)" fill="#fff" stroke="none">
                        <path d="M1147 1962 c-202 -202 -367 -372 -367 -377 0 -6 157 -167 350 -360
                            l350 -349 40 39 c22 21 40 44 40 50 0 5 -135 145 -300 310 -165 165 -300 304
                            -300 310 0 6 51 61 114 124 97 97 116 112 132 103 11 -6 149 -141 309 -301
                            159 -160 294 -291 300 -291 6 0 28 17 48 38 l37 37 -296 295 c-162 162 -300
                            303 -306 314 -9 16 6 35 103 132 63 63 120 114 129 114 8 0 151 -136 317 -302
                            l303 -302 40 39 c22 21 40 44 40 50 0 16 -683 695 -700 695 -8 0 -180 -165
                            -383 -368z" />
                        <path d="M1831 2286 c-18 -19 -32 -39 -30 -45 2 -6 138 -145 302 -309 163
                            -164 297 -303 297 -308 0 -12 -232 -244 -245 -244 -5 0 -148 138 -317 307
                            l-308 308 -42 -43 -43 -42 310 -310 309 -309 -122 -123 -122 -123 -310 310
                            -310 310 -45 -45 -45 -45 353 -353 353 -353 372 373 c205 205 373 376 375 380
                            2 8 -682 698 -692 698 -4 0 -22 -15 -40 -34z" />
                    </g>
                </svg>
                <h3>Welcome</h3>
                <p>You are 30 seconds away from earning your own money!</p>
            </div>
            <div class="col-md-8 register-right ">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link " id="home-tab" data-toggle="tab" href="{{ route('register') }}" aria-selected="true">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="{{ route('login') }}" aria-selected="false">Log In</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active row" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Log In</h3>
                        <form method="POST" class="register-form" action="{{ route('login') }}">
                        @csrf
                        <div class="col-12">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <input type="submit" class="btn button-5" value="Log In" />
                    </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.0.0/mdb.min.js"></script>
</body>

</html>
