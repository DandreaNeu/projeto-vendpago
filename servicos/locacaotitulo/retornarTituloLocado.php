<?php
$callback = isset($_GET['callback']) ?  $_GET['callback'] : false;
$conecta = mysqli_connect("localhost", "root", "", "vendpago");

if (isset($_GET["clienteID"])) {
  $clienteID = $_GET["clienteID"];
} else {
  $clienteID = 0;
}
$novo = "SELECT * FROM tituloslocados ";
$novo .= " JOIN titulos ON titulos.tituloID = tituloslocados.tituloID";
$novo .= " WHERE tituloslocados.clienteID = {$clienteID}";

$titulos = mysqli_query($conecta, $novo);

$retorno = array();
while ($linha = mysqli_fetch_object($titulos)) {
  $retorno[] = $linha;
}
echo json_encode($retorno);
mysqli_close($conecta);
