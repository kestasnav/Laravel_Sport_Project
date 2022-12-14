<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/dcbeebf121.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sono:wght@200;400&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm navbackground">
            <div class="container">
                <a class="navbar-brand" href="{{ route('posts.index') }}">
{{--                    {{ config('app.name', 'Laravel') }}--}}
                    <img src="{{ asset('storage/images/'.'logo2.png')}}" style=" width: 100px; height: 70px;">

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
{{--                    <span class="navbar-toggler-icon"></span>--}}
                    <i class="fa-solid fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto ">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white"  href="{{ route('basketball') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{__('Krep??inis')}}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('basketball') }}"><i class="fa-solid fa-basketball"></i> {{__('Visos krep??inio naujienos')}}</a></li>

                                <li><a class="dropdown-item" href="{{ route('euroleague') }}">
                                        <img class="logos1" src="https://2img.net/h/www.webdesign.org/img_articles/16849/euroleague.jpg">
                                        {{__('Eurolyga')}}</a></li>

                                        <li><a class="dropdown-item" href="{{ route('nba') }}">
                                                <img class="logos1" src="https://raw.githubusercontent.com/detain/svg-logos/master/svg/nba-6.svg">
                                                 NBA</a></li>

                                <li><a class="dropdown-item"  href="{{ route('lkl') }}">
                                        <img class="logos1" src="https://lietuvai.lt/w/thumb.php?f=LKL_logo.svg&width=200">
                                        LKL</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{__('Futbolas')}}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('football') }}"><i class="fa-regular fa-futbol"></i> {{__('Visos futbolo naujienos')}}</a></li>

                                <li><a class="dropdown-item" href="{{ route('wc2022') }}">
                                        <img class="logos1" src="https://cdn.cdnlogo.com/logos/f/95/fifa-world-cup-2022.svg">
                                        {{__('Pasaulio ??empionatas 2022')}}</a></li>
                                <li><a class="dropdown-item" href="{{ route('premier') }}">
                                        <img class="logos1" src="https://cdn.staticaly.com/img/2.bp.blogspot.com/-wwKihMONlqI/V8j2VMBCXHI/AAAAAAAAKcs/6alqAxZHL9UTGaKwTNYrQXFWbroiq4DiQCLcB/w991/2016-17-premier-league-sleeve-patch-2.jpg">
                                        {{__('Anglijos Premier lyga')}}</a></li>
                                <li><a class="dropdown-item" href="{{ route('lithuania') }}">
                                        <img class="logos1" src="https://seeklogo.com/images/L/lietuvos-futbolo-federacija-logo-B63328A548-seeklogo.com.gif">
                                        {{__('Lietuvos futbolas')}}</a></li>

                                <li><a class="dropdown-item"  href="{{ route('champions') }}">
                                        <img class="logos1" src="https://cdn.cdnlogo.com/logos/u/86/uefa-champions-league.svg">
                                        {{__('??empion?? lyga')}}</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{__('El. Parduotuv??')}}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('products.index') }}"><i class="fa-solid fa-shop"></i> {{__('El. Parduotuv??')}}</a></li>
                                <li><a class="dropdown-item" href="{{ route('cart') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        {{__('Krep??elis')}}</a></li>
                                <li><a class="dropdown-item" href="{{ route('user.orders') }}"><i class="fa-solid fa-bag-shopping"></i></i>
                                        {{__('Mano u??sakymai')}}</a></li>
                            </ul>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <form class="input-group" method="post" {{ route('find.post') }}"  >
                                @csrf
                            @method('GET')
                            <input class="form-control" type="search" name="search" placeholder="{{__('Paie??kos tekstas')}}">
                                <button class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('setLanguage', 'lt') }}"><i class="flag flag-lithuania"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('setLanguage', 'en') }}"><i class="flag flag-united-kingdom"></i></a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Prisijungti') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Registruotis') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} {{ Auth::user()->surname }}
                                </a>


                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    @can('admin_user')
                                    <a class="dropdown-item" href="{{ route('admin') }}">{{ __('Administratoriaus panel??') }}</a>
                                    @endcan
                                        <a class="dropdown-item" href="{{ route('comments.index') }}">{{ __('Komentarai') }}</a>

                                <a class="dropdown-item" href="{{ route('profileEdit', Auth::user()->id) }}">{{ __('Profilio redagavimas') }}</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Atsijungti') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container containerbg pb-1">

            @yield('content')

        </div>

    </div>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 navfooter">
        <div class="col-md-4 d-flex align-items-center">
            <span class="mx-5 mb-md-0 text-muted">?? 2022 Sport Project</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex mx-5">
            <li class="ms-3"><a class="text-muted" href="#"><i class="fab fa-linkedin"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-facebook"></i></a></li>
            <li class="ms-3"><a class="text-muted" href="#"><i class="fa-brands fa-github"></i></a></li>
        </ul>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
</body>

</html>
