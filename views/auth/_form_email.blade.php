<div class="row">
    <div class="input-field">
        <label for="email" data-error="{{ $errors->has('email') ? $errors->first('email') : null }}" >E-mail</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" class="validate {{ $errors->has('email') ? ' invalid' : '' }}" required autofocus>
        
    </div>
</div>