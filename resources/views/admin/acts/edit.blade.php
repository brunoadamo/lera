
@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="text-center font-weight-light">{{ __('Editar Ato') }}</h3>
            <h1 class="text-center md-10 mx-auto">{!! $narrative->title !!}</h1>


            <div class="card-body">
                {!! Form::model($act, ['method' => 'PUT', 'url' => "/admin/acts/{$act->id}", 'class' => 'form-horizontal', 'role' => 'form']) !!}

                    @include('admin.acts._form')

                    <div class="form-group row mb-0">
                        <div class="col-sm-12">
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

