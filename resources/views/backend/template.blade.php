<!DOCTYPE html>
<html>
    <head>
        <title>Mini - CMS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ URL::asset('css/backend.css') }}">
        <script src="{{ URL::asset('js/jquery.js') }} "></script>
        <script src="{{ URL::asset('js/main.js') }} "></script>
        <script src="{{ URL::asset('ckeditor/ckeditor.js') }}"></script>

    </head>
<body>
    <div id="container">
        <header>
            <div class="dropdown-menu dropdown-menu-right logout" aria-labelledby="navbarDropdown">
                Wyloguj:<a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                         {{ __(Auth::user()->name) }}
                                    </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                </form>
            </div>
                            
            
        </header>
        <nav id="main_menu">
            <ul>
                <li><a href="{{ URL::to('category') }}">Kategoria</a></li>
                <li><a href="{{ URL::to('book') }}">Książki</a></li>
                <li><a href="{{ URL::to('order') }}">Zamówienia</a></li>
            </ul>    
        </nav>
        
        @yield('content')
        
        <footer>
        </footer>
    </div>          
</body>
</html>
    
    
    

