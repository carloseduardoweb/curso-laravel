@extends('layout.principal')

@section('conteudo')
    <h1>Listagem de produtos</h1>
    @if (empty($produtos))
      <div class="alert alert-danger">Você não tem nenhum produto cadastrado.</div>
    @else
      <table class="table table-bordered table-hover">
        <tr>
          <th>Nome</th>
          <th>Valor</th>
          <th>Descrição</th>
          <th>Quantidade</th>
          <th colspan="2">Ações</th>
        </tr>
        <?php $itemEmFalta = false; ?>
        @foreach ($produtos as $p)
          <tr<?=$p->quantidade <= 1 ? ' class="danger"' : ''?>>
            <td>{{ $p->nome }}</td>
            <td>{{ $p->valor }}</td>
            <td>{{ $p->descricao }}</td>
            <td>{{ $p->quantidade }}</td>
            <td>
              <a href="{{ "/produtos/mostra/" . $p->id }}">
                <span class="glyphicon glyphicon-search"></span>
              </a>
            </td>
            <td>
              <form action="/produtos/remove/" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="id" value="{{ $p->id }}">
                <button class="btn-link" type="submit">
                 <span class="glyphicon glyphicon-trash"></span>
                </button>
              </form>
            </td>
          </tr>
          @if ($p->quantidade <= 1)
            <?php $itemEmFalta = true; ?>
          @endif
        @endforeach
      </table>
      @if ($itemEmFalta)
        <h4>
          <span class="label label-danger pull-right">
            Um ou menos itens no estoque
          </span>
        </h4>
      @endif
    @endif
    @if (old('adicionado'))
    <div class="alert text-success">
      Produto {{ old('adicionado') }} adicionado com sucesso!
    </div>
    @endif
    @if (old('removido'))
    <div class="alert text-info">
      Produto {{ old('removido') }} removido.
    </div>
    @endif
@stop
