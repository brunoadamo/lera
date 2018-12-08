<div class="form-group">

    <label for="clue">{{ __('1º Ato') }}</label>

    



    <div class="card mb-3">

        

        <div class="card-body">

             <p class="card-text">{!! $narrative->content !!}</p>

        </div>

    </div>
    <label for="clue">{{ __('Dica de continuidade') }}</label>

    



    <div class="card">

        

        <div class="card-body">

             <p class="card-text">{!! $narrative->clue !!}</p>

        </div>

    </div>

    

    



</div>







<div class="form-group">

    {!! Form::label('content', 'Escreva aqui o ato...', ['class' => 'col-md-12 control-label']) !!}

    {!! Form::textarea('content', null, ['class' => 'form-control summernote', 'placeholder' => 'Escreva aqui o ato...', 'required', 'autofocus']) !!}

    @if ($errors->has('content'))

        <p class="help-block text-danger">{{ $errors->first('content') }}</p>

    @endif

</div>