<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros  = Produto::where([
            'ativo' => 'S'
        ])->get();

        return view('user/index', compact('registros'));
    }

    public function logout()
    {
        Auth::logout();
    }
}
