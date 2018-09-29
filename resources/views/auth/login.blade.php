@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">{{ __('Login') }}</h1>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf

                    
                    <div class="form-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="email">{{ __('E-mail') }}</label>

                            <input id="email" type="email" placeholder="{{ __('E-mail') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        @if ($errors->has('email'))
                            <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="form-group floating-label-form-group controls">
                            <label for="password">{{ __('Senha') }}</label>

                            <input id="password" type="password" placeholder="{{ __('Senha') }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>

                           
                        </div>
                        @if ($errors->has('password'))
                            <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-4">

                            <div class="form-group">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Login') }}
                                </button>   
                            </div>
                        </div>

                        <div class="col-sm-8 mx-auto">
                            <div class="form-group">
                                <a class="btn btn-link float-right" href="{{ route('password.request') }}">
                                    {{ __('Esqueceu sua senha?') }}
                                </a>
                                <a class="btn btn-link float-right mr-5" href="{{ route('register') }}">
                                    {{ __('Cadastre-se') }}
                                </a>
                            </div>
                        </div>
                    </div>
                   
                    

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
