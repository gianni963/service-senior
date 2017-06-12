@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Répondre à cette annonce</div>
            <div class="panel-body">
                <form action="{{ route('sendMessage', $annonce) }}" method="post">
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
                                Envoi un email à {{$annonce->user->name}}, ainsi il pourra vous répondre
                            </span>
                        </div>
                        {{ csrf_field() }}
                    </form>
            </div>
        </div>
    </div>

</div>

@endsection