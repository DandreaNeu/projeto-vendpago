<?php
$conecta = mysqli_connect("localhost", "root", "", "vendpago");
if (mysqli_connect_errno()) {
  die("Conexão falhou : " . mysqli_connect_errno());
}
?>


<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <title>Projeto VendPago</title>
  <link href="../../src/css/estilo.css" rel="stylesheet">
  <link href="../../src/css/cadastrocliente.css" rel="stylesheet">
</head>

<body class="container">
  <?php
  include_once("../../servicos/topo.php");
  ?>

  <div class="container_cadastro_cliente">
    <h2>Cadastro de Cliente</h2>

    <form id="formulario_cadastrocliente">
      <label for="nome">Nome</label>
      <input type="text" name="nome">
      <label for="email">Email</label>
      <input type="text" name="email">
      <label for="telefone">Telefone</label>
      <input type="text" name="telefone">
      <input type="submit" value="Cadastrar">

      <div id="mensagem">
        <p></p>
      </div>

    </form>

  </div>


  <script src="jquery.js">
  </script>
  <script>
    $("#formulario_cadastrocliente").submit(function(e) {
      e.preventDefault();
      var formulario = $(this);
      var retorno = inserirFormulario(formulario)
    });

    function inserirFormulario(dados) {
      $.ajax({
        type: "POST",
        data: dados.serialize(),
        url: "cadastrocliente.php",
        async: false
      }).then(sucesso, falha);

      function sucesso(data) {
        $sucesso = $.parseJSON(data)["sucesso"];
        $mensagem = $.parseJSON(data)["mensagem"];
        $('#mensagem').show();
        if ($sucesso) {
          $('#mensagem p').html($mensagem);
        } else {
          $('#mensagem p').html($mensagem);
        }
      }

      function falha() {

      }
    }
  </script>

  <?php include_once("../../servicos/rodape.php");
  ?>

</body>

</html>