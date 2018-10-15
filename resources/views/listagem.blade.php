@extends('principal')

@section('conteudo')
    <h1>Listagem de produtos</h1>
    <br />
    @if (empty($produtos))
      <div class="alert-danger">Você não tem nenhum produto cadastrado.</div>
    @else
      <table class="table table-bordered table-hover">
        <tr>
          <th>Nome</th>
          <th>Valor</th>
          <th>Descrição</th>
          <th>Quantidade</th>
          <th></th>
        </tr>
        @foreach ($produtos as $p)
        <tr>
          <td>{{ $p->nome }}</td>
          <td>{{ $p->valor }}</td>
          <td>{{ $p->descricao }}</td>
          <td>{{ $p->quantidade }}</td>
          <td>
            <a href=<?="/produtos/mostra/" . $p->id;?>>
              <span class="glyphicon glyphicon-search"></span>
            </a>
          </td>
        </tr>
        @endforeach
      </table>
    @endif
@stop
