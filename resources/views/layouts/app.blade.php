<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'H-desk') }}</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
   <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

   <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> --> 

<style>
body{
    padding-top: 70px;
    padding-bottom: 30px;
}
form{
    display:inline;
}
/* Style for news card*/
.card{
  height: 300px;
  width: 200px;
  border-radius: 5px;
  background-color: #ecf0f1;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  float: left;
  margin-left: 20px;
  margin-top: 20px;
}
.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.card-head img{
  height: 150px;
  width: 200px;
  border-radius: 5px 5px 0 0;
}
.card-content{
  padding-left: 10px;
  height: 32%;
}
#title-card{
    color: #3d3d3d;
}
.news-but{
    margin-left: 10px;
}

/*Style for schedule card*/

.schedule-card{
    height: 200px;
    width: 205px;
    border-radius: 5px;
    background-color: #E1F5FE;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    float: left;
    margin-left: 20px;
    margin-top: 20px;
}
.schedule-card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.schedule-content{
    font-family: 'Roboto', sans-serif;
    vertical-align: middle;
    text-align: center;
    margin: 13px;
    height: fit-content;

}
.schedule-head{
    background-color: #77C6DF;
    border-radius: 5px 5px 0 0;
    padding: 2px 7px;
    text-align: center;
}

/*Style for schedule-today card*/

.schedule-card-today{
    height: 132px;
    font-size: 11px;
    width: 165px;

    border-radius: 5px;
    background-color: #EEEEEE;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    float: left;
    /*margin-left: 20px;*/
    margin-top: 7px;
}
.schedule-card-today:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.schedule-content-today{
    font-family: 'Roboto', sans-serif;
    vertical-align: middle;
    text-align: center;
    margin: 5px;
    height: fit-content;

}
.schedule-head-today{
    background-color: #4CAF50;
    border-radius: 5px 5px 0 0;
    padding: 2px 7px;
    text-align: center;
}


</style>
</head>
<body style="background-color: #EEEEEE;">
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #3498db;">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}" style="color:black;">
                        {{ config('app.name', 'H-desk') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}" style="color:black;">Войти</a></li>
                            <li><a href="{{ route('register') }}" style="color:black;">Регистрация</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" style="position:relative; padding-left:50px; color:black;">
                                    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style=" width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%; color:black;">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Выйти
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                    <li>
                                        <a href="{{ route('profile') }}">
                                            Профиль
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        </div>

        @yield('content')
    </div>


    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->

    
</body>
</html>
