<div class="form-group">
    <div class="form-group floating-label-form-group controls">
        <label for="picture">{{ __('Capa da Narrativa') }}</label>
        <input id="picture" type="file" placeholder="{{ __('Nome') }}" class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" value="{{ old('picture') }}" required autofocus>

        @if ($errors->has('picture'))
            <p class="help-block text-danger">{{ $errors->first('picture') }}</p>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="form-group floating-label-form-group controls">
        <label for="title">{{ __('Título') }}</label>
        <input id="title" type="text" placeholder="{{ __('Título') }}" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

        @if ($errors->has('title'))
            <p class="help-block text-danger">{{ $errors->first('title') }}</p>
        @endif
    </div>
</div>

<div class="form-row">
    <div class="form-group col-sm-8">
        <div class="form-group floating-label-form-group controls">
            <label for="kind">{{ __('Tema') }}</label>

            <input id="kind" type="text" placeholder="{{ __('Tema') }}" class="form-control{{ $errors->has('kind') ? ' is-invalid' : '' }}" name="kind" value="{{ old('kind') }}" required autofocus>

            @if ($errors->has('kind'))
                <p class="help-block text-danger">{{ $errors->first('kind') }}</p>
            @endif
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="form-group floating-label-form-group controls">

            <select name="acts_n" id="acts_n" class="form-control{{ $errors->has('acts_n') ? ' is-invalid' : '' }}" name="acts_n" value="{{ old('acts_n') }}" required autofocus>
                <option value="" selected disabled>Quantidade de atos</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>

            </select>
            @if ($errors->has('acts_n'))
                <p class="help-block text-danger">{{ $errors->first('acts_n') }}</p>
            @endif
        </div>
    </div>
    
</div>

<div class="form-group">
    <label for="clue">{{ __('Dica') }}</label>
    
    <textarea name="clue" id="clue" class="summernote form-control{{ $errors->has('clue') ? ' is-invalid' : '' }}" placeholder="{{ __('Dica') }}" value="{{ old('clue') }}" required autofocus></textarea>

    @if ($errors->has('clue'))
        <p class="help-block text-danger">{{ $errors->first('clue') }}</p>
    @endif
</div>

<div class="form-group">
    <label for="content">{{ __('1º Ato') }}</label>
    <textarea name="content" id="content" class="summernote form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" placeholder="{{ __('Dica') }}" value="{{ old('content') }}" required autofocus></textarea>
    @if ($errors->has('content'))
        <p class="help-block text-danger">{{ $errors->first('content') }}</p>
    @endif
</div>