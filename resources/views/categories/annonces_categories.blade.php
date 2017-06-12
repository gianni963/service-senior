@extends('layouts.app')
@section('content')


	@if($annonces->count())
		@foreach($annonces as $annonce)

			<div class="wrapper">
				<div class="media-body">
					<h5><strong><a href="{{route('annonce.show', $annonce)}}">{{$annonce->titre}}</a></strong></h5>
					
					<p>
					@foreach($annonce->tags as $tag)
						<a href="#" class="badge badge-default">{{ $tag->name }}</a>
					@endforeach

					<ul class="list-inline">
						<li><time>{{$annonce->created_at->diffForHumans()}}</time></li>
						<li>{{ $annonce->user->name}}</li>
					</ul>

				
				</div>
			</div>
		@endforeach
	@else
		<p>Aucune annonce disponible</p>
	@endif
@endsection