<div class="row">
    <div class="input-field">
        <label for="password" data-error="{{ $errors->has('password') ? $errors->first('password') : null }}" >Senha</label>
        <input id="password" type="password" name="password" class="validate {{ $errors->has('password') ? ' invalid' : '' }}" required>
    </div>
</div>