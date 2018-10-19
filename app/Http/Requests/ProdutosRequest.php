<?php

namespace CursoLaravel\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'nome' => 'required|min:3|max:100',
            'descricao' => 'required|max:255',
            'valor' => 'required|numeric'
        ];
    }

    public function messages() {
        return [
            'required' => 'O campo \':attribute\' não pode ser vazio.'
        ];
    }

}
