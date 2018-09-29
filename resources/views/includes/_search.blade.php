{!! Form::open(['method' => 'GET', 'role' => 'form']) !!}
    <div class="col-sm-10 mx-auto">
        <div class="row">
            <div class="input-group mb-5">
            
                {!! Form::text('search', request()->get('search'), ['class' => 'form-control', 'placeholder' => 'Utilize esse campo para pesquisar...']) !!}
                <div class="input-group-append">
                    {!! Form::submit('Pesquisar', ['class' => 'btn btn-outline-secondary']) !!}
                </div>
            </div>
        </div>    
    </div>

  
{!! Form::close() !!}