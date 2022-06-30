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

    <form>
      <label for="clientes">Cliente</label>
      <select id="clientes"></select>
      <label for="tituloslocados">Títulos Locados</label>
      <select id="tituloslocados"></select>
      <label for="datalocado">Data Retirada</label>
      <input id="datalocado" type="date" name="datalocado">
      <label for="dataretorno">Data Entrega</label>
      <input id="dataretorno" type="date" name="dataretorno">


      <div id="mensagem">
        <p></p>
      </div>


    </form>

  </div>

  <script src="./../../src/js/jquery.js"></script>
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
        url: "./../../servicos/locacaotitulo/retornarTituloLocado.php",
        async: false
      }).done(function(data) {
        var tituloslocados = "<option selected='selected' hidden>Selecione o Título</option>";
        $.each($.parseJSON(data), function(chave, valor) {
          tituloslocados += '<option value="' + valor.locadoID + '">' + valor.nome + '</option>';
        });
        $('#tituloslocados').html(tituloslocados);
      });
    });

    $("#tituloslocados").change(function(e) {
      var locadoID = ($(this).val());
      $.ajax({
        type: "GET",
        data: "locadoID" + "=" + locadoID,
        url: "./../../servicos/locacaotitulo/retornarUnicoTituloLocado.php",
        async: false
      }).done(function(data) {
        var retorno = $.parseJSON(data);
        $('#datalocado').val(retorno.datalocado);
        $('#dataretorno').val(retorno.dataretorno);

        var data = new Date();
        var dia = String(data.getDate()).padStart(2, '0');
        var mes = String(data.getMonth() + 1).padStart(2, '0');
        var ano = data.getFullYear();
        dataAtual = dia + '/' + mes + '/' + ano;

        if (retorno.dataretorno < dataAtual) {
          console.log("multa")
          $('#mensagem').show();
          $mensagem = "Cobrar multa de cliente por atraso !!!"
          $('#mensagem p').html($mensagem);
        }
      });

    });
  </script>
  <script src="http://localhost/vendpago/servicos/cliente/retornarCliente.php?callback=retornarCliente">
  </script>
  <?php include_once("../../servicos/rodape.php");
  ?>

</body>

</html>