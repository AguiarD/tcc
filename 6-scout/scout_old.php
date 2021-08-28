<?php
  include ("conexao.php")
?>

<!DOCTYPE html>

<html lang="pt-br">
  <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
		<!-- CSS Externo -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<title>Pelada Secreta</title>
  </head>
  
  <body>
  <header class="cabecalho">
			<div class="caixa">
				<h1><img id="logo" src="logo.png"></h1>

				<nav>
					<ul>
						<li><a class="atual" href="index.html">Home</a></li>
						<li><a href="galeria.html">Galeria</a></li>
						<li><a href="contatos.html">Contatos</a></li>
						<li><a href="login.html">Login</a></li>
					</ul>
				</nav>
			</div>
    </header>
      <main>
        <!-- <table class="table table-striped"> -->
          <!-- <thead>
            <tr>
              <th>Nome</th>;
              <th>Pontos</th>;
              <th>M Pontos</th>;
              <th>Aprov</th>;
              <th>Gols</th>;
              <th>M Gols</th>;
              <th>Assis</th>;
              <th>Presenca</th>;
              <th>Falta</th>;
              <th>Vitoria</th>;
              <th>Empate</th>;
              <th>Derrota</th>;
            </tr>
          </thead> -->

          <?php 

            // $query_select = " select descJogador as Nome, sum(pontoPresenca) as Pontos, 
            // format((sum(pontoPresenca)/sum(presenca)),2) as M_Pontos, 
            // concat(format((sum(pontoPresenca)/((sum(presenca)+sum(falta))*4)*100),2),'%') as Aproveit, 
            // sum(gol) as Gol, format(sum(gol)/sum(presenca), 2) as M_Gol, sum(assist) as Assis,
            // sum(presenca) as Presença, sum(falta) as Falta, 
            // sum(vitoria) as Vitoria, sum(empate) as Empate, sum(derrota) as Derrota 
            // from scout
            // where anoPartida = '2020' 
            // and 
            // mensalista = 'S'
            // and
            // idParametro <> 'G'
            // group by Nome
            // order by (Pontos) desc;";

            $query_select = "select * from scout";

            $result_select = mysqli_query($conn, $query_select) or die(mysql_error());

            // while ($fila = mysqli_fetch_array($result_select)) {
            //   $nome = $fila['Nome'];
            //   $ponto = $fila['Pontos'];
            //   $mPonto = $fila['M_Pontos'];
            //   $aproveitamento = $fila['Aproveit'];
            //   $gol = $fila['Gol'];
            //   $mGol = $fila['M_Gol'];
            //   $assistencia = $fila['Assis'];
            //   $presenca = $fila['Presenca'];
            //   $falta = $fila['Falta'];
            //   $vitoria = $fila['Vitoria'];
            //   $empate = $fila['Empate'];
            //   $derrota = $fila['Derrota'];
            //   $i++;

            echo
            "
            <table class='table table-striped table-bordered text-center'>
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Pontos</th>
                  <th>M Pontos</th>
                  <th>Aprov</th>
                  <th>Gols</th>
                  <th>M Gols</th>
                  <th>Assis</th>
                  <th>Presenca</th>
                  <th>Falta</th>
                  <th>Vitoria</th>
                  <th>Empate</th>
                  <th>Derrota</th>
                  <th>Teste</th>
                  <th>Teste2</th>
                  <th>Teste3</th>
                  <th>Teste4</th>
                  <th>Teste5</th>
                  <th>Teste6</th>
                  <th>Teste7</th>
                </tr>
                <tbody>
                ";
                while ($row = mysqli_fetch_array($result_select)) {
                  echo
                  "
                  <tr>
                    <td>".$row['idScout']."</td>
                    <td>".$row['dtPartida']."</td>
                    <td>".$row['diaPartida']."</td>
                    <td>".$row['mesPartida']."</td>
                    <td>".$row['anoPartida']."</td>
                    <td>".$row['idJogador']."</td>
                    <td>".$row['descJogador']."</td>
                    <td>".$row['mensalista']."</td>
                    <td>".$row['presenca']."</td>
                    <td>".$row['falta']."</td>
                    <td>".$row['idParametro']."</td>
                    <td>".$row['ponto']."</td>
                    <td>".$row['pontoPresenca']."</td>
                    <td>".$row['vitoria']."</td>
                    <td>".$row['empate']."</td>
                    <td>".$row['derrota']."</td>
                    <td>".$row['gol']."</td>
                    <td>".$row['assist']."</td>
                    <td>".$row['logScout']."</td>
                  </tr>
                ";}
                echo
                "
                </tbody>
              </thead>
            </table>
            "

          ?>

          <!-- <tr>
            <td><?php echo $nome; ?></td>
            <td><?php echo $ponto; ?></td>
            <td><?php echo $mPonto; ?></td>
            <td><?php echo $aproveitamento; ?></td>
            <td><?php echo $gol; ?></td>
            <td><?php echo $mGol; ?></td>
            <td><?php echo $assistencia; ?></td>
            <td><?php echo $presenca; ?></td>
            <td><?php echo $falta; ?></td>
            <td><?php echo $vitoria; ?></td>
            <td><?php echo $empate; ?></td>
            <td><?php echo $derrota; ?></td>
          </tr>
           -->
          

        <!-- </table> -->
      </main>

  </body>
</html>