
@extends('layouts.app')

@section('content')
<div class="container event" style="margin-top: 3rem;" >
    <div class="row event-inf  " >
        <div class="col-md-3">
            <img src="/storage/{{ $post->image }}" alt="" style="border-radius: 2%;" width="100%" >
        </div>
          
        
        <div class=" col-md-9 ">
            <h1 >{{$post->intitule}}</h1>
            <h6>{{$post->caption}}</h6>
            <h6>Du : {{ $post->du }}</h6>
            <h6>Au : {{ $post->au }}</h6>
            <a href="/profile/{{ $post->user->id }}">
                        <input type="submit" value="New Event" class="mb-3 mt-1"/>
            </a>
        </div>
    </div>
    <hr color="#007399" style="font-weight: lighter;">

<div class="event-detail">
    <div class="row">
        <div class="col-md-8 ">
            <div class="event-detail-left">
                <div class="event-detail-header">
                    Présentation
                </div>
                <div class="event-detail-content pt-2">
                    <p>   Description: {{ $post->description }}</p> 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="h5">Domaine d'activité de l'évènement</div>
                            <i class="fas fa-bookmark mr-1" style="color:#007399 ;" ></i>&#160;{{ $post->categorie->name }}
                        </div>
                        <div class="col-md-6">
                        <div class="h5">Type de l'évènement</div>
                        {{ $post->type->name }}
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <div class="event-detail-right mt-3">
                <div class="event-detail-header">
                    Horaire
                </div>
                <div class="row pt-3">
                    <div class="col-md-6">
                    <div class="h5">Ouverture</div>
                        {{ $post->du }}
                    </div>
                    <div class="col-md-6">
                    <div class="h5">Cloture</div>
                        {{ $post->au }}
                    </div>
                </div>
                
            </div>
            
        </div>
        <div class="col-md-4 ">
            <div class="event-detail-right">
            <div class="event-detail-header">
                   Organisateur
                </div>
                <div class="d-flex align-items-center pt-3" style="">
                    <div style="margin-top: -10%; ">
                        <img class="w-100 rounded-circle pr-3 " src="/storage/{{ $post->user->profile->image }}" style="max-width:90px;">
                    </div>
                    <div class="">
                        <div class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>

                        </div>
                        @if($post->user->profile->profession)
                        <div>{{$post->user->profile->profession->name}}</div>
                        <div class="pt-1" style="text-align: center;">
                            <div class="row">
                                <div class="col-1 ">
                                <a href="{{$post->user->profile->facebook_url}}" ><i class="fab fa-facebook-f" style="font-size: large; color: #007399;"></i></a>
                                </div>
                                <div class="col-1">
                                <a href="{{$post->user->profile->instagram_url}}"><i class="fab fa-instagram" style="font-size: large; color: #007399;"></i></a>
                                </div>
                                <div class="col-1">
                                <a href="{{$post->user->profile->gmail_url}}"><i class="fab fa-google" style="font-size: large; color: #007399;"></i></a>
                                </div>
                            </div> 
                            
                        </div>
                        @endif
                        <a href="/profile/{{ $post->user->id }}">
                        <input type="submit" value="Détail" class="mb-3 mt-1"/>
                        </a>
                    </div>
                   
                </div>
               
            </div>
            @if($Semilarposts->count()>1)
            <div class="event-detail-right mt-3">
            <div class="event-detail-header">
                   Evénements semilaires
                </div>
                    @foreach($Semilarposts as $Semilarpost)
                    @if($Semilarpost->id!=$post->id)
                    <div class="d-flex row align-items-center pt-3">
                        <div class="col-3">
                            <img class="w-100 pr-3 rounded-circle" src="/storage/{{$Semilarpost->image }}" style="width: 50%;" >
                        </div>
                        <div class="col-9" style="margin-left: -8%;"> 
                            <a href="/p/{{ $Semilarpost->id }}" title="{{ $Semilarpost->intitule}}">
                                    <div class="main-text" >{{ $Semilarpost->intitule}}</div>
                                </a> 
                                <div class="text-muted"><small>{{ $Semilarpost->du }}</small></div>  

                        </div>
                    </div>
                    
                    @endif
                    @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
</div>
@endsection