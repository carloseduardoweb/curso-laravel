@extends('layout.principal')

@section('conteudo')
    <h1>Listagem de produtos</h1>
    <br />
    @if (empty($produtos))
      <div class="alert alert-danger">Você não tem nenhum produto cadastrado.</div>
    @else
      <table class="table table-bordered table-hover">
        <tr>
          <th>Nome</th>
          <th>Valor</th>
          <th>Descrição</th>
          <th>Quantidade</th>
          <th></th>
        </tr>
        <?php $itemEmFalta = false; ?>
        @foreach ($produtos as $p)
        <tr class={{ $p->quantidade <= 1 ? "danger" : "" }}>
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
        <?php 
          if($p->quantidade <= 1) {
            $itemEmFalta = true;
          }?>
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
@stop
