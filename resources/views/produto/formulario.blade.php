<?php use CursoLaravel\Produto; ?>

@extends('layout.principal')

@section('conteudo')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error) 
                <li> {{$error}} </li>
            @endforeach
            </ul>
        </div>
    @endif
    <h1>{{ $produto->isEmpty() ? "Inclusão de produto" : "Edição de produto" }}</h1>
    <form method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
        <input type="hidden" name="id" value="{{ $produto->id }}"/>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input id="nome" type="text" name="nome" class="form-control" value="{{ $produto->nome or  old('nome') }}" /><!-- required/>-->
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input id="valor" type="number" name="valor" step="0.01" min="0.01" class="form-control"  value="{{ $produto->valor or old('valor') }}" /><!-- required/>-->
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input id="quantidade" type="number" name="quantidade" min="0" class="form-control"  value="{{ $produto->quantidade or old('quantidade') }}" /><!-- required/>-->
        </div>
        <div class="form-group">
            <label for="tamanho">Tamanho</label>
            <input id="tamanho" type="text" name="tamanho" class="form-control"  value="{{ $produto->tamanho or old('tamanho') }}"/>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control">{{ $produto->descricao or old('descricao') }}</textarea>
        </div>
        <div class="form-group">
            @if ($produto->isEmpty())
                <button formaction="{{action('ProdutoController@adiciona')}}" class="btn btn-primary btn-block">Adicionar</button>
            @else
                <div style="text-align:center"> <!-- bad practice: use of the 'style' property -->
                    <a href="{{action('ProdutoController@lista')}}" class="btn btn-default">Cancelar</a>
                    <button formaction="{{action('ProdutoController@atualiza')}}" class="btn btn-primary">Salvar</button>
                </div>
            @endif
        </div>
    </form>
@stop
