<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <title>Projeto VendPago</title>
  <link href="src/css/estilo.css" rel="stylesheet">
  <link href="src/css/index.css" rel="stylesheet">
</head>

<body class="container">
  <?php
  include_once("servicos/topo.php");
  ?>

  <main>
    <div class="menu">
      <a href="projeto/cadastrocliente/formulariocliente.php">Cadastro de Cliente</a>
      <a href="projeto/cadastrotitulo/formulariotitulo.php">Cadastro de Títulos</a>
      <a href="projeto/locacoes/formulariolocacoes.php">Locações</a>
      <a href="projeto/agenda/agenda.php">Agenda de Retirada e Entrega</a>
    </div>


  </main>
  <?php include_once("servicos/rodape.php");
  ?>
</body>

</html>