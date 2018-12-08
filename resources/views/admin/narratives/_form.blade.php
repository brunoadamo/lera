<div class="form-group">

    <div class="form-group floating-label-form-group controls">

        <label for="picture">{{ __('Capa da Narrativa') }}</label>

        <input id="picture" type="file" placeholder="{{ __('Nome') }}" class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" value="{{ old('picture') }}" autofocus>



        @if ($errors->has('picture'))

            <p class="help-block text-danger">{{ $errors->first('picture') }}</p>

        @endif

    </div>

</div>



<div class="form-group">

    <div class="form-group floating-label-form-group controls">

        {!! Form::label('title', 'Título', ['class' => 'col-md-2 control-label']) !!}

        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título', 'required', 'autofocus']) !!}

        

    </div>

    @if ($errors->has('title'))

        <p class="help-block text-danger">{{ $errors->first('title') }}</p>

    @endif

</div>



<div class="form-row">



    <div class="form-group col-sm-8">

        <div class="form-group floating-label-form-group controls">

          

            {!! Form::select('kind_id', $kinds, null, ['class' => 'form-control', 'placeholder' => 'Tema', 'required', 'autofocus']) !!}

    

        </div>

        @if ($errors->has('kind_id'))

            <p class="help-block text-danger">{{ $errors->first('kind_id') }}</p>

        @endif

    </div>



    <div class="form-group col-sm-4">

        <div class="form-group floating-label-form-group controls">

            {!! Form::selectRange('act_n', 1, 5, '', ['class' => 'form-control', 'placeholder' => 'Quantidade de atos', 'required', 'autofocus']) !!}

    

        </div>

        @if ($errors->has('act_n'))

            <p class="help-block text-danger">{{ $errors->first('act_n') }}</p>

        @endif

    </div>

    

</div>



<div class="form-group">

    {!! Form::label('clue', 'Dica de continuidade da narrativa', ['class' => 'col-md-12 control-label']) !!}

    {!! Form::textarea('clue', null, ['class' => 'form-control summernote', 'placeholder' => 'Dica', 'required', 'autofocus']) !!}



    @if ($errors->has('clue'))

        <p class="help-block text-danger">{{ $errors->first('clue') }}</p>

    @endif

</div>



<div class="form-group">

    {!! Form::label('content', '1º Ato', ['class' => 'col-md-12 control-label']) !!}

    {!! Form::textarea('content', null, ['class' => 'form-control summernote', 'placeholder' => '1º Ato', 'required', 'autofocus']) !!}



    @if ($errors->has('content'))

        <p class="help-block text-danger">{{ $errors->first('content') }}</p>

    @endif

</div>