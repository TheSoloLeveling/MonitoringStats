<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300&family=Source+Sans+Pro:wght@300&display=swap');

        nav {
            position: absolute;
            top: 70px;
            width: 770px;
            height: 50px;
            background: #d8e2dc;
            border-radius: 8px;
            font-size: 0;
            box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .1);
            min-width: 200px;
        }

        nav a {
            font-size: 15px;
            text-transform: uppercase;
            color: black;
            text-decoration: none;
            line-height: 20px;
            position: relative;
            z-index: 1;
            display: inline-block;
            text-align: center;
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: bold;
        }

        nav .animation {
            position: absolute;
            height: 48px;
            top: 0;
            border: 1px solid #264653;
            box-shadow: 0 2px 3px 0 rgba(148, 148, 148, 0.5);
            border-radius: 8px;
        }

        a:nth-child(1) {
            width: 100px;
            
        }

        nav .start-home,
        a:nth-child(1):hover~.animation {
            width: 100px;
            left: 0;
        }

        a:nth-child(2) {
            width: 110px;
        }

        nav .start-about,
        a:nth-child(2):hover~.animation {
            width: 110px;
            left: 100px;
        }

        a:nth-child(3) {
            width: 100px;
        }

        nav .start-blog,
        a:nth-child(3):hover~.animation {
            width: 100px;
            left: 210px;
        }

        a:nth-child(4) {
            width: 160px;
        }

        nav .start-portfolio,
        a:nth-child(4):hover~.animation {
            width: 160px;
            left: 310px;
        }

        a:nth-child(5) {
            width: 100px;
        }

        nav .start-contact,
        a:nth-child(5):hover~.animation {
            width: 118px;
            left: 470px;
        }
        .navbar-brand{
            padding-bottom: 500px;
        }

 </style>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  
</head>
<body>
    
    <div id="app">
       
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="containern">
                @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                
                            @if (Route::has('login'))
                              
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            
                            @endif

                            @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <div class ="animation start-home"></div> 
                </div>
        
            

        </nav>
      
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
