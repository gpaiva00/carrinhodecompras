<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Endereco;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function perfil($email = null)
    {
        $user = User::where([
            'email' => $email
        ])->get();

        if(empty($end = Endereco::where('id_user', Auth::user()->id)->first()))
            $this->createFakeAddress();

        $end = Endereco::where([
            'id_user' => Auth::user()->id
        ])->get();
        
        
        if(!empty($user))
            return view('user/perfil', compact('user', 'end'));
    }

    public function savePerfil(Request $request)
    { 
        $end = new Endereco();
        $end = Endereco::find($request->input('id'));
        
        $end->rua = $request->input('rua');
        $end->numero = $request->input('numero');
        $end->cep = $request->input('cep');
        $end->bairro = $request->input('bairro');
        $end->cidade = $request->input('cidade');
        $end->estado = $request->input('estado');
        $end->id_user = Auth::user()->id;
        $end->save();

        $request->session()->flash('success', 'Seus dados foram atualizados!');
        return redirect(('/perfil/'.Auth::user()->email));
    }
    public function uploadImg(Request $request)
    {

        print_r($_FILES);
        // $request = Request();
        print_r($request->all());
        // $uri = $request->input('file');
        // echo $uri;
        // print_r($uri);
    }
    private function createFakeAddress()
    {
        $end = new Endereco();
        $end->rua = 'rua';
        $end->numero = 'nº';
        $end->cep = 'CEP';
        $end->bairro = 'bairro';
        $end->cidade = 'são paulo';
        $end->estado = 'SP';
        $end->id_user = Auth::user()->id;
        $end->save();
    }
}
