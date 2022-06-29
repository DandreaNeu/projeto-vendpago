<?php
$conecta = mysqli_connect("localhost", "root", "", "vendpago");
if (mysqli_connect_errno()) {
  die("Conexão falhou" . mysqli_connect_errno());
}

if (isset($_POST["datalocado"])) {
  $datalocado = utf8_decode($_POST["datalocado"]);
  $dataretorno = utf8_decode($_POST["dataretorno"]);
  $clienteID = utf8_decode($_POST["clienteID"]);
  $tituloID = utf8_decode($_POST["tituloID"]);

  $cadastrar = "INSERT INTO tituloslocados ";
  $cadastrar .= "(datalocado,dataretorno,clienteID,tituloID)";
  $cadastrar .= "VALUES ";
  $cadastrar .= "($datalocado,$dataretorno,$clienteID,$tituloID)";

  $retorno = array();

  $cadastro_locacoes = mysqli_query($conecta, $cadastrar);

  if ($cadastro_titulo_locacoes) {
    $retorno["sucesso"] = true;
    $retorno["mensagem"] = "Locação cadastrada com sucesso.";
  } else {
    $retorno["sucesso"] = false;
    $retorno["mensagem"] = "Falha no cadastro.";
  }

  echo json_encode($retorno);
}
