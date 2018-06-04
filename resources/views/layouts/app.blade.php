<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="nav">
            <div class="nav-wrapper container">
                <a href="#!" class="brand-logo">
            <img src="https://s3.amazonaws.com/user-media.venngage.com/886726-773eede5fa40f61bb7020ccaea4bb480.png" height="35px"></img>
            </a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
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
                <ul class="sidenav" id="mobile-demo">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">Javascript</a></li>
                    <li><a href="mobile.html">Mobile</a></li>
                </ul>
            </div>
        </nav>
    </header>
    @yield('content')
    <footer>
        <div class="container">
            <div class="row">
                <div class="col s6"> <a class="youse-logo" title="Youse" href="https://www.youse.com.br"></a><img src="https://s3.amazonaws.com/user-media.venngage.com/886726-773eede5fa40f61bb7020ccaea4bb480.png" height="35px"></img> </div>
                <div class="col s6">
                    <div class="social-nav">
                        <ul class="social-nav-list">
                            <li class="item"><a class="link-social twitter" href="https://twitter.com/YouseSeguros" title="Twitter" target="_blank" rel="nofollow">Twitter</a></li>
                            <li class="item"><a class="link-social instagram" href="https://www.instagram.com/youse" title="Instagram" target="_blank" rel="nofollow">Instagram</a></li>
                            <li class="item"><a class="link-social linkedin" href="https://www.linkedin.com/company/youse-seguros" title="LinkedIn" target="_blank" rel="nofollow">LinkedIn</a></li>
                            <li class="item"><a class="link-social facebook" href="https://www.facebook.com/youse.com.br" title="Facebook" target="_blank" rel="nofollow">Facebook</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <p>Dúvidas ou problemas? Entre em contato com o suporte@youse.com.br</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>