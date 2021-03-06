@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img src="{{ asset("media/logos/Hércules Logo.png") }}" class="card-img-top" alt="Hércules GYM">
                <div class="card-header" style="padding-bottom: 0;">
                    <h5 class="card-title text-muted">Confirmar contraseña</h5>
                </div>

                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Necesita confirmar su contraseña para continuar</h6>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Confirmar contraseña
                                </button>

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
        </div>
    </div>
</div>
@endsection
