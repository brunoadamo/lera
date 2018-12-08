{!! Form::open(['method' => 'GET', 'role' => 'form']) !!}
    <div class="col-sm-10 mx-auto text-center">
        <div class="row">
            <div class="input-group mb-5 col-md-4">

                {!! Form::select('kind_id', $kinds, null, ['class' => 'form-control', 'placeholder' => 'Tema', 'required', 'autofocus', 'style' => 'height: 53px;']) !!}
            </div>
            <div class="input-group mb-5 col-md-8">

                {!! Form::text('search', request()->get('search'), ['class' => 'form-control', 'placeholder' => 'Utilize esse campo para pesquisar...']) !!}
                <div class="input-group-append">
                    {!! Form::submit('Pesquisar', ['class' => 'btn btn-outline-secondary']) !!}
                </div>
            </div>
        </div>
        <a href="{{ url('admin/narratives/create') }}" class="btn btn-info mb-5">Criar narrativa</a>
        
    </div>

{!! Form::close() !!}