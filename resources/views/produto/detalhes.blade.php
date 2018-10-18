@extends('layout.principal')

@section('conteudo')
  <h1>Detalhes do produto {{ $produto->nome }}</h1>
  <br />
  <table class="table table-hover">
    <ul>
      <li><b>Valor:</b> {{ $produto->valor }}</li>
      <li><b>Descrição:</b> {{ $produto->descricao }}</li>
      <li><b>Quantidade:</b> {{ $produto->quantidade }}</li>
    </ul>
  </table>
@stop
