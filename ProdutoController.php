<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Produto;
use App\Avaliacoes;
use App\Pedidos;
use App\PedidoProdutos;

class ProdutoController extends Controller
{

    public function detalhes($id = null)
    {
        $registro = Produto::where([
            'id' => $id,
            'ativo' => 'S'
        ])->first();
        
        $pedido = Pedidos::where([
            'status' => 'RE',
            'user_id' => Auth::user()->id
        ])->value('id');

        $item = PedidoProdutos::where([
            'id_pedido' => $pedido,
            'id_produto' =>$id
        ])->value('id_pedido');

        if(!empty($registro))
            return view('user/details', compact('registro', 'item'));
        else
            return redirect()->route('user.index');
    }

    public function avaliar(Request $request)
    {

        $id = Avaliacoes::where([
            'id_user' => Auth::user()->id,
            'id_produto' => $request->id
        ])->value('id');

        if(empty($id)){
            $avaliacao = new Avaliacoes();
            $avaliacao->id_user = Auth::user()->id;
            $avaliacao->avaliacao = $request->num;
            $avaliacao->id_produto = $request->id;
            $avaliacao->save();    
        }else{
            $avaliacao = Avaliacoes::find($id);
            $avaliacao->avaliacao = $request->num;
            $avaliacao->save();
        }
        
            
        return 1;
    }

    public function media(Request $request)
    {
        return $request->all;
    }
}
