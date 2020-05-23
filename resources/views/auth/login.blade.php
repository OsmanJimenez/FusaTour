@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="text-center">
                    <h3 class="card-title font-weight-bold">Bienvenido!</h3>
                    <h5 class="card-title font-weight-normal">Inicia Sesión</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <img src="images/login.png" class="rounded mx-auto d-block" alt="..." style="width: 70%;" >
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border border-success" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border border-success" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link float-right" href="{{ route('password.request') }}">
                                        {{ __('Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 text-center">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Iniciar Sesión') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4 text-center">
                                <label class="col-md-4 col-form-label text-md-right">¿No tienes una cuenta? <a class="text-decoration-none " href="{{ route('register') }}">{{ __('Registrate') }}</a></label>
                               
                                
                                                               
                            </div>
                        </div>
                    </form>
                </div>
            
        </div>
    </div>
</div>
@endsection
