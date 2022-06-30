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

    <form id="formulario_cadastrolocacao">
      <label for="cliente">Clientes</label>
      <select id="cliente" name="cliente" require></select>
      <label for="titulo">Títulos</label>
      <select id="titulo" name="titulo" require></select>
      <label for="dataretirada">Data Retirada</label>
      <input type="date" name="dataretirada" require>
      <label for="dataentrega">Data Entrega</label>
      <input type="date" name="dataentrega" require>
      <input type="submit" value="Cadastrar">


      <div id="mensagem">
        <p></p>
      </div>
    </form>

  </div>


  <script src="./../../src/js/jquery.js"></script>
  <script>
    $("#formulario_cadastrolocacao").submit(function(e) {
      e.preventDefault();
      var formulario = $(this);
      var retorno = inserirFormulario(formulario)
    });

    function inserirFormulario(dados) {
      $.ajax({
        type: "POST",
        data: dados.serialize(),
        url: "./../../servicos/locacaotitulo/cadastrolocacoes.php",
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
        console.log("Falhou")
      }
    }

    function retornarCliente(data) {
      var clientes = "<option selected='selected' hidden>Selecione o Cliente</option>";
      $.each(data, function(chave, valor) {
        clientes += '<option value="' + valor.clienteID + '">' + valor.nome + '</option>';
      });
      $('#cliente').html(clientes);
    };

    function retornarTitulos(data) {
      var titulos = "<option selected='selected' hidden>Selecione o Título</option>";
      $.each(data, function(chave, valor) {
        titulos += '<option value="' + valor.tituloID + '">' + valor.nome + '</option>';
      });
      $('#titulo').html(titulos);
    };
  </script>
  <script src="http://localhost/vendpago/servicos/cliente/retornarCliente.php?callback=retornarCliente"></script>
  <script src="http://localhost/vendpago/servicos/titulo/retornarTitulos.php?callback=retornarTitulos"></script>

  <?php include_once("../../servicos/rodape.php");
  ?>


</body>

</html>