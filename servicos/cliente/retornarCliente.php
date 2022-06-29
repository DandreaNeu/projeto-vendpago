<?php
$callback = isset($_GET['callback']) ?  $_GET['callback'] : false;
$conecta = mysqli_connect("localhost", "root", "", "vendpago");

$selecao = "SELECT clienteID , nome FROM clientes";
$clientes = mysqli_query($conecta, $selecao);

$retorno = array();
while ($linha = mysqli_fetch_object($clientes)) {
  $retorno[] = $linha;
}
echo ($callback ? $callback . '(' : '') . json_encode($retorno) . ($callback ? ')' : '');
mysqli_close($conecta);
