@extends('layouts.app')
@section('content')
<div class="wrapper">

		<div class="well">
	      <div class="media">
	  		<div class="media-body">
	    		<h4 class="media-heading">envoyé par: {{ $message->getSenderAttribute()->name }} à  @if(isset($message->getReceiverAttribute()->name))
                                
                                {{ $message->getReceiverAttribute()->name }}
                                            
                            @else 
                                Utilisateur inexistant
                            @endif 

	    		</h4>
	          <p class="text-right"> <span class="media-meta">{{$message->created_at}}</span></p>
	          <hr>
	          <p>{!! nl2br(e($message->message)) !!}</p>
	          <span class="media-meta">{{$message->created_at}}</span>
	          <ul class="list-inline list-unstyled">
	  			<li><span><time></time></span></li>
	            
	            

				</ul>
	       </div>
	    </div>
	  </div>
	  <a href="{{route('getMessagesSent')}}">Retour</a>

</div>
@endsection('content')