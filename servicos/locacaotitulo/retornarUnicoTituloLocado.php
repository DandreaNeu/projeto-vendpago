<?php
include_once("../../servicos/conexao/conexao.php");

if (isset($_GET["locadoID"])) {
  $id = $_GET["locadoID"];
}

$selecao = "SELECT datalocado, dataretorno FROM tituloslocados";
$selecao .= " WHERE locadoID = {$id}";
$locado = mysqli_query($conecta, $selecao);

$retorno = array();
while ($linha = mysqli_fetch_object($locado)) {
  $retorno[] = $linha;
}
echo json_encode($retorno[0]);
mysqli_close($conecta);
