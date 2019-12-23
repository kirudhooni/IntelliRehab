<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
        {{-- <top-bar :model ="{{Auth::user()}}">IntelliRehab</top-bar> --}}
        <div>    
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <h1>IntelliRehab</h1>
                    </div>
                    <div class="d-flex flex-column text-muted"> 
            
                        <div>{{ Auth::user()->firstname }} {{  Auth::user()->lastname }}</div>
                        <div>{{ Auth::user()->level }}</div>
                        
                    </div>      
                </div>
            </nav>
        </div> 
        {{-- <side-bar></side-bar> --}}
        <div id="test" class= "sidebar-container">';
            <div class="w3-sidebar w3-bar-block w3-small  w3-center "  style="width:8%">
    
             <div > 
            <a href="{adminlink}" class="w3-bar-item w3-button w3-padding-large" >
            <i class="fa fa-home w3-xlarge"></i>
            <p>HOME</p>
            </a>
            </div>  
            
            <a href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-black" >
            <i class="fa fa-wheelchair w3-xlarge"></i>
            <p>PATIENT</p>
            </a>
    
            <a  href="{{route('admin')}}" class="w3-bar-item w3-button w3-padding-large w3-hover-black" >
            <i class="fa fa-cogs w3-xlarge"></i>
            <p>ADMIN</p>
            </a>
            
            <a  href="#" class="w3-bar-item w3-button w3-padding-large w3-hover-black" >
            <i class="fa fa-sign-out w3-xlarge"></i>
            <p>LOGOUT</p>
            </a>
            </div>				
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
