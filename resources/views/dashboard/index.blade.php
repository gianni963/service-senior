@extends('layouts.app')

@section('content')

           

     <!-- USER PROFILE ROW STARTS-->
        <div class="row">
            <div class="col-md-3 col-sm-3">
                                   
                <div class="user-wrapper">
                    <img src="{{ asset('img/avatar/emptyavatar.png') }} " class="img-responsive" height="10" width= "10"/> 
                <div class="description">
                   <h4>{{$user->name}}</h4>
                    <h5> <strong> {{$user->roles->first()->name}} </strong></h5>

                    <hr />
                    <a href="{{ route('getReceivedMessages') }}" class="btn btn-danger btn-sm"> <i class="fa fa-user-plus" ></i> &nbsp;Messages </a> 
                    <a href="{{ route('annonces.published.index') }}" class="btn btn-danger btn-sm"> <i class="fa fa-user-plus" ></i> &nbsp;Mes annonces </a> 
                </div>
                 </div>
                 <div class="col-md-6">
                    <div class="text-center">
                        <a href="{{ route('deleteAccountForm') }}" class="btn btn-danger btn-sm"> <i class="fa fa-user-plus" ></i> &nbsp;demande de suppression de compte</a> 
                    </div>
                </div>
            </div>
            
            <div class="col-md-9 col-sm-9  user-wrapper">
                <div class="description">
                     <h3> Mes informations </h3>
                <hr />
                 
                <div class="card">
                        <div class="header">
                            <h4 class="title">Editer votre profil</h4>
                        </div>
                        <div class="content">
                             <form action="{{ route('profile.update', $user) }}" method="post">                                
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group {{ $errors->has('name')? 'has-error' : '' }}">
                                            <label for="name" class="control-label">Nom d'utilisateur:</label>
                                            <input type="text" class="form-control border-input" name="name" placeholder="Nom d'utilisateur" value="{{$user->name}}">
                                              @if($errors->has('name'))
                                                <span class="help-block">
                                                    {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group {{ $errors->has('email')? 'has-error' : '' }}">
                                            <label for="email">Adresse Email</label>
                                            <input type="email" name="email" class="form-control border-input" placeholder="Email" value="{{$user->email}}">
                                             @if($errors->has('email'))
                                                    <span class="help-block">
                                                        {{ $errors->first('email') }}
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group {{ $errors->has('firstname')? 'has-error' : '' }}">
                                            <label for="firstname" class="control-label">Prénom:</label>
                                            <input type="text" class="form-control border-input" name="firstname" placeholder="Prénom" value="{{$user->firstname}}">
                                              @if($errors->has('firstname'))
                                                <span class="help-block">
                                                    {{ $errors->first('firstname') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group form-group {{ $errors->has('lastname')? 'has-error' : '' }}">
                                            <label for="lastname">Nom</label>
                                            <input type="text" name="lastname" class="form-control border-input" placeholder="Nom de famille" value="{{$user->lastname}}">
                                            @if($errors->has('lastname'))
                                                    <span class="help-block">
                                                        {{ $errors->first('lastname') }}
                                                    </span>
                                            @endif
                                        </div>
                                    </div>

                               <div class="row">
                                    <div class="col-md-12 form-group {{ $errors->has('description')? 'has-error' : '' }}">
                                        <div class="form-group description">
                                             <label for="description">Présentez-vous</label>
                                            <textarea name="description" rows="5" cols="30"  class="form-control">{{$user->description}}</textarea>
                                            @if($errors->has('description'))
                                                    <span class="help-block">
                                                        {{ $errors->first('description') }}
                                                    </span>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd">Modifier votre profil</button>
                                </div>
                                </div>
                                <div class="clearfix"></div>

                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            </form>

                        </div>
                    </div>
             
            </div>
        </div>
       <!-- USER PROFILE ROW END-->
    </div>
@endsection