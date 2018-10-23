<?php namespace CursoLaravel\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use CursoLaravel\Produto;
use CursoLaravel\Http\Requests\ProdutosRequest;

class ProdutoController extends Controller {

    public function __construct() {
        $this->middleware('autorizador', ['only' => ['novo', 'adiciona', 'atualiza', 'remove']]);
    }

    public function lista() {
        $produtos = Produto::all();
        if (!view()->exists('produto.listagem')) {
            $argv = null;
            exec('echo $HOME', $argv);
            $home = $argv[0];
            return view()->file($home . '/repositorios/curso-laravel/resources/views/produto/listagem.php')->withProdutos($produtos);
        }
        return view('produto.listagem')->withProdutos($produtos);
    }

    public function listaJson() {
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    public function mostra($id) {
        $p = Produto::find($id);
        if (empty($p)) {
            return "Esse produto não existe";
        } else {
            return view('produto.formulario')->withProduto($p);
        }
    }

    public function novo() {
        $p = new Produto();
        return view('produto.formulario')->withProduto($p);
    }

    public function adiciona(ProdutosRequest $request) {
        Produto::create($request->all());
        return redirect()->action('ProdutoController@lista')->withInput(['adicionado' => Request::input('nome')]);
    }

    public function atualiza() {
        $produto = Produto::find(Request::input('id'));
        $produto->fill(Request::all());
        $produto->save();
        return redirect()->action('ProdutoController@lista')->withInput(['atualizado' => $produto->nome]);
    }

    public function remove() {
        $produto = Produto::find(Request::input('id'));
        $produto->delete();
        return redirect()->action('ProdutoController@lista')->withInput(['removido' => $produto->nome]);
    }

    public function download($filename) {
        $argv = null;
        exec('echo $HOME', $argv);
        $path = $argv[0] . "/repositorios/curso-laravel/public/files/" . $filename;
        
        if (file_exists($path)) {
            return response()->download($path);
        }
        return view('produto.notfound')->withResource($filename);
    }

}
