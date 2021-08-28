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

  if (isset($_GET['id'])) {
    $idConta = mysqli_escape_string($conn, $_GET['id']);
    $editarConta = "select l.idLancamento, if(c.tipoConta='R', 'Receita', 'Despesa') Tipo, l.valor, c.idConta, c.conta, j.idJogador, j.descJogador, l.obsLancamento, 
    DATE_FORMAT(l.dtPrevisao, '%d-%m-%Y') as 'Previsao', 
    DATE_FORMAT(l.dtBaixa, '%d-%m-%Y') as 'Data Baixa' 
    from lancamento l
    left join conta c 
    on l.idConta = c.idConta
    left join jogador j
    on l.idJogador = j.idJogador
    where l.idLancamento = $idConta
    order by l.dtBaixa, c.tipoConta desc
    ";

    $updateConta = mysqli_query($conn, $editarConta);

    $resultList = mysqli_fetch_array($updateConta);

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
    <title>Pelada Secreta - Editar Lancamento</title>
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
              <li><a class="headerLogin atual" href="caixa.php">Caixa</a></li>
            </ul>
          </nav>
        </div>
    </header>
    <main>

      <div>
        <form method="POST" action="editarLancamento.php">
          <div class="form-group">
          <?php
            if (isset($_POST['edit'])) {
              $id = $_POST['idL'];
              $conta = $_POST['uConta'];
              $jogador = $_POST['uJogador'];
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

              $editarConta = "UPDATE lancamento SET idConta = '$conta', 
              idJogador = '$jogador', 
              valor = '$valor', 
              obsLancamento = '$obs', 
              dtPrevisao = '$dataPrevisao', 
              dtBaixa = '$dataBaixa' 
              where idLancamento = '$id'";

              // if (mysqli_query($conn, $editarConta)) {
              //   $_SESSION['mensagem'] = "Alterado com sucesso!";
              //   header('Location: caixa.php');
              // } else {
              //   $_SESSION['mensagem'] = "Erro ao cadastrar!";
              //   header('Location: caixa.php');
              // }
              $executarConta = mysqli_query($conn, $editarConta);
              echo $id;?><br/><?php
              echo $conta;?><br/><?php
              echo $jogador;?><br/><?php
              echo $valor;?><br/><?php
              echo $obs;?><br/><?php
              echo $dataPrevisao;?><br/><?php
              echo $dataBaixa;?><br/><?php
              if ($executarConta) {
                $_SESSION['message'] = "Alterado com sucesso!";
                $_SESSION['msg_type'] = "warning";
                header("Location: caixa.php");
              }
            }
          ?>
            <label>ID Lancamento</label>
            <input type="int" name="idL" class="form-control" value="<?php echo $resultList['idLancamento'] ?>" placeholder="Informe o valor" readonly><br/>
                        
            <div class="formCol">
              <div>
                
                <label>Conta</label>
                <select name="uConta" class="form-control" required>
                  <option><?php echo $resultList['idConta']?></option>
                  <?php
                    $qConta = "select * from conta order by idConta, conta desc";
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
                <select name="uJogador" class="form-control">
                  <option><?php echo $resultList['idJogador']?></option>
                  <?php 
                    $qJogador = "select * from jogador order by idJogador, mensalista desc";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador'];?>"><?php echo $rowJogador['descJogador'];?></options>
                      <?php
                    }
                  ?>
                </select>
              </div>
            </div>  
            <label>Valor</label>
            <input type="int" name="valor" class="form-control" value="<?php echo $resultList['valor'] ?>" placeholder="Informe o valor" required><br/>
            
            <label>Observacao</label>
            <input type="text" name="obs" class="form-control" value="<?php echo $resultList['obsLancamento'] ?>" placeholder="Observação"><br/>
            
            <label>Data Previsão - (<?php echo $resultList['Previsao'] ?>)</label>
            <input type="date" name="dt_previsao" class="form-control" required><br/>
            
            <label>Data Baixa - (<?php echo $resultList['Data Baixa'] ?>)</label>
            <input type="date" name="dt_baixa" class="form-control" ><br/>
            
            <input type="submit" name="edit" class="btnVoltar" value="Editar" ><br/>
          </div>
          <nav>
            <a class="muda btn btn-info btnVoltar" href="caixa.php" onclick="">Voltar</a>
          </nav>
        </form>
      </div>
      
    </main>
    <footer>
			<img id="logoFooter" src="../1-img/logoBranco.png">
			<p class="copyright">by Douglas Aguiar - 2020</p>
    </footer>
    <!-- <script type="text/javascript" src="js/app.js"></script> -->
  </body>
</html>