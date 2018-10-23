<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <meta charset="utf8">
    <title>Controle de estoque</title>
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">      
          <a class="navbar-brand" href="{{ !auth()->guest() ? action('ProdutoController@lista') : '/login' }}">Estoque Laravel</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{action('ProdutoController@lista')}}">Listagem</a></li>
          <li><a href="{{action('ProdutoController@novo')}}">Novo</a></li>
        </ul>
      </div>
    </nav>
    @yield('conteudo')
    <footer class="footer">
        <p>© Curso de Laravel do Alura.</p>
    </footer>
  </div>
</body>
</html>