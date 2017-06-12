@extends('layouts.app')

@section('content')

<h2>Suppression de compte:</h2>
	<div class="container">
		<div class="col-md-8">
			<form action="{{ route('deleteAccount') }}" method="post">

			 	<div class="form-group">
		            <label for="contenu" class="control-label">Raison:</label>
		            <textarea name="raison" id="contenu" cols="15" rows="8" class="form-control"></textarea>

		        </div>
		        <div class="form-group">
                        <button type="submit" class="btn btn-default">Poster</button>
                </div>
                {{ csrf_field() }}
			</form>
		</div>
	</div>


@endsection
