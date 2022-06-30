<?php
include_once("../../servicos/conexao/conexao.php");

if (isset($_POST["nome"])) {
  $nome = utf8_decode($_POST["nome"]);
  $descricao = utf8_decode($_POST["descricao"]);


  $cadastrar = "INSERT INTO titulos ";
  $cadastrar .= "(nome,descricao)";
  $cadastrar .= "VALUES ";
  $cadastrar .= "('$nome','$descricao')";


  $retorno = array();

  $cadastro_titulo = mysqli_query($conecta, $cadastrar);

  if ($cadastro_titulo) {
    $retorno["sucesso"] = true;
    $retorno["mensagem"] = "Título cadastrado com sucesso.";
  } else {
    $retorno["sucesso"] = false;
    $retorno["mensagem"] = "Falha no cadastro.";
  }

  echo json_encode($retorno);
}
mysqli_close($conecta);
