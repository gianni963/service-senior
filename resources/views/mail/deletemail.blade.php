<p>L'utilisateur {{$user->name}} ({{$user->email}}) a fait une demande de suppression de compte</p>

<h2>Raison:</h2>

{!! nl2br(e($raison)) !!}