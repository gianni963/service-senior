<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Service-Senior
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
  
            <div class ="col-xs-3" style="margin-top: 7px;">
            <form method="get" action ="{{route('search')}}">
                <input type="text"  name="search" id="search" class="form-control" placeholder="recherche une annonce"> 
                 
            </form> 
            </div>   
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Se connecter</a></li>
                    <li><a href="{{ route('register') }}">Créer un compte</a></li>
                @else

                    @if(auth()->user()->hasRole('admin'))
                        
                        <li>

                            <a href="{{ route('admin.index') }}">Admin</a>

                        </li>

                    @endif

                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Annonces <span class="caret"></span>
                    </a>
                

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('annonces.unpublished.index') }}">annonces non publiées</a>
                            </li>

                            <li>
                                <a href="{{ route('annonces.published.index') }}">mes annonces</a> 
                            </li>

                            <li>

                                <a href="{{ route('annonce.create') }}">Poster une annonce</a>

                            </li>

                        </ul>
                    </li>

                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Messagerie<span class="caret"></span>
                    </a>
                

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('getReceivedMessages') }}">Messages</a>
                            </li>

                            <li>
                                <a href="{{ route('getNewMessages') }}">Nouveau(x) message(s)</a>
                            </li>

                        </ul>

                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('dashboard.index') }}">
             
                                    profil
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>



                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>