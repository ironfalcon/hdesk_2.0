<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">

    <!-- Scripts -->

</head>
<body>
<div id="app">

<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/home') }}">
        {{ config('app.name', 'H-desk') }}
    </a>

    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="nav-item dropdown">
                                
                                    
                                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style=" width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%;">
                                {{ Auth::user()->name }}
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a>
                                 <a class="dropdown-item" href="#">Link 2</a>
                                <a class="dropdown-item" href="#">Link 3</a>
                                    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                </form>   

                                        <a  class="dropdown-item" href="{{ route('profile') }}">
                                            Profile
                                        </a>
                                    
                                
                            </li>
                        @endguest
                    </ul>
  </div>
</nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>