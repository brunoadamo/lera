@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h3 class="text-center font-weight-light">{{ __('Cadastrar Ato') }}</h3>
            <h1 class="text-center md-10 mx-auto">{{ $narrative->title }}</h1>

            <div class="card-body">
                <form method="POST" action="/narrative/{{$narrative->id}}/act" aria-label="{{ __('Cadastrar ato') }}" enctype="multipart/form-data">
                    @csrf
                  
                    @include('admin.acts._form')

                    <div class="form-group row mb-0">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-warning">
                                {{ __('Cadastrar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
