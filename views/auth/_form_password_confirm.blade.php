<div class="row">
    <div class="input-field">
        <label for="password-confirm" data-error="{{ $errors->has('password-confirm') ? $errors->first('password-confirm') : null }}" >Repita a senha</label>
        <input id="password-confirm" type="password" name="password_confirmation" class="validate {{ $errors->has('password-confirm') ? ' invalid' : '' }}" required>
    </div>
</div>