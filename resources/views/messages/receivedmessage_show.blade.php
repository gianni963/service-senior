@extends('layouts.app')
@section('content')
<div class="wrapper">


		<div class="well">
	      <div class="media">
	  		<div class="media-body">
	    		<h4 class="media-heading">
    				@if(isset($message->getSenderAttribute()->name))
		    			envoyé par: {{ $message->getSenderAttribute()->name }}
		    		@else
						utilisateur introuvale
					@endif
	    		</h4>
	          <p class="text-right"></p>
	          <hr>
	          <p>{!! nl2br(e($message->message)) !!}</p>
	          <ul class="list-inline list-unstyled">
	  			<li><span><time></time></span></li>
	            
	            

				</ul>
	       </div>
	    </div>
	  </div>
	  <a href="{{route('getMessagesSent')}}">Retour</a>

</div>


	@if(isset($message->getSenderAttribute()->name))
		<h2>répondre à cette annonce</h2>


			<div class="row">
			    <div class="col-md-8 col-md-offset-2">
			        <div class="panel panel-default">
			            <div class="panel-heading">Envoyer un message</div>
			            <div class="panel-body">


			                <form action="{{route('answerMessage', $message)}}" method="post">
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
			                                Répondre
			                            </span>
			                        </div>
			                        {{ csrf_field() }}
			                    </form>
			            </div>
			        </div>
			    </div>

				</div>
			@else

			<p"
			>Vous ne pouvez pas répondre car cet utilisateur n'existe plus</p>

			@endif
	</div>
</div>

@endsection('content')