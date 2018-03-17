@extends('default_layout')

@section('page_title') {{Auth::user()->name}} @endsection

@section('content_page')

<div class="container">
    @foreach($user as $user)
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('user.index')}}">Início</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$user->name}}</li>
    </ol>
    </nav>
        <div class="card mt-2 float-left mr-1 col-md-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-title">
                            <form method="post" id="formUser" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="file" style="display: none" id="user-img-input" name="photo">
                                <label style="position: absolute; color: slategrey; display: none;" class="alter">Alterar imagem</label>
                                <img src="/images/no-user.png" width="100%" id="user-img" style="border-radius: 5px;">
                                <div id="divprogress"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <strong class="text-capitalize">{{$user->name}}</strong>
                        <br>
                        {{$user->email}}
                        <br>
                        <label>Meus pontos: <i class="fas fa-star text-warning"></i> {{$user->pontos}} pts</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- dados -->
        <div class="card mt-2 float-left col-md-7">
            
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-map-marker"></i>
                    Endereço para entrega dos prêmios
                </h5>
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger" role="alert">
                        {{Session::get('fail')}}
                    </div>
                @endif
                <form action="{{ route('save.profile')}}" method="GET">
                @foreach($end as $end)
                    <div class="row">
                        <input type="hidden" value="{{$end->id}}" name="id">
                        <div class="col-md-7">
                            <input type="text" name="rua" value="{{$end->rua}}" class="form-control" placeholder="digite sua rua">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="numero" value="{{$end->numero}}" class="form-control" placeholder="nº">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="cep" value="{{$end->cep}}" class="form-control" placeholder="CEP">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <input type="text" name="bairro" value="{{$end->bairro}}" class="form-control" placeholder="bairro">
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="cidade" value="{{$end->cidade}}" class="form-control" placeholder="cidade">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="estado" value="{{$end->estado}}" class="form-control" placeholder="estado">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <center><button type="submit" class="btn btn-success col-md-4">Salvar</button></center>
                        </div>
                    </div>
                @endforeach
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection