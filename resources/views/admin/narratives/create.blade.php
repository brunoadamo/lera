@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="text-center">{{ __('Cadastrar Narrativas') }}</h1>

            <div class="card-body">
                {!! Form::open(['url' => '/admin/narratives', 'enctype' => 'multipart/form-data', 'role' => 'form']) !!}

                    @include('admin.narratives._form')
                    <div class="form-group row mb-0">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-warning">
                                {{ __('Cadastrar') }}
                            </button>
                        </div>
                    </div>

                {!! Form::close() !!}
                
            </div>
        </div>
    </div>
</div>
@endsection
