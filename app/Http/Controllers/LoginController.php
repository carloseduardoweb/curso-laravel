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
            return "Logado com sucesso!";
        }

        return "Credenciais inválidas.";
    }
}
