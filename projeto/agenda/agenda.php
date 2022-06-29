<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8" />
  <title>Projeto VendPago</title>
  <link href="../../src/css/estilo.css" rel="stylesheet">
  <link href="../../src/css/agenda.css" rel="stylesheet">
</head>

<body class="container">
  <?php
  include_once("../../servicos/topo.php");
  ?>
  <div class="container_agenda">
    <h2>Agenda de Retirada e Entrega</h2>

    <form action="agenda.php">
      <label for="clientes">Cliente</label>
      <select id="clientes"></select>
      <label for="tituloslocados">Títulos Locados</label>
      <select id="tituloslocados"></select>
      <label for="dataretirada">Data Retirada</label>
      <input type="date" name="dataretirada">
      <label for="dataentrega">Data Entrega</label>
      <input type="date" name="dataentrega">

    </form>

  </div>

  <script src="jquery.js"></script>
  <script>
    function retornarCliente(data) {
      var clientes = "<option selected='selected' hidden>Selecione o Cliente</option>";
      $.each(data, function(chave, valor) {
        clientes += '<option value="' + valor.clienteID + '">' + valor.nome + '</option>';
      });
      $('#clientes').html(clientes);
    }
    $('#clientes').change(function(e) {
      var clienteID = ($(this).val());

      $.ajax({
        type: "GET",
        data: "clienteID" + "=" + clienteID,
        url: "http://localhost/vendpago/projeto/agenda/retornarTituloLocado.php",
        async: false
      }).done(function(data) {
        var tituloslocados = "<option selected='selected' hidden>Selecione o Título</option>";
        $.each($.parseJSON(data), function(chave, valor) {
          tituloslocados += '<option value="' + valor.tituloID + '">' + valor.nome + '</option>';
        });
        $('#tituloslocados').html(tituloslocados);
      });

    });
  </script>
  <script src="http://localhost/vendpago/projeto/agenda/retornarcliente.php?callback=retornarCliente">
  </script>
  <?php include_once("../../servicos/rodape.php");
  ?>

</body>

</html>