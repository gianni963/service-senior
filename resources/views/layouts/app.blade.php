<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('layouts.partials.head')
</head>
<body>
    <div id="app">
       
        @include('layouts.partials.navigation')
	    
	    <div class="container"> 
            @include('layouts.partials.alerts')    
	        @yield('content')
        </div>
    </div>

    <!-- Scripts -->


     @include('layouts.partials.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/core.js" ></script>

     <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSMMteZSEl91PlvVZIOq6xLezTX5DoLgQ&libraries=places"></script>
    <script src="{{ asset('js/app.js') }}"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> 
    <script src="{{ asset('js/post.js') }}"></script>
    </script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSMMteZSEl91PlvVZIOq6xLezTX5DoLgQ&libraries=places&callback=initAutocomplete"
        async defer></script>
        </body> -->
</html>
