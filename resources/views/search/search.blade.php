@extends('layouts.app')
@section('content')
<script>
var postIndexPage=document.getElementById('postIndexPage').innerHTML;
var p=para.substr(0,2)+"..."; 
alert(p);

</script>
	@if($annonces->count())
		@foreach($annonces as $annonce)
			<div class="well">
		      <div class="media">
		      	<a class="pull-left" href="#">
		    		<img class="media-object" src="{{ asset('img/avatar/emptyavatar.png') }}" height="100" width="100">
		  		</a>
		  		<div class="media-body">
		    		<h4 class="media-heading">{{$annonce->titre}} - <small>{{$annonce->zones->city}}</small></h4>
		          Posté par <a href="/profil/{{$annonce->user->name}}">{{ $annonce->user->name}} </a>({{$annonce->user->roles->first()->name}})
		          
		          <p id="truncatetext_post">{!! nl2br(e($annonce->contenu)) !!}</p>
		          <ul class="list-inline list-unstyled">
		  			<li><span><time>{{$annonce->created_at->diffForHumans()}}</time></span></li>
		            <li>|</li>
		            <span><a href="{{route('annonce.show', $annonce)}}">Voir plus</a></span>

					</ul>
		       </div>
		    </div>
		  </div>
				
			@endforeach
		@else
		<p>aucune annonce ne correspond à votre recherche</p>
		@endif

		

				
@endsection
