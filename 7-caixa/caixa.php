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
    <title>Pelada Secreta - Caixa</title>
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
            <li><a class="headerLogin" href="../5-menu/menu.php">Menu</a></li>
            <li><a class="headerLogin" href="../6-scout/scout.php">Scout</a></li>
            <li><a class="headerLogin atual" href="caixa.php">Caixa</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <main>
      <form method="POST" action="">
        <div class="form-group">
          <input type="int" name="ano" class="form-control" placeholder="Ano"><br/>
          <input type="int" name="mes" class="form-control" placeholder="Mes"><br/>
          <input class="btn" name="pesquisar" type="submit" value="pesquisar">
        </div>
      </form>

      <?php
        $hoje = date("d/m/Y");
        // echo $hoje;
        // $dataPesquisa = $_POST['mes'].$_POST['ano'];
        // echo $dataPesquisa;
        if (isset($_POST['pesquisar'])) {
          $pesquisarAno = $_POST['ano'];
          $pesquisarMes = $_POST['mes'];
          
          if($pesquisarAno != '' ){
            $pesquisarAno = $pesquisarAno;
          } else {
            $pesquisarAno = date("Y");
          }
          
          if($pesquisarMes != '' ){
            $pesquisarMes = $pesquisarMes;
          } else {
            $pesquisarMes = date("m");
          }
        } else {
          $pesquisarAno = date("Y");
          $pesquisarMes = date("m");
        }
        
        // echo $pesquisarMes. "/" .$pesquisarAno;
        // echo $pesquisarMes;
      ?>
      <!-- <div class="containerInserir">
        <nav>
          <a class="muda btn btn-info btnVoltar" href="incluirLancamento.php" onclick="">Incluir</a>
        </nav>
      </div> -->
      <div class="containerConta"><?php 

        $query_select = " select l.idLancamento, if(c.tipoConta='R', 'Receita', 'Despesa') Tipo, l.valor, c.conta, j.descJogador, l.obsLancamento, 
        DATE_FORMAT(l.dtPrevisao, '%d-%m-%Y') as 'Previsão', 
        DATE_FORMAT(if(l.dtBaixa='0000-00-00',null,l.dtBaixa), '%d-%m-%Y') as 'Data Baixa' 
        from lancamento l
        left join conta c 
        on l.idConta = c.idConta
        left join jogador j
        on l.idJogador = j.idJogador
        where year(l.dtPrevisao) = $pesquisarAno
        and month(l.dtPrevisao) = $pesquisarMes
        and l.inativo is null
        order by l.dtBaixa, c.tipoConta desc;";

        $result_select = mysqli_query($conn, $query_select) or die(mysqli_error($conn));

        echo "
          <table class='table table-sm table-striped table-hover table-responsive-md text-center'>
            <thead>
              <tr>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Conta</th>
                <th>Jogador</th>
                <th>Informação</th>
                <th>Data Baixa</th>
              </tr>
            </thead>
            <tbody>
              ";
              while ($row = mysqli_fetch_array($result_select)) {
                // $id = $row['idLancamento'];
                $tipo = $row['Tipo'];
                $valor = $row['valor'];
                $conta = $row['conta'];
                $jogador = $row['descJogador'];
                $obsLancamento = $row['obsLancamento'];
                // $previsao = $row['Previsão'];
                $dtBaixa = $row['Data Baixa'];
                // $editar = '<a href="editarLancamento.php?id='.$row['idLancamento'].'">Edit</a>';
                // $excluir = '<a href="caixa.php?removerId='.$row['idLancamento'].'">Exc</a>';

                if ($tipo == 'Receita') {
                  $colorResumo = "colorResumoR";
                } elseif ($tipo == 'Despesa') {
                  $colorResumo = "colorResumoD";
                } else {
                  $colorResumo = "colorResumoTotal";
                }

                echo
                "
                <tr>
                  <td>".$tipo."</td>
                  <td class=".$colorResumo.">".$valor."</td>
                  <td>".$conta."</td>
                  <td>".$jogador."</td>
                  <td>".$obsLancamento."</td>
                  <td>".$dtBaixa."</td>
                </tr>
              ";}
              echo
              "
              </tbody>
          </table>
        "
      ?></div>

      <?php
        if(isset($_GET['editarLancamento'])){
          include("editarLancamento.php");
        }
      ?>

      <?php 

        if (isset($_GET['removerId'])) {
          $excluirId = $_GET['removerId'];
          $qDelete = "UPDATE lancamento SET inativo = curdate() WHERE idLancamento = '$excluirId'";
          $executar = mysqli_query($conn, $qDelete);

          if ($executar) {
            echo "<script>alert('Lancamento removido!')</script>";
            echo "<script>window.open('caixa.php', '_self')</script>";
          }
        }

      ?>

      <div class="containerResumo" > <div><?php
        $query_select_conta = "select c.tipoConta, c.conta, sum(if(c.tipoConta='R', l.valor, 0)) Receita, 
        (sum(if(c.tipoConta='R', l.valor, 0)) + 
        sum(if(c.tipoConta='D', l.valor*(-1), 0))) Valor
        from lancamento l
        left join conta c 
        on l.idConta = c.idConta
        left join jogador j
        on l.idJogador = j.idJogador
        where year(l.dtPrevisao) = $pesquisarAno
        and month(l.dtPrevisao) = $pesquisarMes
        and l.inativo is null
        group by c.tipoConta DESC, c.conta with rollup";    
        
        $result_select_conta = mysqli_query($conn, $query_select_conta) or die(mysqli_error($conn));

        echo "
        <table class='table table-sm table-striped table-hover table-responsive-md text-center'>
          <thead>
            <tr>
              <th>Tipo</th>
              <th>Conta</th>
              <th>Valor</th>
            </tr>
          </thead>
          <tbody>
              ";
              while ($row = mysqli_fetch_array($result_select_conta)) {
                $cTipo = $row['tipoConta'];
                $cConta = $row['conta'];
                // $cReceita = $row['Receita'];
                // $cDespesa = $row['Despesa'];
                $cValor = $row['Valor'];
                
                if ($cTipo != '' and $cConta == '') {
                  $colorResumo = "colorResumoSubTotal";
                } elseif ($cTipo == 'D') {
                  $colorResumo = "colorResumoD";
                } elseif ($cTipo == 'R') {
                  $colorResumo = "colorResumoR";
                } else {
                  $colorResumo = "colorResumoTotal";
                }

                echo
                "
                <tr class=".$colorResumo.">
                  <td>".$cTipo."</td>
                  <td>".$cConta."</td>
                  <td>".$cValor."</td>
                </tr>
              ";}
              echo
              "
              </tbody>
          </table>
        "

        // --------------

        ?> </div>
        <div><?php
        $query_select_saldo = "select 'Previsao' Conta, (sum(if(c.tipoConta='R', l.valor, 0)) + sum(if(c.tipoConta='D', l.valor*(-1), 0))) Valor from lancamento l join conta c on l.idConta = c.idConta
          where l.inativo is null
        union
        select 'Prev Receita', (sum(if(c.tipoConta='R', l.valor, 0)) + sum(if(c.tipoConta='D', l.valor*(-1), 0))) Valor 
          from lancamento l
          join conta c
          on l.idConta = c.idConta
          where l.inativo is null
          and c.tipoConta='R'
          and (l.dtBaixa = '0000-00-00' or l.dtBaixa is null)
        union
        select 'Prev Despesa', (sum(if(c.tipoConta='R', l.valor, 0)) + sum(if(c.tipoConta='D', l.valor*(-1), 0))) Valor 
          from lancamento l
          join conta c
          on l.idConta = c.idConta
          where l.inativo is null
          and c.tipoConta='D'
            and (l.dtBaixa = '0000-00-00' or l.dtBaixa is null)
        union
        select 'Alcançado', (sum(if(c.tipoConta='R', l.valor, 0)) + sum(if(c.tipoConta='D', l.valor*(-1), 0))) Valor 
          from lancamento l
          join conta c
          on l.idConta = c.idConta
          where l.inativo is null
          and l.dtBaixa > 2000-01-01;";    
        
        $result_select_saldo = mysqli_query($conn, $query_select_saldo) or die(mysqli_error($conn));

        echo "
        <table class='table table-sm table-striped table-hover table-responsive-md text-center'>
          <thead>
            <tr>
              <th>Conta</th>
              <th>Valor</th>
            </tr>
          </thead>
          <tbody>
              ";
              while ($row = mysqli_fetch_array($result_select_saldo)) {
                $sConta = $row['Conta'];
                $sValor = $row['Valor'];
                
                // if ($cTipo != '' and $cConta == '') {
                //   $colorResumo = "colorResumoSubTotal";
                // } elseif ($cTipo == 'D') {
                //   $colorResumo = "colorResumoD";
                // } elseif ($cTipo == 'R') {
                //   $colorResumo = "colorResumoR";
                // } else {
                //   $colorResumo = "colorResumoTotal";
                // }

                echo
                "
                <tr>
                  <td>".$sConta."</td>
                  <td>".$sValor."</td>
                </tr>
              ";}
              echo
              "
              </tbody>
          </table>
        "


      ?></div></div>

      <div class="linkInterno">
        <a class="voltar" href="#topo">Início</a>
      </div>
    </main>
    <footer>
			<img id="logoFooter" src="../1-img/logoBranco.png">
			<p class="copyright">by Douglas Aguiar - 2020</p>
    </footer>
    <!-- <script type="text/javascript" src="js/app.js"></script> -->
  </body>
</html>