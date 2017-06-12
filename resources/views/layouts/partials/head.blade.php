<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Service Senior</title>
<meta name="description" content="site de petites annonces et de srvices pour les séniors" />
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/servicesenior.css') }}" rel="stylesheet">
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
<link href="{{ asset('css/footer.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />



<!-- Scripts -->


<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
 
    </script>
