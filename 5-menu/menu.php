<?php
  include ("../conexao.php");
  // phpinfo();
  // echo "<pre>";
  // print_r(PDO::getAvailableDrivers());
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
    <script language="Javascript" type="text/javascript" src="../1-js/app.js"></script>
    <title>Pelada Secreta - Incluir Lancamento</title>
  </head>
<!-- </html> -->

  <body>
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
      <div>
        <div class="divMenu">
            <nav>
              <a class="muda btn btn-info btnMenu" href=<?php 
                if($_SESSION['nome'] == 1) {
                  echo "incluirTabela.php";
                } else {
                  echo "#"; ?>
                  onClick="alerta()" <?php
                } ?>
              onclick="">Tabela</a>
            </nav>
            <nav>
              <a class="muda btn btn-info btnMenu" href=<?php 
                if($_SESSION['nome'] == 1) {
                  echo "lancamentos.php";
                } else {
                  echo "#"; ?>
                  onClick="alerta()" <?php
                } ?>
              onclick="">Caixa</a>
            </nav>
            <nav>
              <a class="muda btn btn-info btnMenu" href=<?php 
                if($_SESSION['nome'] == 1) {
                  echo "jogador.php"; 
                } else {
                  echo "#"; ?>
                  onClick="alerta()" <?php
                } ?>
              onclick="">Jogador</a>
            </nav>
        </div>
      </div>
    </main>
    <footer>
			<img id="logoFooter" src="../1-img/logoBranco.png">
			<p class="copyright">by Douglas Aguiar - 2020</p>
    </footer>
    <!-- <script type="text/javascript" src="js/app.js"></script> -->
  </body>
</html>