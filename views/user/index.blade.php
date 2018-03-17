@extends('default_layout') 
@section('page_title') 
    @if(Auth::guest())
        Olá, seja bem vindo(a)
    @else
       Olá, {{ Auth::user()->name }} 
    @endif
@endsection
<style>
    .products-images{
        width: 90%;
        height: 110%;
        border-radius: 5px;
        transition: all .2s ease-in-out;
    }
    .products-images:hover{
        transform: scale(1.1);
    }
    .product-content{
        max-height: 200px;
        margin-bottom: 160px;
    }
    .product-content h5{
        font-size: 18px;
        margin-bottom: 0;
    }
    .product-link{
        text-decoration: none;
        color: #000;
    }
    .product-link:hover{
        text-decoration: none;
        color: rgb(73, 119, 245);
    }   
    .points-bag{
        margin-top: -10px;
    }
    @media only screen and (max-width: 768px) {
        .shopping-bag{
            float: right;
            width: 100%;
        }
    }

</style>
@section('content_page')
    @if(Session::has('RequestDone'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('RequestDone')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container">
        <div class="row mt-5 mb-5">
            <!-- product -->

            @foreach($registros as $produto)
                <div class="col-lg-3 col-md-4 col-sm-6 product-content">
                    <!-- <div class=""> -->
                        <a href="{{ route('produto.detalhes', $produto->id) }}"><img src="/images/produtos/{{$produto->imagem}}" class="products-images"></a>
                        <div class="row mt-2">
                            <div class="col-md-11 mr-3">
                                <a href="{{ route('produto.detalhes', $produto->id) }}" class="product-link">
                                    <p class="text-uppercase font-weight-light">
                                        {{ $produto->nome }}
                                    </p>
                                    
                                </a>
                            </div>
                        </div>
                        <div class="row points-bag">
                            <div class="col-md-7 col-sm-6 col-xs-6">
                                <span class="text-success"><i class="fas fa-star"></i>{{$produto->valor_venda}} pts</span>    
                            </div>
                            <!-- <div class="col-md-5 col-sm-6 col-xs-6">
                                <a href="#" class="btn btn-info shopping-bag">+ <i class="fas fa-shopping-bag"></i></a>
                            </div> -->
                        </div>
                    <!-- </div> -->
                </div>
            @endforeach
        </div>
    </div>
@endsection