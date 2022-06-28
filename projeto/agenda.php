<?php require_once("../conexao/conexao.php") ?>


<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <title>Projeto VendPago</title>
  <link href="../src/css/estilo.css" rel="stylesheet">
  <link href="../src/css/agenda.css" rel="stylesheet">
</head>

<body class="container">
  <?php
  include_once("../servicos/topo.php");
  ?>
  <div class="container_agenda">
    <h2>Agenda de Retirada e Entrega</h2>

    <form action="agenda.php">
      <label for="cliente">Cliente</label>
      <input type="text" name="cliente">
      <label for="titulo">Título</label>
      <input type="text" name="titulo">
      <label for="dataretirada">Data Retirada</label>
      <input type="date" name="dataretirada">
      <label for="dataentrega">Data Entrega</label>
      <input type="date" name="dataentrega">

    </form>

  </div>





  <?php include_once("../servicos/rodape.php");
  ?>

</body>

</html>