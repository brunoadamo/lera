@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">{{ __('Nova senha') }}</h1>

            <div class="card-body">
                <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

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
                        <div class="form-group floating-label-form-group controls">
                            <label for="password-confirm">{{ __('Confirmar senha') }}</label>

                            <input id="password-confirm" type="password" placeholder="{{ __('Senha') }}" class="form-control{{ $errors->has('password-confirm') ? ' is-invalid' : '' }}" name="password_confirmation" value="{{ old('password-confirm') }}" required autofocus>

                            
                        </div>
                        @if ($errors->has('password-confirm'))
                            <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                
                    <div class="form-group row">
                        <div class="col-md-12 mx-auto">
                            <button type="submit" class="btn btn-warning">
                                {{ __('Alterar senha') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

