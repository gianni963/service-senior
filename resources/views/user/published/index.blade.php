@extends('layouts.app')

@section('content')
<h2>Mes annonces en lignes</h2>
@if($annonces->count())
		@foreach($annonces as $annonce)

		<div class="well">
	      <div class="media">
		      	<a class="pull-left" href="#">
		    		<img class="media-object" src="{{ asset('img/avatar/emptyavatar.png') }}" height="100" width="100">
		  		</a>
		  		<h4 class="media-heading">{{$annonce->titre}} @if($annonce->price) &nbsp;       {{$annonce->price}}&euro;/heure @endif</h4>
		
		  		<div class="media-body">
					
				<p class="text-left">Posté par {{ $annonce->user->name}}   {{$annonce->category->name}}</p>
		         
		          <p id="truncatetext_post">{!! nl2br(e($annonce->contenu)) !!}</p>
		          <ul class="list-inline list-unstyled">
		  			<li><span><time>{{$annonce->created_at->diffForHumans()}}</time></span></li>
		            <li>|</li>
		            <span><a href="{{route('annonce.show', $annonce)}}">Voir plus</a></span>

					</ul>
		       </div>
		       <ul class="list-inline">
				<li><a href="#" onclick="event.preventDefault(); document.getElementById('annonces_delete_form-{{ $annonce->id}}').submit();">Supprimer</a></li>
				<li><a href="{{ route('annonce.edit', $annonce) }}">Editer</a></li>
				</ul>
	    	</div>
  		</div>
 	<form action="{{ route('annonce.destroy', $annonce) }}" method="post" id="annonces_delete_form-{{ $annonce->id}}">

		{{csrf_field() }}
		{{ method_field('DELETE') }}

	</form>		
		@endforeach
@else
	<p>Aucune annonce publiée</p>
@endif
@endsection