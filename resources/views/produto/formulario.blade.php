<?php 
    use CursoLaravel\Produto; 

    $titulo = null;
    $nomeBotao = null; 
    $produto = null;
?>

@extends('layout.principal')

@section('conteudo')
    @if (old('editar'))
        <?php 
            $titulo = "Edição de produto";
            $nomeBotao = "Salvar";
            $produto = old('produto');
        ?>
    @else
        <?php 
            $titulo = "Inclusão de produto";
            $nomeBotao = "Adicionar"; 
            $produto = new Produto(); //TODO: obter atributos padrão.
        ?>
    @endif
    <h1>{{ $titulo }}</h1>
    <br />
    <form action="{{action('ProdutoController@adiciona')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <input type="hidden" name="id" value="{{ $produto->id }}"/>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input id="nome" type="text" name="nome" class="form-control" value="{{ $produto->nome }}" required/>
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input id="valor" type="number" name="valor" step="0.01" min="0.01" class="form-control"  value="{{ $produto->valor }}" required/>
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input id="quantidade" type="number" name="quantidade" min="0" class="form-control"  value="{{ $produto->quantidade }}" required/>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control">{{ $produto->descricao }}</textarea>
        </div>
        <button class="btn btn-primary btn-block">{{ $nomeBotao }}</button>
    </form>
@stop
