@extends('layouts.auth')

@section('content')

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
                                {{-- <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                </div> --}}
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
                            <div class="col-md-12 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ingresar') }}
                                </button>

                                <a class="btn btn-link btn-hover text-muted" href="{{ route('register') }}">
                                    {{ __('Quiero registrarme') }}
                                </a>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-muted" href="{{ route('password.request') }}">
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

@endsection