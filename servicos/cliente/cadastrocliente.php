<?php
include_once("../../servicos/conexao/conexao.php");


if (isset($_POST["nome"])) {
  $nome = utf8_decode($_POST["nome"]);
  $email = utf8_decode($_POST["email"]);
  $telefone = utf8_decode($_POST["telefone"]);

  $cadastrar = "INSERT INTO clientes ";
  $cadastrar .= "(nome,email,telefone)";
  $cadastrar .= "VALUES ";
  $cadastrar .= "('$nome','$email','$telefone')";


  $retorno = array();

  $cadastro_cliente = mysqli_query($conecta, $cadastrar);

  if ($cadastro_cliente) {
    $retorno["sucesso"] = true;
    $retorno["mensagem"] = "Cliente cadastrado com sucesso.";
  } else {
    $retorno["sucesso"] = false;
    $retorno["mensagem"] = "Falha no cadastro.";
  }

  echo json_encode($retorno);
}
mysqli_close($conecta);
