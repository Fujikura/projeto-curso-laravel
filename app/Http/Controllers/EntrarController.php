<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    public function index()
    {
        return view('entrar');
    }

    public function entrar(Request $request)
    {
        $efetuouLogin = Auth::attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ]);

            if(!$efetuouLogin){
                return redirect()
                ->back()
                ->withErrors('E-mail ou Senha inválido!');
            }

            return redirect()->route('listar_series');
    }
}
