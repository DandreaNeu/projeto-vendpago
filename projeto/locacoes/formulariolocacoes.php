<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <title>Projeto VendPago</title>
  <link href="../../src/css/estilo.css" rel="stylesheet">
  <link href="../../src/css/locacoes.css" rel="stylesheet">
</head>

<body class="container">
  <?php
  include_once("../../servicos/topo.php");
  ?>
  <div class="container_locacoes">
    <h2>Locações</h2>

    <form action="agenda.php">
      <label for="clientes">Clientes</label>
      <select id="clientes"></select>
      <label for="tituloslocados">Títulos</label>
      <select id="tituloslocados"></select>
      <label for="dataretirada">Data Retirada</label>
      <input type="date" name="dataretirada">
      <label for="dataentrega">Data Entrega</label>
      <input type="date" name="dataentrega">
      <input type="submit" value="Cadastrar Locação">

    </form>

  </div>
  <script src="./../../src/js/jquery.js"></script>

  <script>
    function retornarCliente(data) {
      console.log(data);
      var clientes = "<option selected='selected' hidden>Selecione o Cliente</option>";
      $.each(data, function(chave, valor) {
        clientes += '<option value="' + valor.clienteID + '">' + valor.nome + '</option>';
      });
      $('#clientes').html(clientes);
    };
    $('#clientes').change(function(e) {
      var clienteID = ((this).val());

    });
  </script>
  <script src="http://localhost/vendpago/servicos/cliente/retornarCliente.php?callback=retornarCliente"></script>
  <script src="http://localhost/vendpago/servicos/titulo/retornarTitulos.php?callback=retornarTitulos"></script>

  <?php include_once("../../servicos/rodape.php");
  ?>


</body>

</html>