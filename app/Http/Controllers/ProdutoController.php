<?php namespace CursoLaravel\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller {

    public function lista() {
        
        $produtos = DB::select('select * from produtos');
        //view()                                                //::helper method::
        //return view('produto.listagem', ['produtos' => $produtos]);   
        //return view('produto.listagem')->withProdutos($produtos);     //::magic method::
        //return view('produto.listagem')->with('produtos', $produtos);
        if (!view()->exists('produto.listagem')) {
            $argv = null;
            exec('echo $HOME', $argv);
            $home = $argv[0];
            return view()->file($home . '/repositorios/curso-laravel/resources/views/produto/listagem.php')->withProdutos($produtos);
        }
        
        //return view('produto.listagem')->withProdutos(array()); // teste com um array de produtos vazios
        return view('produto.listagem')->withProdutos($produtos);
    }

    public function mostra($id) { // parâmetro de rota passado como argumento
        //$id = Request::input('id', 0);    // parâmetro de busca
        //$id = Request::route('id');       // parâmetro de rota
        $p = DB::select('select * from produtos where id = ?', [$id]);
        if (empty($p)) {
            return "Esse produto não existe";
        } else {
            return view('produto.detalhes')->with('p', $p[0]);
        }
    }

}
