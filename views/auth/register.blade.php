@extends('layouts.app')

@section('content')
<div class="container">
    <center>
        <div class="card" style="margin-top:10%; margin-bottom: 0; width: 20em;">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-recycle text-primary"></i>
                    Cadastrar no CCRD
                </h5>
                <div class="message"></div>
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <!-- <label for="name" class="col-md-4 control-label">Name</label> -->
                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control" placeholder="Digite seu nome" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email" placeholder="Digite seu email" value="{{ old('email') }}" required>

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

                    <div class="form-group">
                        <!-- <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label> -->
                        <div class="col-md-12">
                            <input id="password-confirm" placeholder="Confirme sua senha" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <div class="col-md-12">
                            Data de nascimento
                            <input type="date" name="birthday">
                        </div>
                    </div> -->

                    <div class="form-group">
                            <br>
                            <div class="col-md-12">
                                <center>
                                    <button type="submit" class="btn btn-primary">
                                        Cadastrar
                                    </button>
                                </center>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </center>
</div>
@endsection
