@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">{{ __('Editar usuário') }}</h1>

            <div class="card-body">
                {!! Form::model($user, ['method' => 'PUT', 'url' => "/admin/users/{$user->id}", 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
                    @csrf

                    <div class="col-md-4 mx-auto">
                        <a href="#">
                            <img class="img-fluid rounded mb-3 mb-md-0 img-thumbnail" src="{{{ asset(@Auth::user()->folder  . '' . @Auth::user()->picture)}}}" alt="">
                        </a>
                    </div>

                    @include('auth._form')
                    
                    <div class="form-group row mb-0">


                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-warning">
                                {{ __('Atualizar') }}
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
