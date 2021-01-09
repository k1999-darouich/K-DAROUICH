@extends('layouts.app')

@section('content')
<div class="container bg-white " style="margin-top: 3rem;">
    <form action="/p/{{ $post->id }}" enctype="multipart/form-data" method="POST">
        @method('PATCH')
        @csrf
        <div class="row ">
            <div class="col-8 box2 offset-2">
                <div class="row ">
                    
                    <div class=" col-12 heading1">Add New post<hr color="#007399"></div>
                </div>
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
                <div class="input-box">


                    <input id="caption" type="text" class="@error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') ??$post->caption}}" autocomplete="caption" autofocus required>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <label >Post Caption</label>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="input-box">
                        <input id="intitule" type="text" class=" @error('intitule') is-invalid @enderror" name="intitule" value="{{ old('intitule') ??$post->intitule}}" required autocomplete="intitule" autofocus required>

                        @error('intitule')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="intitule" class="">{{ __('Intitulé') }}</label>
                    
                </div>
                <div class="input-box">
                    

                    
                        <select class="form-c" name="type_id" id="exampleFormControlSelect1" required>
                            <option selected disabled>Type</option>
                            @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                            <!-- <option>Conférence</option>
                                        <option>Séminaire</option>
                                        <option>Compétition</option>
                                        <option>Congrés</option>
                                        <option>Exposition</option>
                                        <option>Tournoi</option>
                                        <option>Autre</option>-->
                        </select>

                        @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    
                </div>
                <div class="input-box">
                    

                    <div class="row" style="padding-left: 1rem;">
                    <div class=" col-2" >
                    <label for="du_date_time" class="col-md-4 col-form-label text-md-left">{{ __('Du') }}</label>
                    </div>
                    <div class="col-10">
                    <input type="datetime-local" class="form-c" id="game-date-time-text" value="{{ old('du') ??$post->du}}" name="du" required>
                    </div>
                    </div>
                  

                    @error('du_date_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    
            </div>
                
                    </div>
                    <div class="col-md-6">
                    <div class="input-box">
                
                
                    <input type="text" class="form-c" id="exampleFormControlTextarea1" name="description" value="{{ old('description') ??$post->description}}"required/>
                
                @error('affiche')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="description" >{{ __('Description') }}</label>
            </div>
            
                    <div class="input-box">
                    

                    <select class="form-c" name="categorie_id" id="exampleFormControlSelect1" required>
                        <option selected disabled>Catégorie</option>
                        @foreach($categories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                        @endforeach
                        <!-- IT & technologie</option>
                                    <option>Education & formation</option>
                                    <option>Auto & automobile</option>
                                    <option>Electrique & electronique</option>
                                    <option>Autre</option>-->

                    </select>

                    @error('categorie')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                
            </div>
            <div class="input-box">
                    
                    <div class="row" style="padding-left: 1rem;">
                    <div class=" col-2" >
                    <label for="au_date_time" class="col-md-4 col-form-label text-md-right">{{ __('Au') }}</label>
                    </div>
                    <div class="col-10">
                    <input type="datetime-local" class="form-c" id="game-date-time-text" name="au" value="{{ old('au') ??$post->au}}" required>
                    </div>
                    </div>
                    

                    @error('au_date_time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                
                
            </div>

                    </div>
                </div>
               
                
                
                <input type="submit" value="Save" class="mb-3"/>

            </div>

        </div>


    </form>
</div>
@endsection