@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($messages as $message)

                <div class="col-md-4">
                    <h5>Concerne : {{ $message->annonce->titre }}</h5>
                    <hr>
                    <h5>Expéditeur: {{ $message->getSenderAttribute()->name }}</h5>
                    <h5>Receveur: {{ $message->getReceiverAttribute()->name }}</h5>
                   <p>{{ $message->message }}</p>
                </div>
            @endforeach
        </div>
    </div>

@endsection