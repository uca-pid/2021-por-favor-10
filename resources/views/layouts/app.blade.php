<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- <script src="{{ asset('js/fullcalendar.js') }}"></script> --}}
    <script src="{{ asset('js/fullcalendar.bundle.js') }}"></script>
    {{-- <script src="{{ asset('js/es.js') }}"></script> --}}
    <script src="{{ asset('js/fullCalendarLocale/es.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> --}}
{{--     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/fullcalendar.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.bundle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fullcalendar.bundle.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <script src="{{ asset('js/moment-with-locales.min.js') }}"></script>

    <link href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>


    {{-- fontawesome --}}
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    <script type="text/javascript">
        $(document).ready(function () {
            var url = window.location;
            // $('ul.nav li.nav-item a[href="'+ url +'"]').parent().addClass('active');
            $('ul.nav li.nav-item a.nav-link').filter(function() {
                 return this.href == url;
            }).addClass('active');

            $('ul.nav li.nav-item a.dropdown-item').filter(function() {
                 return this.href == url;
            }).css('color', '#3490dc');
            $('ul.nav li.nav-item a.dropdown-item').filter(function() {
                 return this.href == url;
            }).parent().parent().children('.dropdown-toggle').addClass('active');


            // $('.select2').select2();
        });
    </script>

    <style type="text/css">
        .nav .nav-item a.nav-link {
            color: white !important;
        }
        ul.nav li.nav-item {
            margin-right: 5px !important;
        }

        video {
            position: absolute;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -2;
            background-size: cover;
            /*overflow: hidden;*/
        }
    </style>

    <nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: #002a3e !important;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img
                    src="{{ asset("media/logos/hercules blanco.png") }}"
                    height="25"
                    alt=""
                    loading="lazy"
                />
                Hércules
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="nav nav-success nav-pills mr-auto">
                    {{-- <li class="nav-item">
                        <a class="nav-link" id="profile-tab-1" href="{{ route('clases') }}" aria-controls="profile">
                            <span class="nav-icon">
                                <i class="fas fa-home"></i>
                            </span>
                            <span class="nav-text">Clases</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="modify" href="{{ route('usuariosClases') }}" aria-controls="modify">
                            <span class="nav-icon">
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="nav-text">UAC</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="modify" href="{{ route('modificar') }}" aria-controls="modify">
                            <span class="nav-icon">
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="nav-text">Modificar</span>
                        </a>
                    </li> --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="nav-icon">
                                <i class="fas fa-school"></i>
                            </span>
                            <span class="nav-text">Clases</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('clases') }}">
                                <span class="nav-icon">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                                <span class="nav-text">Calendario</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('modificar') }}">
                                <span class="nav-icon">
                                    <i class="far fa-edit"></i>
                                </span>
                                <span class="nav-text">Modificar</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('usuariosClases') }}">
                                <span class="nav-icon">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="nav-text">UAC</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('estadisticasClases') }}">
                                <span class="nav-icon">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="nav-text">Estadísticas</span>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="modify" href="{{ route('rutinas') }}" aria-controls="modify">
                            <span class="nav-icon">
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="nav-text">Rutinas</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="modify" href="{{ route('ejercicios') }}" aria-controls="modify">
                            <span class="nav-icon">
                                <i class="fas fa-dumbbell"></i>
                            </span>
                            <span class="nav-text">Ejercicios</span>
                        </a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav nav-success navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="nav-icon">
                                    <i class="fas fa-user"></i>
                                </span>
                                <span class="nav-text">{{ Auth::user()->name }}</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
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
</head>
<header>
    <div id="video-background">
        <video style="min-width: 100%; min-height: 100%;" playsinline autoplay muted loop>
            <source class="h-100" src="{{ asset('media/videos/background.mp4') }}" type="video/mp4" />
        </video>
        <div class="mask" style="
            background: linear-gradient(
              45deg,
              rgba(5, 75, 122, 0.2),
              rgba(0, 146, 244, 0.7) 100%
        );
        z-index: -1;
        position: absolute;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        background-size: cover;
        right: 0;
        bottom: 0;
        overflow: hidden;
        ">
        </div>
    </div>
</header>
<body style="overflow-x: hidden; scroll-behavior: smooth;">
    @include('partials.page_loader')
    @include('partials.alertMessages')
    <div class="container-fluid overflow-auto">
        {{-- <div id="video-background">
            <video style="min-width: 100%; min-height: 100%;" playsinline autoplay muted loop>
                <source class="h-100" src="{{ asset('media/videos/background.mp4') }}" type="video/mp4" />
            </video>
            <div class="mask" style="
                background: linear-gradient(
                  45deg,
                  rgba(5, 75, 122, 0.2),
                  rgba(0, 146, 244, 0.7) 100%
            );
            z-index: -1;
            position: absolute;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            background-size: cover;
            right: 0;
            bottom: 0;
            overflow: hidden;
            ">

            </div>
        </div> --}}
        <div style="max-width: 100%; max-height: 100%;">
            @yield('content')
        </div>
    </div>
</body>
</html>
