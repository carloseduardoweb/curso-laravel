<?php namespace CursoLaravel\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller {

    public function lista() {
        
        $produtos = DB::select('select * from produtos');
        //view()                                                //::helper method::
        //return view('listagem', ['produtos' => $produtos]);   
        //return view('listagem')->withProdutos($produtos);     //::magic method::
        //return view('listagem')->with('produtos', $produtos);
        if (!view()->exists('listagem')) {
            $argv = null;
            exec('echo $HOME', $argv);
            $home = $argv[0];
            return view()->file($home . '/repositorios/curso-laravel/resources/views/listagem.php')->withProdutos($produtos);
        }
        
        return view('listagem')->withProdutos($produtos);
    }

    public function mostra($id) { // parâmetro de rota passado como argumento
        //$id = Request::input('id', 0);    // parâmetro de busca
        //$id = Request::route('id');       // parâmetro de rota
        $p = DB::select('select * from produtos where id = ?', [$id]);
        if (empty($p)) {
            return "Esse produto não existe";
        } else {
            return view('detalhes')->with('p', $p[0]);
        }
    }

}
