@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-5 bg-white">
                {{-- <div class="card-header text-center">{{ __('Login') }}</div> --}}

                <div class="card-body row justify-content-center">

                    <div class="col-xs-10 col-sm-9 col-md-8 col-lg-7 col-xl-6 text-center">
                        {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image"> ./resources/images/4.png--}}
                        <img src="{{asset('./images/4.png')}}" alt="Imagen de referencia para el login" width="350" class="">
                    </div>

                    <div class="col-xs-10 col-sm-9 col-md-8 col-lg-5 col-xl-6">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- xs <576px	 sm≥576px	md≥768px	lg≥992px	xl≥1200px	xxl≥1400px -->

                            <div class="row mb-3">
                                <label for="email" class="col-xs-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-xs-start text-md-start text-lg-start text-xl-start">{{ __('Correo electrónico') }}</label>

                                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-xs-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-xs-start text-md-start text-lg-start text-xl-start">{{ __('Contraseña') }}</label>

                                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Recordar') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0 text-center">
                                <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
                                    <button type="submit" class="btn btn-primary"  style="background-color:#6610f2;">
                                        {{ __('Iniciar sesión') }}
                                    </button>

                                    <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('¿Olvidaste tu contraseña?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
