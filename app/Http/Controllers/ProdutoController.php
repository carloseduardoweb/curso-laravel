<?php namespace CursoLaravel\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;
use CursoLaravel\Produto;

class ProdutoController extends Controller {

    public function lista() {
        //$produtos = DB::select('select * from produtos');
        $produtos = Produto::all();
        //view()                                                        //::helper method::
        //return view('produto.listagem', ['produtos' => $produtos]);   
        //return view('produto.listagem')->withProdutos($produtos);     //::magic method::
        //return view('produto.listagem')->with('produtos', $produtos);
        if (!view()->exists('produto.listagem')) {
            $argv = null;
            exec('echo $HOME', $argv);
            $home = $argv[0];
            return view()->file($home . '/repositorios/curso-laravel/resources/views/produto/listagem.php')->withProdutos($produtos);
        }
        
        //return view('produto.listagem')->withProdutos(array()); //Teste com um array de produtos vazios
        return view('produto.listagem')->withProdutos($produtos);
        //return $produtos; //Testando o retorno padrão em JSON do Laravel
    }

    public function listaJson() {
        //$produtos = DB::select('select * from produtos');
        $produtos = Produto::all();
        return response()->json($produtos);
        //Ou:
        //return $produtos;
    }

    public function mostra($id) {           // parâmetro de rota passado como argumento, ::path param::
        //$id = Request::input('id', 0);    // parâmetro de busca
        //$id = Request::route('id');       // parâmetro de rota
        //$p = DB::select('select * from produtos where id = ?', [$id]);
        $p = Produto::find($id);
        if (empty($p)) {
            return "Esse produto não existe";
        } else {
            //return view('produto.detalhes')->withProduto($p);
            return view('produto.formulario')->withProduto($p);
        }
    }

    public function novo() {
        $p = new Produto();
        return view('produto.formulario')->withProduto($p);
    }

    public function adiciona() {
        //$nome       = Request::input('nome');
        //$valor      = Request::input('valor');
        //$quantidade = Request::input('quantidade');
        //$descricao  = Request::input('descricao');
        
        //$produto = new Produto();
        //$produto->nome       = $nome;
        //$produto->valor      = $valor;
        //$produto->quantidade = $quantidade;
        //$produto->descricao  = $descricao;
        
        //$params = Request::all();
        //$produto = new Produto($params); //Atribuição em massa, ::mass assignment::

        //DB::insert("insert into produtos (nome, valor, quantidade, descricao) values (?, ?, ?, ?)",
        //            [$nome, $valor, $quantidade, $descricao]);
        //$produto->save();

        Produto::create(Request::all()); //Criação de Produto com ::factory method::

        //return view('produto.adicionado')->withNome($nome);
        //return view('produto.listagem');                      //Não funcionará corretamente. Falta a variável $produtos.
        //return redirect('/produtos');                         //::helper method::
        //return redirect('/produtos')->withInput();              //Envia os parâmetros da requisição atual para a nova.
        //return redirect('/produtos')->withInput(Request::only('nome'));
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
