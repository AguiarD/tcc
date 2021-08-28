<?php
  include ("../conexao.php");
  session_start();
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
		<title>Pelada Secreta - Scout</title>
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
            <li><a class="headerLogin" href="../5-tabela/incluirTabela.php">Tabela</a></li>
            <li><a class="headerLogin atual" href="scout.php">Scout</a></li>
            <li><a class="headerLogin" href="../7-caixa/caixa.php">Caixa</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <main>
    <form method="POST" action="">
        <div class="form-group">
          <input type="int" name="ano" class="form-control" placeholder="Ano"><br/>
          <!-- <input type="int" name="mes" class="form-control" placeholder="Mes"><br/> -->
          <input class="btn" name="pesquisar" type="submit" value="pesquisar">
        </div>
      </form>

      <?php 
        if (isset($_POST['pesquisar'])){
          $pesquisarAno = $_POST['ano'];
          // $pesquisarMes = $_POST['mes'];
          
          if($pesquisarAno != '' ){
            $pesquisarAno = $pesquisarAno;
          } else {
            $pesquisarAno = date("Y");
          }
        } else {
          $pesquisarAno = date("Y");
        }
        // if($pesquisarMes != '' ){
        //   $pesquisarMes = $pesquisarMes;
        // } else {
        //   $pesquisarMes = date("m");
        // }

        
        // echo $pesquisarMes. "/" .$pesquisarAno;
        // echo $pesquisarMes;
      ?>
      <div class="containerScout"><?php 

        $query_select = " select descJogador as Nome, sum(pontoPresenca) as Pontos, 
          format((sum(pontoPresenca)/sum(presenca)),2) as M_Pontos, 
          concat(format((sum(pontoPresenca)/((sum(presenca)+sum(falta))*4)*100),2),'%') as Aproveit, 
          sum(gol) as Gol, format(sum(gol)/sum(presenca), 2) as M_Gol, sum(assist) as Assis,
          sum(presenca) as Presenca, sum(falta) as Falta, 
          sum(vitoria) as Vitoria, sum(empate) as Empate, sum(derrota) as Derrota 
          from scout
          where anoPartida = $pesquisarAno 
          and 
          mensalista = 'S'
          and
          idParametro <> 'G'
          group by Nome
          order by (Pontos) desc;";

        $result_select = mysqli_query($conn, $query_select) or die(mysqli_error($conn));

        echo "
          <table class='table table-sm table-striped table-hover table-responsive-md text-center'>
            <thead>
              <tr>
                <th>Nome</th>
                <th>Pontos</th>
                <th>M Pontos</th>
                <th>Aprov</th>
                <th>Gols</th>
                <th>M Gols</th>
                
                <th>Presenca</th>
                <th>Falta</th>
                <th>Vitoria</th>
                <th>Empate</th>
                <th>Derrota</th>
              </tr>
            </thead>
            <tbody>
              ";
              while ($row = mysqli_fetch_array($result_select)) {
                $nome = $row['Nome'];
                $ponto = $row['Pontos'];
                $mPontos = $row['M_Pontos'];
                $aproveitamento = $row['Aproveit'];
                $gol = $row['Gol'];
                $mGol = $row['M_Gol'];
                $assistencia = $row['Assis'];
                $presenca = $row['Presenca'];
                $falta = $row['Falta'];
                $vitoria = $row['Vitoria'];
                $empate = $row['Empate'];
                $derrota = $row['Derrota'];
                echo
                "
                <tr>
                  <td>".$nome."</td>
                  <td>".$ponto."</td>
                  <td>".$mPontos."</td>
                  <td>".$aproveitamento."</td>
                  <td>".$gol."</td>
                  <td>".$mGol."</td>
                  
                  <td>".$presenca."</td>
                  <td>".$falta."</td>
                  <td>".$vitoria."</td>
                  <td>".$empate."</td>
                  <td>".$derrota."</td>
                </tr>
              ";}
              echo
              "
              </tbody>
          </table>
        "
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