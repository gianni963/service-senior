@extends('layouts.app')
@section('content')
<script>
var postIndexPage=document.getElementById('postIndexPage').innerHTML;
var p=para.substr(0,2)+"..."; 
alert(p);

</script>

	@if($annonces->count())
		<div class="col-md-6">
			<a href="{{route('annonces.prestataires', $annonces)}}" class="btn btn-info" role="button">prestataire</a>
		</div>
		<div class="col-md-6">
			<a href="{{route('annonces.seniors', $annonces)}}" class="btn btn-info" role="button">senior</a>
		</div>
		<br/>
		<hr/>
		@foreach($annonces as $annonce)

		@if($annonce->user->roles->first()->name == 'senior')
			<div class="well">
		      <div class="media">
		      	<a class="pull-left" href="#">
		    		<img class="media-object" height="100" width="100" src="{{ asset('img/avatar/emptyavatar.png') }}">
		  		</a>
		  		<div class="media-body">
		    		<h4 class="media-heading">{{$annonce->titre}} - <small>{{$annonce->zones->city}}</small>  @if($annonce->price) &nbsp;       {{$annonce->price}}&euro;/heure @endif</h4>
		          Posté par <a href="/profil/{{$annonce->user->name}}">{{ $annonce->user->name}} </a> ({{$annonce->user->roles->first()->name}}) - <strong>recherche {{$annonce->category->name}}</strong>
		          
		          <p id="truncatetext_post">{!! nl2br(e($annonce->contenu)) !!}</p>
		          <ul class="list-inline list-unstyled">
		  			<li><span><time>{{$annonce->created_at->diffForHumans()}}</time></span></li>
		            <li>|</li>
		            <span><a href="{{route('annonce.show', $annonce)}}">Voir plus</a></span>

					</ul>
		       </div>
		    </div>
		  </div>
			@endif
		@endforeach

		{{$annonces->links()}}	
	@else
		<p>Aucune annonce disponible</p>
	@endif
				
@endsection