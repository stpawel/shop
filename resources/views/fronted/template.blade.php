<!DOCTYPE html>
<html>
    <head>
        <title>Księgarnia</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ URL::asset('css/fronted.css') }}">
    </head>
<body>
    <div id="container">
        <header>  
        </header>
        <nav id="menu">
        @guest
            <ul>
                <li><a href="{{ URL::to('login') }}">Zaloguj się</a></li>
                <li><a href="{{ URL::to('konto/rejestracja') }}">Rejestracja</a></li>
            </ul> 
        @endguest
        @auth
            <ul>
                <li>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                </li><li>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                </li>
                <li><a href="{{ URL::to('profil') }}">Profil</a></li>
                <li><a href="{{ URL::to('haslo') }}">Hasło</a></li>
                <li><a href="{{ URL::to('zamowienia') }}">Zamówienia</a></li>
                <li><a href="{{ URL::to('category') }}">Admin</a></li>
            </ul> 
        @endauth
        </nav>        
        <nav id="submenu">
            <ul>
                <li><a href="{{ URL::to('ksiazki') }}">Ksiażki</a></li>
                <li><a href="{{ URL::to('koszyk') }}">Koszyk</a></li>
            </ul>    
        </nav>
        
        <div class="clear"></div>
        <div class="line"></div>
        
        @yield('content')
        
        <footer>
        </footer>
    </div>          
</body>
</html>
    
    
    

