<div class="form-group">
    <label for="clue">{{ __('Dica') }}</label>
    
    <textarea name="clue" id="clue" class="form-control{{ $errors->has('clue') ? ' is-invalid' : '' }}" placeholder="{{ __('Dica') }}" value="{{ old('clue') }}" disabled></textarea>

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