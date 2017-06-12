Bonjour {{ $annonce->user->name }},<br>
<br>

{{ $body->getSenderAttribute()->name }} vous  a contacté à propos de votre annonce, <a href="{{ route('annonce.show', $annonce) }}">{{ $annonce->titre }}</a>.<br><br>


