@extends('default_layout')
@section('page_title') {{$registro->nome}} @endsection
<style>
    .checked {
        color: orange;
    }
    .fa-star{
        cursor: pointer;
    }
</style>
@section('content_page')
    <div class="container">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('user.index')}}">Início</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$registro->nome}}</li>
    </ol>
    </nav>
        <div class="row mt-5">
            <div class="col-md-4">
                <img src="/images/produtos/{{$registro->imagem}}" width="100%">
            </div>
            <div class="col-md-8">
                <h2 class="text-upppercase font-weight-light">{{$registro->nome}}</h2>
                <span class="text-success"><i class="fas fa-star"></i> {{$registro->valor_venda}} pts</span>    
                <div class="row mt-2">
                    <div class="col-md-4">
                        <label>Disponibilidade: </label> 
                        @if($registro->quantidade > 1)
                            <label class="text-secondary">{{$registro->quantidade}}</label>
                            @if(empty($item))
                                <button class="btn btn-info add-cart" id="{{$registro->id}}">Adicionar à sacola</button>
                            @else
                                <button class="btn btn-success add-cart" id="{{$registro->id}}"><i class="fa fa-check"></i> Adicionado</button>
                            @endif
                        @else
                            <label class="text-danger">Indisponível</label>
                            <button class="btn btn-warning">Avisar-me quando chegar</button>
                        @endif
                        <br>
                        
                    </div>
                    <!-- <div class="col-md-3">
                        <label>Prazo de entrega: </label> <label class="text-danger">5 dias</label>
                    </div> -->
                    <div class="col-md-4">
                        <label>Avalie o produto</label>
                        <br>
                        <input type="hidden" name="rating" id="rating" data-id-produto="{{$registro->id}}"/>
                        <span class="fe fa fa-star" onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);" title="ruim"></span>
                        <span class="fe fa fa-star" onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);" title="mais ou menos"></span>
                        <span class="fe fa fa-star" onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);" title="gostei"></span>
                        <span class="fe fa fa-star" onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);" title="demais!"></span>
                        <span class="fe fa fa-star" onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);" title="excelente!"></span>
                        <br>
                        <small>4.1 média de 254 avaliações.</small>
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                            Obrigado por avaliar!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Descrição</h4>
                <p>{{$registro->descricao}}</p>
            </div>
        </div>
    </div>
@endsection
<!-- <script type="text/javascript">
    
</script> -->