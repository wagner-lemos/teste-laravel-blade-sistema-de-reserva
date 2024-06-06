@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">{{ __('Acessar conta') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="row">
                        @csrf

                        <div class="row mb-3 d-flex justify-content-center">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-xl-6">
								<label for="email" class="col-form-label">{{ __('Seu E-mail') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3 d-flex justify-content-center">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 col-xl-6">
								<label for="password" class="col-form-label">{{ __('Sua Senha') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 d-flex justify-content-center">
                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Lembrar-me') }}
                                    </label>
                                </div>
								@if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Esqueceu sua senha?') }}</a>
                                @endif
                            </div>
							<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 py-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Acessar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
