@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                        @csrf

                        
                        

                        <div class="custom-file" id="custom_file">
                            <input type="file" class="custom-file-input" id="picture" aria-describedby="fileHelp">
                            <input id="picture" type="file" class="custom-file-input form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" value="{{ old('picture') }}" required autofocus>

                            <label class="custom-file-label" for="picture">
                                Selecione uma foto de perfil
                            </label>
                            @if ($errors->has('picture'))
                                <p class="help-block text-danger">{{ $errors->first('picture') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="form-group floating-label-form-group controls">
                                <label for="name">{{ __('Nome') }}</label>
                                <input id="name" type="text" placeholder="{{ __('Nome') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <p class="help-block text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group floating-label-form-group controls">
                                <label for="alias">{{ __('Pseudônimo') }}</label>

                                <input id="alias" type="text" placeholder="{{ __('Pseudônimo') }}" class="form-control{{ $errors->has('alias') ? ' is-invalid' : '' }}" name="alias" value="{{ old('alias') }}" required autofocus>

                                @if ($errors->has('alias'))
                                    <p class="help-block text-danger">{{ $errors->first('alias') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group floating-label-form-group controls">
                                <label for="email">{{ __('E-mail') }}</label>

                                <input id="email" type="email" placeholder="{{ __('E-mail') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group floating-label-form-group controls">
                                <label for="password">{{ __('Senha') }}</label>

                                <input id="password" type="password" placeholder="{{ __('Senha') }}" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>

                                @if ($errors->has('password'))
                                    <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group floating-label-form-group controls">
                                <label for="password-confirm">{{ __('Confimar senha') }}</label>

                                <input id="password-confirm" type="password" placeholder="{{ __('Confimar senha') }}" class="form-control{{ $errors->has('password-confirm') ? ' is-invalid' : '' }}" name="password-confirm" value="{{ old('password-confirm') }}" required autofocus>

                                @if ($errors->has('password-confirm'))
                                    <p class="help-block text-danger">{{ $errors->first('password-confirm') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cadastrar') }}
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
