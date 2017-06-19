@extends('layouts.app')
@section('content')
<div class="row">
	
		<div class="well">
	      <div class="media">
		      	<a class="pull-left" href="#">
		    		<img class="media-object" src="{{ asset('img/avatar/emptyavatar.png') }}" height="100" width="100">
		  		</a>
		  		<div class="media-body">
			    		<h4 class="media-heading">{{$annonce->titre}} - <small>{{$annonce->zones->city}}</small> @if($annonce->price) &nbsp;  {{$annonce->price}}&euro;/heure @endif</h4>
			          <p class="text-left">Posté par <a href="/profil/{{$annonce->user->name}}">{{ $annonce->user->name}} </a>({{$annonce->user->roles->first()->name}}) &nbsp; &nbsp;  Catégorie : {{$annonce->category->name}}</p>
      	         	 @unless($annonce->tags->isEmpty())
	          			<ul>
			          		@foreach ($annonce->tags as $tag)
			          		<li class="label label-default">{{ $tag->name }}</li>
		          			@endforeach
          				</ul>
	          		@endunless
			          <hr>
			          <p>{!! nl2br(e($annonce->contenu)) !!}</p>...
			          <ul class="list-inline list-unstyled">
			  			<li><span><time>{{$annonce->created_at->diffForHumans()}}</time></span></li>
			     

						</ul>
	       		</div>
    		</div>
	  </div>
	  <br>
	  <hr/>
    @if(Auth::check())

			@if($annonce->user->roles->first()->name == 'senior')

				

				

					
						<div class="row">
						    <div class="col-md-8 col-md-offset-2">
						        <div class="panel panel-default">
						            <div class="panel-heading">Réponde à cette annonce</div>
						            <div class="panel-body">

						            
						                <form action="{{ route('sendMessage', $annonce) }}" method="post">
						                        <div class="form-group{{ $errors->has('message') ? 'has-error': '' }}">
						                            <label for="message">Message</label>

						                            <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
						                            @if($errors->has('message'))
						                                <p class="help-block" style="color:red;">
						                                {{ $errors->first('message') }}
						                                </p>
						                            @endif
						                        </div>
						                        <div class="form-group">

						                            <button type="submit" class="btn btn-default">Envoyer</button>
						                            <span class="help-block">
						                                Envoi un email à {{$annonce->user->name}}, ainsi il pourra vous répondre
						                            </span>
						                        </div>
						                        {{ csrf_field() }}
						                    </form>
						            </div>
						        </div>
						    </div>
						</div>    
							
				
			@endif

			@if($annonce->user->roles->first()->name == 'prestataire')

			

				@if(auth()->user()->hasRole('senior'))

				


					<div class="row">
					    <div class="col-md-8 col-md-offset-2">
					        <div class="panel panel-default">
					            <div class="panel-heading">Réponde à cette annonce</div>
					            <div class="panel-body">


					                <form action="{{ route('sendMessage', $annonce) }}" method="post">
					                        <div class="form-group{{ $errors->has('message') ? 'has-error': '' }}">
					                            <label for="message">Message</label>

					                            <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
					                            @if($errors->has('message'))
					                                <p class="help-block" style="color:red;">
					                                {{ $errors->first('message') }}
					                                </p>
					                            @endif
					                        </div>
					                        <div class="form-group">

					                            <button type="submit" class="btn btn-default">Envoyer</button>
					                            <span class="help-block">
					                                Envoi un email à {{$annonce->user->name}}, ainsi il pourra vous répondre
					                            </span>
					                        </div>
					                        {{ csrf_field() }}
					                    </form>
					            </div>
					        </div>
					    </div>

						</div>
		    	@endif
		    	
		    @endif
    @else

    <p><a href="{{route('login')}}">Se connecter</a> pour répondre à une ànnonce<p>

	@endif
</div>

@endsection('content')