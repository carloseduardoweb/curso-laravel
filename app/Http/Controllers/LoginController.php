<?php

namespace CursoLaravel\Http\Controllers;

use Request;
use Auth;

class LoginController extends Controller
{
    public function form() {
        return view('auth.form_login');
    }

    public function login() {

        $credenciais = Request::only('email', 'password');

        if (Auth::attempt($credenciais)) {
            return "Usuário " . Auth::user()->name . " logado com sucesso!";
            //return redirect()->intended('/'); //Não funciona como esperado...
        }

        return "Credenciais inválidas.";
    }

    public function logout() {

        Auth::logout();

        return "Deslogado com sucesso.";
    }
}
