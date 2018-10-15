<html>
  <head>
    <title>Controle de Estoque</title>
    <meta charset="utf8" >
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" >
  </head>
  <body>
    <h1>Detalhes do produto <?= $p->nome;?></h1>
    <br />
    <table class="table table-hover">
      <ul>
        <li><b>Nome:</b> <?= $p->nome; ?></li>
        <li><b>Valor:</b> <?= $p->valor; ?></li>
        <li><b>Descrição:</b> <?= $p->descricao; ?></li>
        <li><b>Quantidade:</b> <?= $p->quantidade; ?></li>
      </ul>
    </table>
  </body>
</html>