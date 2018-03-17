@extends('layouts.app')

@section('content')
<div class="container">
    <center>
    <div class="card" style="margin-top:10%; margin-bottom: 0; width: 20em;">
        <div class="card-body">
            <h5 class="card-title">
                <i class="fas fa-recycle text-primary"></i>
                Entrar no CCRD
            </h5>
            <div class="message"></div>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <!-- <label for="email" class="col-md-12 control-label">E-Mail Address</label> -->
                    <div class="col-md-12">
                        <input id="email" type="email" placeholder="Digite seu email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <!-- <label for="password" class="col-md-4 control-label">Password</label> -->
                    <div class="col-md-12">
                        <input id="password" placeholder="Digite uma senha" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group float-left">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Mantenha-me conectado
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <br>
                    <div class="col-md-12">
                        <center>
                            <button type="submit" class="btn btn-primary">
                                Entrar
                            </button>
                        </center>
                        <div class="row">
                            <div class="col-md-7 mt-3">
                                <a href="{{ route('password.request') }}">Esqueceu a senha?</a>
                            </div>
                            <div class="col-md-5 mt-3">
                                <a href="{{ route('register')}}" class="btn-link">Cadastrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </center>
</div>
@endsection
