<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style type="text/css">
        video {
            position: absolute;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
            background-size: cover;
            overflow: hidden;
        }

        .video-container {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            overflow: hidden;
            z-index:-1;
        }
    </style>
</head>


<div id="intro" class="bg-image vh-100 shadow-1-strong">
        <video style="min-width: 100%; min-height: 100%;" playsinline autoplay muted loop>
            {{-- lineas --}}
            {{-- <source class="h-100" src="https://mdbootstrap.com/img/video/Lines.mp4" type="video/mp4" /> --}}
            {{-- poligonos --}}
            <source class="h-100" src="{{ asset('media/videos/background.mp4') }}" type="video/mp4" />
        </video>
        {{-- <div class="mask"     style="
        background: linear-gradient(
          45deg,
          rgba(29, 236, 197, 0.7),
          rgba(91, 14, 214, 0.7) 100%
        );
        "> --}}
        <div class="mask" style="
            background: linear-gradient(
              45deg,
              rgba(5, 75, 122, 0.2),
              rgba(0, 146, 244, 0.7) 100%
            );
        ">

        <div class="d-flex justify-content-center align-items-center vh-100">

            @yield('content')

            {{-- <div class="video-container">
                <video playsinline="playsinline" autoplay muted="muted" loop>
                    <source src="{{ asset('media/videos/background.mp4') }}" type="video/mp4">
                </video>
                <div id="SITE_BACKGROUND_currentOverlay_vud64" style="position:fixed;top:0;width:100%;height:100%;background-image:{{ asset('media/pattern/bkg_pattern.png') }};background-color:rgba(21, 52, 219, 0.2);background-attachment:fixed;" class="siteBackgroundcurrentOverlay" data-reactid=".0.$SITE_BACKGROUND.$vud64.2"></div>
            </div> --}}
        </div>

    </div>
</div>