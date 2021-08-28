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
              <li><a class="headerLogin" href="../5-menu/menu.php">Menu</a></li>
              <li><a class="headerLogin" href="../6-scout/scout.php">Scout</a></li>
              <li><a class="headerLogin atual" href="../7-caixa/caixa.php">Caixa</a></li>
            </ul>
          </nav>
        </div>
    </header>
    <main>

      <div>
        <form method="POST" action="incluirLancamento.php">
          <div class="form-group">
            <div class="formCol">
              <div>
                <label>Conta</label>
                <select name="sConta" class="form-control" required>
                  <option></option>
                  <?php 
                    $qConta = "select * from Conta order by idConta, conta desc";
                    $resultConta = mysqli_query($conn, $qConta);
                    while ($rowConta = mysqli_fetch_assoc($resultConta)) { ?>
                      <option value="<?php echo $rowConta['idConta']; ?>"><?php echo $rowConta['conta']; ?></options>
                      <?php
                    }
                  ?>
                </select>
              </div>
              <div>
                <label>Jogador</label>
                <select name="sJogador" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "select * from Jogador order by idJogador, mensalista desc";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>
              </div>
            </div>  
            <label>Valor</label>
            <input type="int" name="valor" class="form-control" placeholder="Informe o valor" required><br/>
            
            <label>Observacao</label>
            <input type="text" name="obs" class="form-control" placeholder="Observação"><br/>
            
            <label>Data Previsão</label>
            <input type="date" name="dt_previsao" class="form-control" placeholder="Previsão de Recebimento/Pagamento" required><br/>
            
            <label>Data Baixa</label>
            <input type="date" name="dt_baixa" class="form-control" placeholder="Data de Recebimento/Pagamento"><br/>
            
            <input type="submit" name="insert" class="btnVoltar" value="Inserir"><br/>
          </div>
          <nav>
            <a class="muda btn btn-info btnVoltar" href="caixa.php" onclick="">Voltar</a>
          </nav>
        </form>
      </div>
      <?php
        if (isset($_POST['insert'])) {
          $conta = $_POST['sConta'];
          $jogador = $_POST['sJogador'];
          $valor = $_POST['valor'];
          $obs = $_POST['obs'];
          $dataPrevisao = $_POST['dt_previsao'];
          $dataBaixa = $_POST['dt_baixa'];

          if ($jogador == '') {
            $jogador = '99';
          } else {
            $jogador = $jogador;
          }

          if ($dataBaixa =='') {
            $dataBaixa = null;
          } else {
            $dataBaixa = $dataBaixa;
          }

          $inserirConta = "INSERT INTO Lancamento
            (idConta, idJogador, valor, obsLancamento, dtPrevisao, dtBaixa)
            values
            ('$conta', '$jogador', '$valor', '$obs', '$dataPrevisao', '$dataBaixa')";

          $executarConta = mysqli_query($conn, $inserirConta);
          echo $conta;?><br/><?php
          echo $jogador;?><br/><?php
          echo $valor;?><br/><?php
          echo $obs;?><br/><?php
          echo $dataPrevisao;?><br/><?php
          echo $dataBaixa;?><br/><?php
          if ($executarConta) {
            echo "<h3>Inserido corretamente!</h3>";
          }
        }
      ?>
    </main>
    <footer>
			<img id="logoFooter" src="../1-img/logoBranco.png">
			<p class="copyright">by Douglas Aguiar - 2020</p>
    </footer>
    <!-- <script type="text/javascript" src="js/app.js"></script> -->
  </body>
</html>