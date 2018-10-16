@extends('layout.principal')

@section('conteudo')
<form action="/produtos/adiciona" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="form-group">
        <label for="nome">Nome</label>
        <input id="nome" type="text" name="nome" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="valor">Valor</label>
        <input id="valor" type="number" name="valor" step="0.01" min="0.01" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="quantidade">Quantidade</label>
        <input id="quantidade" type="number" name="quantidade" min="0" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea id="descricao" name="descricao" class="form-control"></textarea>
    </div>
    <button class="btn btn-primary btn-block">Adicionar</button>
</form>
@stop
