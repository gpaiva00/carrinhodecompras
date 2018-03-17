@extends('default_layout')
@section('page_title', 'Sua sacola')
@section('content_page')
<div class="container">
    @if(Session::has('empty'))
        <div class="row mt-5">   
            <div class="col-md-12">
                <center><i class="fas fa-2x text-muted fa-shopping-bag"></i><br>
                {{Session::get('empty') }}</center>
            </div>
        </div>
    @else
    <form method="post" name="cartForm" action="{{ url('/finaliza') }}">
        <div class="row mt-5">
            <div class="col-md-8">
                <input type="hidden" name="arr_qtds">
                <input type="hidden" name="arr_ids_produtos">
                <input type="hidden" name="id_pedido">
                <input type="hidden" name="my_points" value="{{Auth::user()->pontos}}">
                <input type="hidden" name="total" value="{{$total}}">
                {{ csrf_field() }}
                @foreach($produtos as $produto)
                    <div class="row mb-4 calc">
                        <div class="col-md-4">
                            <img src="/images/produtos/{{$produto->imagem}}" width="150" class="ml-5">
                        </div>
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="text-weight-light text-uppercase">{{$produto->nome}}</p>        
                                </div>
                                <div class="col-md-2">
                                    <button type="button" id="{{$produto->id}}" class="remove-item"><i class="fas fa-2x fa-window-close text-muted"></i></button>
                                </div>
                            </div>
                        
                            <label>Quantidade: </label>
                            <select name="quantidade" data-valor-venda="{{ $produto->valor_venda}}" id="{{$produto->id}}">
                                <option value="1">1</option>
                                @if( $produto->quantidade > 1 )
                                    <option value="2">2</option>
                                @endif
                            </select>
                            <br>
                            <strong class="text-success valor_produto"><i class="fa fa-star"></i> {{$produto->valor_venda}}</strong>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4" style="background-color: #fff; border-radius: 7px; max-height: 350px;">
                <h2 class="mt-3">Resumo</h2>
                <p class="text-right mr-3">{{Auth::user()->name}}
                    <br>
                    {{ $endereco->rua}}, {{ $endereco->numero}}
                    <br> {{ $endereco->cep}} {{ $endereco->bairro}} 
                    <br> {{ $endereco->cidade}} - {{ $endereco->estado}}
                </p>
                <br>
                <!-- <input type="text" placeholder="Código promocional"><button class="btn btn-primary ml-2">Usar</button> -->
                <h2>Total: <small class="text-success"><i class="fa fa-star"></i><span class="total"> {{$total}}</span></small></h2>
                <small class="ml-1">Você tem {{Auth::user()->pontos}} pts</small>
                <center><button class="btn btn-success col-md-10 mb-3 mt-3 finaliza" id="{{$id}}">Finalizar</button></center>
                @if(Session::has('fail'))
                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                        {{Session::get('fail')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </form>
    @endif
    <div class="row mb-5" style="margin-top: 100px;">
        <div class="col-md-12">
            <center><a href="{{ route('user.index')}}" class="btn btn-primary col-md-4">Escolher mais produtos</a></center>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){calcTotal();});

    function calcTotal(){
      total = 0;
      arr_qtds = [],
      arr_ids_produtos = [];

      $('.calc').each(function(){
        var qtd = $(this).find('[name="quantidade"]').val(),
        valor_venda = $(this).find('[name="quantidade"]').data('valor-venda'),
        calc = parseInt(qtd) * parseFloat(valor_venda),
        id = $(this).find('[name="quantidade"]').attr('id');

        total += calc;

        arr_qtds.push(qtd);
        arr_ids_produtos.push(id);
      });

      $('.total').html(' '+total);
    }

    $('.remove-item').click(function(){
        var url = 'id_produto='+$(this).attr('id');
        console.log(url);
        // $.get('/removercarrinho', url, function(data){
        //     console.log(data);
        // });
    });

</script>