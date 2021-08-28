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
    <title>Pelada Secreta - Scout</title>
    <script language="Javascript" type="text/javascript" src="../1-js/app.js"></script>
  </head>
  
  <body>
    <b id="topo"></b>
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
            <li><a class="headerLogin" href="../5-menu/menu.php"> Menu</a></li>
            <li><a class="headerLogin atual" href="scout.php">Scout</a></li>
            <li><a class="headerLogin" href="../7-caixa/caixa.php">Caixa</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <main>
      <form method="POST" action="">
        <div class="form-group">
          <label>Jogador</label>
            <select name="partidaDia" class="form-control">
              <option></option>
              <?php 
                $ano = date("Y");
                $qPartidaDia = "select distinct(dtPartida) from Scout where year(dtPartida) = $ano order by dtPartida desc";
                $resultPartidaDia = mysqli_query($conn, $qPartidaDia);
                while ($rowPartidaDia = mysqli_fetch_assoc($resultPartidaDia)) { ?>
                  <option value="<?php echo $rowPartidaDia['dtPartida']; ?>"><?php echo $rowPartidaDia['dtPartida']; ?></options>
                  <?php
                }
              ?>
            </select>
            <br>
          <input class="btn" name="pesquisar" type="submit" value="pesquisar">
        </div>
      </form>

      <div class="containerScout"><?php 
        if (isset($_POST['partidaDia'])) {
          $partidaDia = $_POST['partidaDia'];
          // echo $partidaDia;
          $query_select = " select idJogador, descJogador 
            from Jogador 
            WHERE 
            mensalista = 'S' 
            and 
            idJogador not in 
            (select idJogador from Scout where dtPartida = '$partidaDia');";

          $result_select = mysqli_query($conn, $query_select) or die(mysqli_error($conn));

          echo "
            <table class='table table-sm table-striped table-hover table-responsive-md text-center'>
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nome</th>
                </tr>
              </thead>
              <tbody>
                ";
                $i = 0;
                $dataPartida = date($_POST['partidaDia']);
                $diaPartida = date( 'd', strtotime($dataPartida) );
                $mesPartida = date( 'm', strtotime($dataPartida) );
                $anoPartida = date( 'Y', strtotime($dataPartida) );

                while ($row = mysqli_fetch_array($result_select)) {
                  $idJogador = $row['idJogador'];
                  $descJogador = $row['descJogador'];
                  $i++;
                  
                  $qInsereFalta = "INSERT INTO Scout 
                  ('dtPartida', diaPartida, mesPartida, anoPartida, idJogador, descJogador, mensalista, presenca, falta, idParametro, ponto, pontoPresenca, vitoria, empate, derrota, gol)
                  VALUES
                  ($dataPartida, $diaPartida, $mesPartida, $anoPartida, $idJogador, '$descJogador', 'S', 0, 1, 'F', 0, 0, 0, 0, 0, 0)
                  ";
                  // echo $qInsereFalta;
                  $executarInsert = mysqli_query($conn, $qInsereFalta) or die(mysqli_error($conn));
                  if ($executarInsert) {
                    echo "<h3>Inserido corretamente!</h3>";
                  }

                  echo
                  "
                  <tr>
                    <td>".$idJogador."</td>
                    <td>".$descJogador."</td>
                  </tr>
                ";}
                echo
                "
                </tbody>
            </table>
          "
        ;} else {
          echo 'Selecione a data!';
        }
        ?></div>

      <div class="linkInterno">
        <a class="voltar" href="#topo">Início</a>
      </div>
    </main>
    <footer>
			<img id="logoFooter" src="../1-img/logoBranco.png">
			<p class="copyright">by Douglas Aguiar - 2020</p>
    </footer>
    <script type="text/javascript" src="../1-js/app.js"></script>
  </body>
</html>