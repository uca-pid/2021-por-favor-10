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
        <div class="mask"     style="
        background: linear-gradient(
          45deg,
          rgba(29, 236, 197, 0.7),
          rgba(21, 52, 219, 0.2) 100%
        );
        ">

        <div class="d-flex justify-content-center align-items-center vh-100">

            <div class="card" style="max-width: 90%;">
                <img src="{{ asset("media/logos/Hércules Logo.png") }}" class="card-img-top" alt="Hércules GYM">
                {{-- <img src="{{ asset("media/logos/Hércules Logo Vertical.png") }}" alt="Hércules GYM"> --}}
                <div class="card-header" style="padding-bottom: 0;">
                    <h5 class="card-title text-muted">Inicio de sesión</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('e-mail') }}</label>
                            <div class="input-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ingresar') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-secondary" href="{{ route('password.request') }}">
                                        {{ __('Olvidé la contraseña') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- <div class="video-container">
                <video playsinline="playsinline" autoplay muted="muted" loop>
                    <source src="{{ asset('media/videos/background.mp4') }}" type="video/mp4">
                </video>
                <div id="SITE_BACKGROUND_currentOverlay_vud64" style="position:fixed;top:0;width:100%;height:100%;background-image:{{ asset('media/pattern/bkg_pattern.png') }};background-color:rgba(21, 52, 219, 0.2);background-attachment:fixed;" class="siteBackgroundcurrentOverlay" data-reactid=".0.$SITE_BACKGROUND.$vud64.2"></div>
            </div> --}}
        </div>

    </div>
</div>