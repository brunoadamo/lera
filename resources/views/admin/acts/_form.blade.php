<div class="form-group">
    <label for="clue">{{ __('Dica') }}</label>
    
    <textarea name="clue" id="clue" class="form-control{{ $errors->has('clue') ? ' is-invalid' : '' }}" placeholder="{{ __('Dica') }}" value="{{ old('clue') }}" disabled></textarea>

    @if ($errors->has('clue'))
        <p class="help-block text-danger">{{ $errors->first('clue') }}</p>
    @endif
</div>

<div class="form-group">
    <label for="act">{{ __('1º Ato') }}</label>
    <textarea name="act" id="act" class="summernote form-control{{ $errors->has('act') ? ' is-invalid' : '' }}" placeholder="{{ __('Dica') }}" value="{{ old('act') }}" required autofocus></textarea>
    @if ($errors->has('act'))
        <p class="help-block text-danger">{{ $errors->first('act') }}</p>
    @endif
</div>