@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">{{ __('Nova senha') }}</h1>

            <div class="card-body">
                <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Nova senha') }}">
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
                    <div class="form-group row mb-0">
                        <div class="col-md-12 mx-auto">
                            <button type="submit" class="btn btn-warning">
                                {{ __('Enviar link para nova senha') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

