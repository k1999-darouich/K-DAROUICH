@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row profile">
        <div class="col-md-4 col-sm-12 profile-left" style="padding-left: 2rem; ">
            <div class="col-md-12 col-sm-12 position-fixed " style="width: auto;">
                <div class="col-md-12 bloc " style="text-align: end;">
                    @can('update', $user->profile)
                    <a href="/p/create"><i class="fas fa-plus" style="font-size:large;"></i> Add Post</a>
                    @endcan
                </div>
                <div class="row">
                    <div class="col-md-12 col-6 img1">
                        @if($user->profile->image )
                        <img src="/storage/{{ $user->profile->image }}" class="rounded-circle">
                        @else
                        <img src="/images/default-profile-picture1.jpg" class="rounded-circle">
                        @endif

                    </div>
                    <div class="col-md-12 col-6 pt-3 profile-inf ">
                        <div class="profile-name">{{ $user->profile->pseudo_name }}</div>
                        <div><small> {{ $user->email }}</small></div>
                        @if($user->profile->profession)
                        <div>{{$user->profile->profession->name}}</div>
                        <div class="pt-1" style="text-align: center;">
                            <div class="row">
                                <div class="offset-4 col-1 ">
                                    <a href="{{$user->profile->facebook_url}}"><i class="fab fa-facebook-f" style="font-size: large;"></i></a>
                                </div>
                                <div class="col-1">
                                    <a href="{{$user->profile->instagram_url}}"><i class="fab fa-instagram" style="font-size: large;"></i></a>
                                </div>
                                <div class="col-1">
                                    <a href="{{$user->profile->gmail_url}}"><i class="fab fa-google" style="font-size: large;"></i></a>
                                </div>
                            </div>

                        </div>
                        @endif


                    </div>
                </div>
                <hr color="white">
                <div class="col-md-12 col-sm-12 bloc-active">
                    <i class="far fa-calendar-alt" style="font-size: large;"></i>
                    <a href="/profile/{{ $user->id }}">EVENTS</a>
                </div>
                @can('update', $user->profile)
                <div class="col-md-12 col-sm-12 bloc">
                    <i class="fas fa-cogs " style="font-size: large;"></i>
                    <a href="/profile/{{ $user->id }}/edit">SETTINGS</a>
                </div>
                
                <div class="col-md-12 col-sm-12 bloc">
                <i class="fas fa-sign-out-alt" style="font-size: large;"></i>
                    
                    <a class="" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('LOGOUT') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </div>
                @endcan
                


            </div>

        </div>
        <div class="col-md-8 col-sm-12 profile-right ">
            <div class="box">
            <div class=" col-12 heading1">Edit profile <hr color="#007399"></div>
                <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="container">
                        <div class="picture-container">
                            <div class="picture">
                                <img src="/images/default-profile-picture1.jpg" class="picture-src" id="wizardPicturePreview" title="">
                                <input type="file" id="wizard-picture" name="image" class="">
                            </div>
                            <h6 class="">Choose Picture</h6>
                            @error('image')
                            <strong>{{ $message }}</strong>

                            @enderror
                        </div>
                    </div>
                    <div class="offset-2 col-8">
                    <div class="input-box">
                        <input id="title" type="text" class=" @error('pseudo_name') is-invalid @enderror" name="pseudo_name" value="{{ old('pseudo_name') ?? $user->profile->pseudo_name }}" autocomplete="pseudo_name" autofocus required>
                        @error('pseudo_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="">Username</label>
                    </div>
                    <div class="input-box">
                        <input id="facebook_url" type="text" class=" @error('facebook_url') is-invalid @enderror" name="facebook_url" value="{{ old('facebook_url') ??$user->profile->facebook_url}}" autocomplete="facebook_url" autofocus required>

                        @error('facebook_url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="">Facebook</label>
                    </div>
                    <div class="input-box">
                        <input id="instagram_url" type="text" class=" @error('instagram_url') is-invalid @enderror" name="instagram_url" value="{{ old('instagram_url') ??$user->profile->instagram_url}}" autocomplete="instagram_url" autofocus required>

                        @error('instagram_url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="">Instagram</label>
                    </div>
                    <div class="input-box">
                        <input id="gmail_url" type="text" class=" @error('gmail_url') is-invalid @enderror" name="gmail_url" value="{{ old('gmail_url') ??$user->profile->gmail_url}}" autocomplete="gmail_url" autofocus required>

                        @error('gmail_url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label for="">Gmail</label>
                    </div>
                    <div class="input-box">
                        <select class="form-c" name="profession_id" id="exampleFormControlSelect1">
                            <option selected disabled>Profession</option>
                            @foreach($professions as $profession)
                            <option value="{{$profession->id}}">{{$profession->name}}</option>
                            @endforeach
                            <!-- <option>Conférence</option>
                                        <option>Séminaire</option>
                                        <option>Compétition</option>
                                        <option>Congrés</option>
                                        <option>Exposition</option>
                                        <option>Tournoi</option>
                                        <option>Autre</option>-->
                        </select>


                        @error('profession_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        

                    </div>
                        <input type="submit" value="Save" />
                    </div>
                    
                </form>
                <form action="/profile/{{ $user->id }}" method="POST" style="text-align: end;">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash"></i> </button>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection