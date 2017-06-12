@extends('layouts.app')

@section('content')
	<div class="container">
   
                    <strong><p class="montant">Montant à payer: {{ number_format(1) }} euro</p></strong>
                    <hr/>

                    <payform>...</payform>
                   
    </div>

@endsection