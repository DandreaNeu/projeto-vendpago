<?php
include_once("../../servicos/conexao/conexao.php");


if (isset($_POST["cliente"])) {
  $datalocado = $_POST["dataretirada"];
  $dataretorno = $_POST["dataentrega"];
  $clienteID = utf8_decode($_POST["cliente"]);
  $tituloID = utf8_decode($_POST["titulo"]);

  $cadastrar = "INSERT INTO tituloslocados ";
  $cadastrar .= " (datalocado,dataretorno,clienteID,tituloID) ";
  $cadastrar .= " VALUES ";
  $cadastrar .= " ('$datalocado','$dataretorno',$clienteID,$tituloID)";

  $retorno = array();

  $cadastro_locacoes = mysqli_query($conecta, $cadastrar);

  if ($cadastro_locacoes) {
    $retorno["sucesso"] = true;
    $retorno["mensagem"] = "Locação cadastrada com sucesso.";
  } else {
    $retorno["sucesso"] = false;
    $retorno["mensagem"] = "Falha no cadastro.";
  }

  echo json_encode($retorno);
} else {
  $retorno = array();
  $retorno["sucesso"] = false;
  $retorno["mensagem"] = "Falha no cadastro.";
  echo json_encode($retorno);
}
