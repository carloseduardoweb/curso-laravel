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
    
}