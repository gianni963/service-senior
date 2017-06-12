@extends('layouts.app')

@section('content')
	<div class="container">

		<div class="page-header">

			
		</div>
		     <!-- USER PROFILE ROW STARTS-->
               <div class="col-md-3 col-sm-3">
                                   
                <div class="user-wrapper">
                    <img src="{{ asset('img/avatar/emptyavatar.png') }} " class="img-responsive" /> 
	                <div class="description">
	                	
	                   <h4>{{$profileUser->name}} ({{$profileUser->roles->first()->name}}) </h4>
	                    
                       
			            	{{$profileUser->firstname}}
			            	{{$profileUser->lastname}}
				            
				       	<hr />
	                
	                </div>
                 </div>
                 
            </div>
            
            <div class="col-md-9 col-sm-9  user-wrapper">
                <div class="description">
                     <p>{{$profileUser->description}}</p>
                <hr />
                 
                <div class="card">
                        <div class="header">
                            <h4 class="title"></h4>
                        </div>
                        <div class="content">
     
                        </div>
                    </div>
             
            </div>

        </div>
       <!-- USER PROFILE ROW END-->
    </div>
	
	@foreach($annonces as $annonce)
		<div class="well">
			      <div class="media">
			      	<a class="pull-left" href="#">
			    		<img class="media-object" src="http://placekitten.com/150/150">
			  		</a>
			  		<div class="media-body">
			    		<h4 class="media-heading">{{$annonce->titre}}</h4>
			          <p class="text-right">Posté par {{ $annonce->user->name}}</p>
			          <p>{!! nl2br(e($annonce->contenu)) !!}</p>
			          <ul class="list-inline list-unstyled">
			  			<li><span><time>{{$annonce->created_at->diffForHumans()}}</time></span></li>
			            <li>|</li>
			            <span><a href="{{route('annonce.show', $annonce)}}">Voir plus</a></span>

						</ul>
			       </div>
			    </div>
			  </div>
		
	@endforeach

	{{$annonces->links()}}
</div>
@endsection