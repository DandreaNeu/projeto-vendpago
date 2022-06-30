<?php
include_once("../../servicos/conexao/conexao.php");

$callback = isset($_GET['callback']) ?  $_GET['callback'] : false;


$selecao = "SELECT clienteID , nome FROM clientes";
$clientes = mysqli_query($conecta, $selecao);

$retorno = array();
while ($linha = mysqli_fetch_object($clientes)) {
  $retorno[] = $linha;
}
echo ($callback ? $callback . '(' : '') . json_encode($retorno) . ($callback ? ')' : '');
mysqli_close($conecta);
