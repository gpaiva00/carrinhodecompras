<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Pedidos;
use App\PedidoProdutos;
use App\Produto;
use App\Endereco;
use App\User;

class CarrinhoController extends Controller
{
    public function index()
    {
        $pedido = Pedidos::where([
            'status' => 'FT',
            'user_id' => Auth::user()->id
        ])->first();
        
        if(empty($pedido)){
            $request = Request();
            $request->session()->flash('empty', 'Sua sacola está vazia');
            return view('sacola/index');
        }else{

            $id = $pedido->id; 

            $pedido_produto = PedidoProdutos::where(['id_pedido' => $pedido->id])->get();
            
            $produtos = array();
            $total = 0;
            foreach($pedido_produto as $pedido){
                $produtos[] = Produto::where(['id' => $pedido->id_produto])->first();
            }

            foreach($produtos as $produto){
                $total += $produto->valor_venda;
            }

            $endereco = Endereco::where([
                'id_user' => Auth::user()->id
            ])->first();

            return view('sacola/index', compact('produtos', 'endereco', 'total', 'id'));
        }
    }

    public function finaliza(Request $request)
    {
        if($request->my_points < $request->total){
            $request->session()->flash('fail', 'Você não tem pontos suficientes!');
            return redirect('/sacola');
        }
        else{
            $pedido = Pedidos::find($request->id_pedido);    
            $pedido->status = 'PR';
            $pedido->total = $request->total;
            $pedido->save();


            $qtds = explode(',', $request->arr_qtds);    
            $ids_prod = explode(',', $request->arr_ids_produtos);
            for($i = 0; $i < count($qtds); $i++){
                
                $pedido_produto = PedidoProdutos::where('id_pedido', $request->id_pedido)
                ->where('id_produto', $ids_prod[$i])
                ->update(['quantidade' => $qtds[$i] ]);   
            }

            $first_name = explode(' ', Auth::user()->name)[0];
            $request->session()->flash('RequestDone', $first_name.', recebemos seu pedido! Em breve te enviaremos mais informações sobre a entrega.');

            return redirect('/');
        }    
    }
    public function adicionar(Request $request)
    {
        $id = Pedidos::where([
            'status' => 'FT',
            'user_id' => Auth::user()->id
        ])->value('id');

        if(empty($id)){
            $pedido = new Pedidos();
            $pedido->user_id = Auth::user()->id;
            $pedido->status = 'FT';
            $pedido->save();
            $id = DB::getPdo()->lastInsertId();
        }
        
        $id_produto = PedidoProdutos::where(['id_pedido' => $id, 'id_produto' => $request->id])->value('id_produto');

        if(empty($id_produto)){
            $valor = Produto::where(['id' => $request->id])->value('valor_venda');

            $pedido_produto = new PedidoProdutos();
            $pedido_produto->id_pedido = $id;
            $pedido_produto->id_produto = $request->id;
            $pedido_produto->quantidade = 1;
            $pedido_produto->valor = $valor;
            $pedido_produto->save();
            return 1;
        }
        // else{
        //     $this->remover($request->id);
        // }
        
    }

    public function getItemsDropdown(Request $request)
    {
        $id = Pedidos::where([
            'status' => 'FT',
            'user_id' => Auth::user()->id
        ])->value('id');
        
        $pedido_produto = PedidoProdutos::where(['id_pedido' => $id])->get();
        $size = count($pedido_produto);
        
        $i = 1;
        $json = '{
            "item": [';
        
        foreach($pedido_produto as $pedido){
            $produto = Produto::where(['id' => $pedido->id_produto])->first();

            $json .= '{"id":"'.$produto->id.'" ,"nome": "'.$produto->nome.'" ,"imagem": "'.$produto->imagem.'" ,"quantidade":"'.$pedido->quantidade.'", "valor":"'.$pedido->valor.'"}';
            $json .= ($i < $size) ? ', ' : '';

            $i++;
        }
        
        $json .=']}';
        return $json;
    }

    public function remover(Request $request)
    {
        print_r($request->all());
        // $id_pedido = Pedidos::where([
        //     'status' => 'FT',
        //     'user_id' => Auth::user()->id
        // ])->value('id');

        // PedidoProdutos::where([
        //     'id_pedido'=> $id_pedido, 
        //     'id_produto' => $request-id
        // ])->delete();

        // echo 1;
    }
}
