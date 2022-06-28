<?php require_once("../conexao/conexao.php") ?>


<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <title>Projeto VendPago</title>
  <link href="../src/css/estilo.css" rel="stylesheet">
  <link href="../src/css/cadastrotitulo.css" rel="stylesheet">
</head>

<body class="container">
  <?php
  include_once("../servicos/topo.php");
  ?>
  <div class="container_cadastro_titulo">
    <h2>Cadastro de Título</h2>

    <form action="cadastrotitulo.php">
      <label for="nome">Nome</label>
      <input type="text" name="nome">
      <label for="descricao">Descrição do Título</label>
      <textarea name="descricao"></textarea>
      <input type="submit" value="Cadastrar">
    </form>

  </div>





  <?php include_once("../servicos/rodape.php");
  ?>

</body>

</html>