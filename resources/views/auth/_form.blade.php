<div class="form-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="picture" name="picture">
        <label class="custom-file-label" for="picture">Escolha sua foto...</label>
    </div>
    @if ($errors->has('picture'))
        <p class="help-block text-danger">{{ $errors->first('picture') }}</p>
    @endif
</div>


<div class="form-group">
    <div class="form-group floating-label-form-group controls">
        {!! Form::label('name', 'Nome', ['class' => 'col-md-2 control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome', 'required', 'autofocus']) !!}

    </div>
    @if ($errors->has('name'))
        <p class="help-block text-danger">{{ $errors->first('name') }}</p>
    @endif
</div>

<div class="form-group">
    <div class="form-group floating-label-form-group controls">
        {!! Form::label('name', 'Pseudônimo', ['class' => 'col-md-2 control-label']) !!}
        {!! Form::text('alias', null, ['class' => 'form-control', 'placeholder' => 'Pseudônimo', 'required', 'autofocus']) !!}

    </div>
    @if ($errors->has('alias'))
        <p class="help-block text-danger">{{ $errors->first('alias') }}</p>
    @endif
</div>
<div class="form-group">
    <div class="form-group floating-label-form-group controls">
        {!! Form::label('name', 'E-mail', ['class' => 'col-md-2 control-label']) !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail', 'required', 'autofocus']) !!}

    </div>
    @if ($errors->has('email'))
        <p class="help-block text-danger">{{ $errors->first('email') }}</p>
    @endif
</div>
<div class="form-group">
    <div class="form-group floating-label-form-group controls">
        {!! Form::label('name', 'Senha', ['class' => 'col-md-2 control-label']) !!}
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha', 'required', 'autofocus']) !!}

    </div>
    @if ($errors->has('password'))
        <p class="help-block text-danger">{{ $errors->first('password') }}</p>
    @endif
</div>
<div class="form-group">
    <div class="form-group floating-label-form-group controls">
        {!! Form::label('name', 'Confimar senha', ['class' => 'col-md-2 control-label']) !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confimar senha', 'required', 'autofocus']) !!}

    </div>
    @if ($errors->has('password-confirm'))
        <p class="help-block text-danger">{{ $errors->first('password-confirm') }}</p>
    @endif
</div>

