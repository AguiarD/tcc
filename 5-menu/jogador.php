<?php
  include ("../conexao.php");
  session_start();
  if ($_SESSION['nome'] == 1 or $_SESSION['nome'] == 2) {
    // echo "Logado com sucesso!";
  } else {
    // $_SESSION['loginErro'] = "Problemas!!!!";
    header("location: ../4-login/login.php");
  }
?>

<!DOCTYPE html>

<html lang="pt-br">

  <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="../1-css/reset.css" />
		<link rel="stylesheet" type="text/css" href="../1-css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="../1-css/style.css" />
		<link rel="stylesheet" type="text/css" href="../1-css/styleBootstrap.css" />
		<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
		<!-- CSS Externo -->
		<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
    <link rel="sortcut icon" href="../1-img/logo.ico" type="image/x-icon" />
		<link rel="sortcut icon" href="../1-img/logo_ico.ico" type="image/png" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <title>Pelada Secreta - Jogador</title>
  </head>
  
  <body>
    <b id="topo"></b>
    <script type='text/javascript'>

    </script>
    <header class="cabecalho">
      <div class="caixa">
        <h1><img id="logo" src="../1-img/logo.png"></h1>

        <nav>
          <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../2-galeria/galeria.html">Galeria</a></li>
            <li><a href="../3-contatos/contatos.html">Contatos</a></li>
            <li><a href="../4-login/login.php">Login</a></li>
          </ul>
          <ul>
            <li><a class="headerLogin atual" href="../5-menu/menu.php">Menu</a></li>
            <li><a class="headerLogin" href="../6-scout/scout.php">Scout</a></li>
            <li><a class="headerLogin" href="../7-caixa/caixa.php">Caixa</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <main>
      <br>
      <div class="containerInserir">
        <nav>
          <a class="muda btn btn-info btnVoltar" href="incluirLancamento.php" onclick="">Incluir</a>
        </nav>
      </div>
      <div class="containerConta"><?php 

        $query_select = "SELECT * FROM Jogador WHERE descJogador NOT IN ('CONTRA', 'DELETAR') ORDER BY idJogador, mensalista DESC";

        $result_select = mysqli_query($conn, $query_select) or die(mysqli_error($conn));

        echo "
          <table id='tabela' class='table table-sm table-striped table-hover table-responsive-md text-center'>
            <thead>
              <tr>
                <th>Nome</th>
                <th>Mensalista</th>
                <th>Observação</th>
              </tr>
            </thead>
            <tbody>
              ";
              while ($row = mysqli_fetch_array($result_select)) {
                $idJogador = $row['idJogador'];
                $nome = $row['descJogador'];
                $mensalista = $row['mensalista'];
                $obs = $row['obsJogador'];
                $logJogador = $row['logJogador'];
                $editar = '<a href="editarJogador.php?id='.$row['idJogador'].'">Edit</a>';

                echo
                "
                <tr>
                  <td>".$nome."</td>
                  <td>".$mensalista."</td>
                  <td>".$obs."</td>
                  <td>".$editar."</td>
                </tr>
              ";}
              echo
              "
              </tbody>
          </table>
        "
      ?></div>

      <?php
        if(isset($_GET['editarJogador'])){
          include("editarJogador.php");
        }
      ?>

      <div class="linkInterno">
        <a class="voltar" href="#topo">Início</a>
      </div>
    </main>
    <footer>
			<img id="logoFooter" src="../1-img/logoBranco.png">
			<p class="copyright">by Douglas Aguiar - 2020</p>
    </footer>
    <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
      $('#tabela').DataTable();
      } );
    </script>
    <!-- <script type="text/javascript" src="js/app.js"></script> -->
  </body>
</html>