<?php require_once("../conexao/conexao.php") ?>


<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <title>Projeto VendPago</title>
  <link href="../src/css/estilo.css" rel="stylesheet">
  <link href="../src/css/cadastrocliente.css" rel="stylesheet">
</head>

<body class="container">
  <?php
  include_once("../servicos/topo.php");
  ?>
  <div class="container_cadastro_cliente">
    <h2>Cadastro de Cliente</h2>

    <form action="cadastrocliente.php">
      <label for="nome">Nome</label>
      <input type="text" name="nome">
      <label for="email">Email</label>
      <input type="text" name="email">
      <label for="telefone">Telefone</label>
      <input type="text" name="telefone">
      <input type="submit" value="Cadastrar">
    </form>

  </div>





  <?php include_once("../servicos/rodape.php");
  ?>

</body>

</html>