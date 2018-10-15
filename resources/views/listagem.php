<html>
  <head>
    <title>Controle de Estoque</title>
    <meta charset="utf8">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
    <h1>Listagem de produtos</h1>
    <br />
    <table class="table table-bordered table-hover">
      <tr>
        <th>Nome</th>
        <th>Valor</th>
        <th>Descrição</th>
        <th>Quantidade</th>
        <th></th>
      </tr>
      <?php foreach ($produtos as $p): ?>
      <tr>
        <td><?= $p->nome ?></td>
        <td><?= $p->valor ?></td>
        <td><?= $p->descricao ?></td>
        <td><?= $p->quantidade ?></td>
        <td>
          <a href=<?="/produtos/mostra/" . $p->id;?>>
            <span class="glyphicon glyphicon-search"></span>
          </a>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </body>
</html>