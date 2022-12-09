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

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="main">

    <nav class="navbar navbar-expand-md navbar-light shadow-sm ">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{--                    {{ config('app.name', 'Laravel') }}--}}
                <h5>Admin dashboard</h5>

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                {{--                    <span class="navbar-toggler-icon"></span>--}}
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto ">

                    <li class="nav-item ">


                            <li><a class="nav-link" href="{{ route('admin.posts') }}">{{__('Visos naujienos')}}</a></li>

                            <li><a class="nav-link" href="{{ route('admin.users') }}">{{__('Vartotojai')}}</a></li>

                            <li><a class="nav-link" href="{{ route('admin.comments') }}">{{__('Komentarai')}}</a>

                            <li><a class="nav-link" href="{{ route('productcategories.index') }}">{{__('Produktų kategorijos')}}</a></li>

                    <li><a class="nav-link" href="{{ route('products') }}">{{__('Produktai')}}</a></li>



                    </li>



                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">

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
                                <a class="nav-link " href="{{ route('login') }}">{{ __('Prisijungti') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('register') }}">{{ __('Registruotis') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} {{ Auth::user()->surname }}
                            </a>


                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                @if(Auth::user()->type == 'superadmin')
                                    <a class="dropdown-item" href="{{ route('admin.posts') }}">{{ __('Administratoriaus panelė') }}</a>
                                @endif
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

    <div class="container">

        @yield('content')

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</body>

</html>

