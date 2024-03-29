
<!DOCTYPE html>
<html lang="en">
<head>
<title>{{ config('app.name') }} - @yield('title')</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style> 
    .navbar {
        margin-bottom: 50px;
        border-radius: 0;
    }
    
    .jumbotron {
        margin-bottom: 0;
    }

    /* Add a gray background color and some padding to the footer */
    footer {
        background-color: #f2f2f2;
        padding: 25px;
    }
</style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Laravel-TP2</h1>      
    <p>Fabien Turgeon</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('user.index') }}">{{ __('Home') }}</a></li>
                <li><a href="{{ route('users.register') }}">{{ __('Registration') }}</a></li>
                <li><a href="{{ route('users.index') }}">{{ __('Student') }}</a></li>
                <li><a href="{{ route('ville.index') }}">{{ __('City') }}</a></li>
                <li><a href="{{ route('article.index') }}">{{ __('Forum') }}</a></li>
                <li><a href="{{ route('document.index') }}">{{ __('Document') }}</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li >
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if(App::getLocale() == 'en')
                            {{ __('English') }}
                        @else
                            {{ __('French') }}
                        @endif
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(App::getLocale() == 'en')
                            <a class="dropdown-item" href="{{ route('lang', 'fr') }}">{{ __('French') }}</a>
                        @else
                            <a class="dropdown-item" href="{{ route('lang', 'en') }}">{{ __('English') }}</a>
                        @endif
                    </div>
                </li>
                @guest
                    <li><a href="{{ route('login') }}">@lang('Login')</a></li>
                @else
                    <li><a href="{{ route('users.show', Auth::user()->id) }}">{{ Auth::user()->nom }}</a></li>
                    <li><a href="{{ route('logout') }}">@lang('Logout')</a></li>
                @endguest
            </ul>

        </div>
    </div>
</nav>


    <div class="container d-flex align-items-center">
    @yield('content')
    </div>

    <footer class="footer-light bg-light">
        <div class="container text-center">
            &copy; {{ date('Y') }} {{ config('app.name') }}. Fabien Turgeon.
        </div>
    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
</html> 