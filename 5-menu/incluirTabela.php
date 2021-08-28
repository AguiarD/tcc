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
    <title>Pelada Secreta - Incluir Tabela</title>
    <script language="JavaScript">
      function somaGolA(){
        document.formulario.sumGolA.value =
        Number(document.formulario.golA1.value) +
        Number(document.formulario.golA2.value) +
        Number(document.formulario.golA3.value) +
        Number(document.formulario.golA4.value) +
        Number(document.formulario.golA5.value) +
        Number(document.formulario.golA6.value) +
        Number(document.formulario.golA7.value) +
        Number(document.formulario.golA8.value) +
        Number(document.formulario.golA9.value) +
        Number(document.formulario.golA10.value);
      }
      function somaGolB(){
        document.formulario.sumGolB.value =
        Number(document.formulario.golB1.value) +
        Number(document.formulario.golB2.value) +
        Number(document.formulario.golB3.value) +
        Number(document.formulario.golB4.value) +
        Number(document.formulario.golB5.value) +
        Number(document.formulario.golB6.value) +
        Number(document.formulario.golB7.value) +
        Number(document.formulario.golB8.value) +
        Number(document.formulario.golB9.value) +
        Number(document.formulario.golB10.value);
      }
    </script>

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
        <form name="formulario" method="POST" action="incluirTabela.php">
          <div class="formTabela">
            
            <label>Data Partida</label>
            <input type="date" name="dt_partida" class="formData" placeholder="Data da partida" required><br/>
            <div class="formConfrontoTitulo"><label>Time A</label>
            <div><?php echo "X";?></div>
            <label>Time B</label></div>

            <div class="formConfronto">
            
              <!-- <div> -->
                <!-- <label>Time A</label> -->
                <div class="formEquipeA">
                  <select name="jogadorA1" class="form-control" required>
                    <option></option>
                    <?php 
                      $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                      $resultJogador = mysqli_query($conn, $qJogador);
                      while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                        <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                        <?php
                      }
                    ?>
                  </select>

                  <input type="number" name="golA1" class="form-control" onchange="somaGolA()">
                </div>
              <!-- </div> -->

              <!-- <div><?php echo "X";?></div> -->

              <!-- <div> -->
                <!-- <label>Time B</label> -->
                <div class="formEquipeA">
                    
                  <input type="number" name="golB1" class="form-control" onchange="somaGolB()">
                  
                  <select name="jogadorB1" class="form-control" required>
                    <option></option>
                    <?php 
                      $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                      $resultJogador = mysqli_query($conn, $qJogador);
                      while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                        <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                        <?php
                      }
                    ?>
                  </select>
                </div>
              <!-- </div> -->
            </div>

            <div class="formConfronto">                
              <div class="formEquipeA">
                <select name="jogadorA2" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>

                <input type="number" name="golA2" class="form-control" onchange="somaGolA()">
              </div>

              <!-- <div><?php echo "X";?></div> -->
                  
              <div class="formEquipeA">
                    
                <input type="number" name="golB2" class="form-control" onchange="somaGolB()">
                  
                <select name="jogadorB2" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>
              </div>
            </div>

            <div class="formConfronto">                
              <div class="formEquipeA">
                <select name="jogadorA3" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>

                <input type="number" name="golA3" class="form-control" onchange="somaGolA()">
              </div>

              <!-- <div><?php echo "X";?></div> -->
                  
              <div class="formEquipeA">
                    
                <input type="number" name="golB3" class="form-control" onchange="somaGolB()">
                  
                <select name="jogadorB3" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>
              </div>
            </div>

            <div class="formConfronto">                
              <div class="formEquipeA">
                <select name="jogadorA4" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>

                <input type="number" name="golA4" class="form-control" onchange="somaGolA()">
              </div>

              <!-- <div><?php echo "X";?></div> -->
                  
              <div class="formEquipeA">
                    
                <input type="number" name="golB4" class="form-control" onchange="somaGolB()">
                  
                <select name="jogadorB4" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>
              </div>
            </div>

            <div class="formConfronto">                
              <div class="formEquipeA">
                <select name="jogadorA5" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>

                <input type="number" name="golA5" class="form-control" onchange="somaGolA()">
              </div>

              <!-- <div><?php echo "X";?></div> -->
                  
              <div class="formEquipeA">
                    
                <input type="number" name="golB5" class="form-control" onchange="somaGolB()">
                  
                <select name="jogadorB5" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>
              </div>
            </div>

            <div class="formConfronto">                
              <div class="formEquipeA">
                <select name="jogadorA6" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>

                <input type="number" name="golA6" class="form-control" onchange="somaGolA()">
              </div>

              <!-- <div><?php echo "X";?></div> -->
                  
              <div class="formEquipeA">
                    
                <input type="number" name="golB6" class="form-control" onchange="somaGolB()">
                  
                <select name="jogadorB6" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>
              </div>
            </div>

            <div class="formConfronto">                
              <div class="formEquipeA">
                <select name="jogadorA7" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>

                <input type="number" name="golA7" class="form-control" onchange="somaGolA()">
              </div>

              <!-- <div><?php echo "X";?></div> -->
                  
              <div class="formEquipeA">
                    
                <input type="number" name="golB7" class="form-control" onchange="somaGolB()">
                  
                <select name="jogadorB7" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>
              </div>
            </div>

            <div class="formConfronto">                
              <div class="formEquipeA">
                <select name="jogadorA8" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>

                <input type="number" name="golA8" class="form-control" onchange="somaGolA()">
              </div>

              <!-- <div><?php echo "X";?></div> -->
                  
              <div class="formEquipeA">
                    
                <input type="number" name="golB8" class="form-control" onchange="somaGolB()">
                  
                <select name="jogadorB8" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>
              </div>
            </div>

            <div class="formConfronto">                
              <div class="formEquipeA">
                <select name="jogadorA9" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>

                <input type="number" name="golA9" class="form-control" onchange="somaGolA()">
              </div>

              <!-- <div><?php echo "X";?></div> -->
                  
              <div class="formEquipeA">
                    
                <input type="number" name="golB9" class="form-control" onchange="somaGolB()">
                  
                <select name="jogadorB9" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>
              </div>
            </div>

            <div class="formConfronto">                
              <div class="formEquipeA">
                <select name="jogadorA10" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>

                <input type="number" name="golA10" class="form-control" onchange="somaGolA()">
              </div>

              <!-- <div><?php echo "X";?></div> -->
                  
              <div class="formEquipeA">
                    
                <input type="number" name="golB10" class="form-control" onchange="somaGolB()">
                  
                <select name="jogadorB10" class="form-control">
                  <option></option>
                  <?php 
                    $qJogador = "SELECT * FROM Jogador ORDER BY idJogador, mensalista DESC";
                    $resultJogador = mysqli_query($conn, $qJogador);
                    while ($rowJogador = mysqli_fetch_assoc($resultJogador)) { ?>
                      <option value="<?php echo $rowJogador['idJogador']; ?>"><?php echo $rowJogador['descJogador']; ?></options>
                      <?php
                    }
                  ?>
                </select>
              </div>
            </div>
            <br>
            <div class="formConfronto">                
              <div class="formEquipeA">
                <div></div>
                <input type="int" name="sumGolA" class="form-control" readonly>
              </div>

              <!-- <div><?php echo "X";?></div> -->
                  
              <div class="formEquipeA">
                <input type="int" name="sumGolB" class="form-control" readonly>
                <div></div>
              </div>
            </div>            

            <br/>
            <input type="submit" name="insert" class="btnVoltar" value="Inserir">
            <br/>

          </div>

          <nav>
            <a class="muda btn btn-info btnVoltar" href="menu.php" onclick="">Voltar</a>
          </nav>

        </form>
      </div>
      
      <?php

        if (isset($_POST['insert'])) {
          $dataPartida = date($_POST['dt_partida']);
          $diaPartida = date( 'd', strtotime($dataPartida) );
          $mesPartida = date( 'm', strtotime($dataPartida) );
          $anoPartida = date( 'Y', strtotime($dataPartida) );
          
          echo "Partida realizada no dia ". $dataPartida;?><br><?php
          echo "Dia ". $diaPartida;?><br><?php
          echo "Mes ". $mesPartida;?><br><?php
          echo "Ano ". $anoPartida;?><br><?php
          echo "-------------------------------------------------------------------";?><br><?php

          //Time A - Apagar echo
          //JOGADOR A1

          $jogadorA1 = $_POST['jogadorA1'];    
          // criar função para query pegando id de jogador como parametro
          $qJogadorA1 = "SELECT * FROM Jogador WHERE idJogador = $jogadorA1 ORDER BY idJogador, mensalista DESC";
          $resultJogadorA1 = mysqli_query($conn, $qJogadorA1);
          $rowJogadorA1 = mysqli_fetch_assoc($resultJogadorA1);
          $mensalistaJogadorA1 = $rowJogadorA1['mensalista'];
          $descJogadorA1 = $rowJogadorA1['descJogador'];    
          
          echo "Primeiro jogador time A: ".$jogadorA1;?><br><?php
          echo "Primeiro jogador time A: ".$descJogadorA1;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorA1;?><br><?php
          echo "---";?><br><?php
          
          $presencaA1 = 1;

          if ($_POST['golA1'] != '') {
            $golA1 = $_POST['golA1'];
          } else {
            $golA1 = 0;
          }
          
          //JOGADOR A2
          if ($_POST['jogadorA2'] != '') {
            $jogadorA2 = $_POST['jogadorA2'];
            $qJogadorA2 = "SELECT * FROM Jogador WHERE idJogador = $jogadorA2 ORDER BY idJogador, mensalista DESC";
            $resultJogadorA2 = mysqli_query($conn, $qJogadorA2);
            $rowJogadorA2 = mysqli_fetch_assoc($resultJogadorA2);
            $descJogadorA2 = $rowJogadorA2['descJogador'];
            $mensalistaJogadorA2 = $rowJogadorA2['mensalista'];
          } else {
            $rowJogadorA2 = null;
            $jogadorA2 = 100;
            $descJogadorA2 = 'DELETAR';
            $mensalistaJogadorA2 = 0;
          }
          // $rowJogadorA2 = mysqli_fetch_assoc($resultJogadorA2);
          // $mensalistaJogadorA2 = $rowJogadorA2['mensalista'];
          // $descJogadorA2 = $rowJogadorA2['descJogador'];

          echo "Segundo jogador time A: ".$jogadorA2;?><br><?php
          echo "Segundo jogador time A: ".$descJogadorA2;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorA2;?><br><?php
          echo "-------------------------------------------------------------------";?><br><?php

          $presencaA2 = 1;

          if ($_POST['golA2'] != '') {
            $golA2 = $_POST['golA2'];
          } else {
            $golA2 = 0;
          }

          //JOGADOR A3 (alterar 25 nomes de variaveis)
          if ($_POST['jogadorA3'] != '') {
            $jogadorA3 = $_POST['jogadorA3'];
            $qJogadorA3 = "SELECT * FROM Jogador WHERE idJogador = $jogadorA3 ORDER BY idJogador, mensalista DESC";
            $resultJogadorA3 = mysqli_query($conn, $qJogadorA3);
            $rowJogadorA3 = mysqli_fetch_assoc($resultJogadorA3);
            $descJogadorA3 = $rowJogadorA3['descJogador'];
            $mensalistaJogadorA3 = $rowJogadorA3['mensalista'];
          } else {
            $rowJogadorA3 = null;
            $jogadorA3 = 100;
            $descJogadorA3 = 'DELETAR';
            $mensalistaJogadorA3 = 0;
          }

          echo "Terceiro jogador time A: ".$jogadorA3;?><br><?php
          echo "Terceiro jogador time A: ".$descJogadorA3;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorA3;?><br><?php
          echo "-------------------------------------------------------------------";?><br><?php

          $presencaA3 = 1;

          if ($_POST['golA3'] != '') {
            $golA3 = $_POST['golA3'];
          } else {
            $golA3 = 0;
          }          
          
          //JOGADOR A4 (alterar 25 nomes de variaveis)
          if ($_POST['jogadorA4'] != '') {
            $jogadorA4 = $_POST['jogadorA4'];
            $qJogadorA4 = "SELECT * FROM Jogador WHERE idJogador = $jogadorA4 ORDER BY idJogador, mensalista DESC";
            $resultJogadorA4 = mysqli_query($conn, $qJogadorA4);
            $rowJogadorA4 = mysqli_fetch_assoc($resultJogadorA4);
            $descJogadorA4 = $rowJogadorA4['descJogador'];
            $mensalistaJogadorA4 = $rowJogadorA4['mensalista'];
          } else {
            $rowJogadorA4 = null;
            $jogadorA4 = 100;
            $descJogadorA4 = 'DELETAR';
            $mensalistaJogadorA4 = 0;
          }

          echo "Terceiro jogador time A: ".$jogadorA4;?><br><?php
          echo "Terceiro jogador time A: ".$descJogadorA4;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorA4;?><br><?php
          echo "-------------------------------------------------------------------";?><br><?php

          $presencaA4 = 1;

          if ($_POST['golA4'] != '') {
            $golA4 = $_POST['golA4'];
          } else {
            $golA4 = 0;
          }          

          //JOGADOR A5 (alterar 25 nomes de variaveis)
          if ($_POST['jogadorA5'] != '') {
            $jogadorA5 = $_POST['jogadorA5'];
            $qJogadorA5 = "SELECT * FROM Jogador WHERE idJogador = $jogadorA5 ORDER BY idJogador, mensalista DESC";
            $resultJogadorA5 = mysqli_query($conn, $qJogadorA5);
            $rowJogadorA5 = mysqli_fetch_assoc($resultJogadorA5);
            $descJogadorA5 = $rowJogadorA5['descJogador'];
            $mensalistaJogadorA5 = $rowJogadorA5['mensalista'];
          } else {
            $rowJogadorA5 = null;
            $jogadorA5 = 100;
            $descJogadorA5 = 'DELETAR';
            $mensalistaJogadorA5 = 0;
          }

          echo "Terceiro jogador time A: ".$jogadorA5;?><br><?php
          echo "Terceiro jogador time A: ".$descJogadorA5;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorA5;?><br><?php
          echo "-------------------------------------------------------------------";?><br><?php

          $presencaA5 = 1;

          if ($_POST['golA5'] != '') {
            $golA5 = $_POST['golA5'];
          } else {
            $golA5 = 0;
          }          


          //JOGADOR A6 (alterar 25 nomes de variaveis)
          if ($_POST['jogadorA6'] != '') {
            $jogadorA6 = $_POST['jogadorA6'];
            $qJogadorA6 = "SELECT * FROM Jogador WHERE idJogador = $jogadorA6 ORDER BY idJogador, mensalista DESC";
            $resultJogadorA6 = mysqli_query($conn, $qJogadorA6);
            $rowJogadorA6 = mysqli_fetch_assoc($resultJogadorA6);
            $descJogadorA6 = $rowJogadorA6['descJogador'];
            $mensalistaJogadorA6 = $rowJogadorA6['mensalista'];
          } else {
            $rowJogadorA6 = null;
            $jogadorA6 = 100;
            $descJogadorA6 = 'DELETAR';
            $mensalistaJogadorA6 = 0;
          }

          echo "Terceiro jogador time A: ".$jogadorA6;?><br><?php
          echo "Terceiro jogador time A: ".$descJogadorA6;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorA6;?><br><?php
          echo "-------------------------------------------------------------------";?><br><?php

          $presencaA6 = 1;

          if ($_POST['golA6'] != '') {
            $golA6 = $_POST['golA6'];
          } else {
            $golA6 = 0;
          }          

          //JOGADOR A7 (alterar 25 nomes de variaveis)
          if ($_POST['jogadorA7'] != '') {
            $jogadorA7 = $_POST['jogadorA7'];
            $qJogadorA7 = "SELECT * FROM Jogador WHERE idJogador = $jogadorA7 ORDER BY idJogador, mensalista DESC";
            $resultJogadorA7 = mysqli_query($conn, $qJogadorA7);
            $rowJogadorA7 = mysqli_fetch_assoc($resultJogadorA7);
            $descJogadorA7 = $rowJogadorA7['descJogador'];
            $mensalistaJogadorA7 = $rowJogadorA7['mensalista'];
          } else {
            $rowJogadorA7 = null;
            $jogadorA7 = 100;
            $descJogadorA7 = 'DELETAR';
            $mensalistaJogadorA7 = 0;
          }

          echo "Terceiro jogador time A: ".$jogadorA7;?><br><?php
          echo "Terceiro jogador time A: ".$descJogadorA7;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorA7;?><br><?php
          echo "-------------------------------------------------------------------";?><br><?php

          $presencaA7 = 1;

          if ($_POST['golA7'] != '') {
            $golA7 = $_POST['golA7'];
          } else {
            $golA7 = 0;
          }          

          //JOGADOR A8 (alterar 25 nomes de variaveis)
          if ($_POST['jogadorA8'] != '') {
            $jogadorA8 = $_POST['jogadorA8'];
            $qJogadorA8 = "SELECT * FROM Jogador WHERE idJogador = $jogadorA8 ORDER BY idJogador, mensalista DESC";
            $resultJogadorA8 = mysqli_query($conn, $qJogadorA8);
            $rowJogadorA8 = mysqli_fetch_assoc($resultJogadorA8);
            $descJogadorA8 = $rowJogadorA8['descJogador'];
            $mensalistaJogadorA8 = $rowJogadorA8['mensalista'];
          } else {
            $rowJogadorA8 = null;
            $jogadorA8 = 100;
            $descJogadorA8 = 'DELETAR';
            $mensalistaJogadorA8 = 0;
          }

          echo "Terceiro jogador time A: ".$jogadorA8;?><br><?php
          echo "Terceiro jogador time A: ".$descJogadorA8;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorA8;?><br><?php
          echo "-------------------------------------------------------------------";?><br><?php

          $presencaA8 = 1;

          if ($_POST['golA8'] != '') {
            $golA8 = $_POST['golA8'];
          } else {
            $golA8 = 0;
          }          

          //JOGADOR A9 (alterar 25 nomes de variaveis)
          if ($_POST['jogadorA9'] != '') {
            $jogadorA9 = $_POST['jogadorA9'];
            $qJogadorA9 = "SELECT * FROM Jogador WHERE idJogador = $jogadorA9 ORDER BY idJogador, mensalista DESC";
            $resultJogadorA9 = mysqli_query($conn, $qJogadorA9);
            $rowJogadorA9 = mysqli_fetch_assoc($resultJogadorA9);
            $descJogadorA9 = $rowJogadorA9['descJogador'];
            $mensalistaJogadorA9 = $rowJogadorA9['mensalista'];
          } else {
            $rowJogadorA9 = null;
            $jogadorA9 = 100;
            $descJogadorA9 = 'DELETAR';
            $mensalistaJogadorA9 = 0;
          }

          echo "Terceiro jogador time A: ".$jogadorA9;?><br><?php
          echo "Terceiro jogador time A: ".$descJogadorA9;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorA9;?><br><?php
          echo "-------------------------------------------------------------------";?><br><?php

          $presencaA9 = 1;

          if ($_POST['golA9'] != '') {
            $golA9 = $_POST['golA9'];
          } else {
            $golA9 = 0;
          }          

          //JOGADOR A10 (alterar 25 nomes de variaveis)
          if ($_POST['jogadorA10'] != '') {
            $jogadorA10 = $_POST['jogadorA10'];
            $qJogadorA10 = "SELECT * FROM Jogador WHERE idJogador = $jogadorA10 ORDER BY idJogador, mensalista DESC";
            $resultJogadorA10 = mysqli_query($conn, $qJogadorA10);
            $rowJogadorA10 = mysqli_fetch_assoc($resultJogadorA10);
            $descJogadorA10 = $rowJogadorA10['descJogador'];
            $mensalistaJogadorA10 = $rowJogadorA10['mensalista'];
          } else {
            $rowJogadorA10 = null;
            $jogadorA10 = 100;
            $descJogadorA10 = 'DELETAR';
            $mensalistaJogadorA10 = 0;
          }

          echo "Terceiro jogador time A: ".$jogadorA10;?><br><?php
          echo "Terceiro jogador time A: ".$descJogadorA10;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorA10;?><br><?php
          echo "-------------------------------------------------------------------";?><br><?php

          $presencaA10 = 1;

          if ($_POST['golA10'] != '') {
            $golA10 = $_POST['golA10'];
          } else {
            $golA10 = 0;
          }          


          //Time B - Apagar echo
          //JOGADOR B1
          
          $jogadorB1 = $_POST['jogadorB1'];
          $qJogadorB1 = "SELECT * FROM Jogador WHERE idJogador = $jogadorB1 ORDER BY idJogador, mensalista DESC";
          $resultJogadorB1 = mysqli_query($conn, $qJogadorB1);
          $rowJogadorB1 = mysqli_fetch_assoc($resultJogadorB1);
          $mensalistaJogadorB1 = $rowJogadorB1['mensalista'];
          $descJogadorB1 = $rowJogadorB1['descJogador'];

          echo "Primeiro jogador time B: ".$jogadorB1;?><br><?php
          echo "Primeiro jogador time B: ".$descJogadorB1;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorB1;?><br><?php
          echo "-";?><br><?php

          $presencaB1 = 1;

          if ($_POST['golB1'] != '') {
            $golB1 = $_POST['golB1'];
          } else {
            $golB1 = 0;
          }
          
          //JOGADOR B2
          if ($_POST['jogadorB2'] != '') {
            $jogadorB2 = $_POST['jogadorB2'];
            $qJogadorB2 = "SELECT * FROM Jogador WHERE idJogador = $jogadorB2 ORDER BY idJogador, mensalista DESC";
            $resultJogadorB2 = mysqli_query($conn, $qJogadorB2);
            $rowJogadorB2 = mysqli_fetch_assoc($resultJogadorB2);            
            $descJogadorB2 = $rowJogadorB2['descJogador'];
            $mensalistaJogadorB2 = $rowJogadorB2['mensalista'];
          } else {
            $rowJogadorB2 = null;
            $jogadorB2 = 100;
            $descJogadorB2 = 'DELETAR';
            $mensalistaJogadorB2 = 0;
          }

          // $rowJogadorB2 = mysqli_fetch_assoc($resultJogadorB2);
          // $mensalistaJogadorB2 = $rowJogadorB2['mensalista'];
          // $descJogadorB2 = $rowJogadorB2['descJogador'];
          
          
          echo "Segundo jogador time B: ".$jogadorB2;?><br><?php
          echo "Segundo jogador time B: ".$descJogadorB2;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorB2;?><br><?php
          echo "----------------------------------------------------------------------------------------";?><br><?php

          $presencaB2 = 1;

          if ($_POST['golB2'] != '') {
            $golB2 = $_POST['golB2'];
          } else {
            $golB2 = 0;
          }
          
          //JOGADOR B3
          if ($_POST['jogadorB3'] != '') {
            $jogadorB3 = $_POST['jogadorB3'];
            $qJogadorB3 = "SELECT * FROM Jogador WHERE idJogador = $jogadorB3 ORDER BY idJogador, mensalista DESC";
            $resultJogadorB3 = mysqli_query($conn, $qJogadorB3);
            $rowJogadorB3 = mysqli_fetch_assoc($resultJogadorB3);            
            $descJogadorB3 = $rowJogadorB3['descJogador'];
            $mensalistaJogadorB3 = $rowJogadorB3['mensalista'];
          } else {
            $rowJogadorB3 = null;
            $jogadorB3 = 100;
            $descJogadorB3 = 'DELETAR';
            $mensalistaJogadorB3 = 0;
          }
          
          echo "Segundo jogador time B: ".$jogadorB3;?><br><?php
          echo "Segundo jogador time B: ".$descJogadorB3;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorB3;?><br><?php
          echo "----------------------------------------------------------------------------------------";?><br><?php

          $presencaB3 = 1;

          if ($_POST['golB3'] != '') {
            $golB3 = $_POST['golB3'];
          } else {
            $golB3 = 0;
          }

          //JOGADOR B4
          if ($_POST['jogadorB4'] != '') {
            $jogadorB4 = $_POST['jogadorB4'];
            $qJogadorB4 = "SELECT * FROM Jogador WHERE idJogador = $jogadorB4 ORDER BY idJogador, mensalista DESC";
            $resultJogadorB4 = mysqli_query($conn, $qJogadorB4);
            $rowJogadorB4 = mysqli_fetch_assoc($resultJogadorB4);
            $descJogadorB4 = $rowJogadorB4['descJogador'];
            $mensalistaJogadorB4 = $rowJogadorB4['mensalista'];
          } else {
            $rowJogadorB4 = null;
            $jogadorB4 = 100;
            $descJogadorB4 = 'DELETAR';
            $mensalistaJogadorB4 = 0;
          }
          
          echo "Segundo jogador time B: ".$jogadorB4;?><br><?php
          echo "Segundo jogador time B: ".$descJogadorB4;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorB4;?><br><?php
          echo "----------------------------------------------------------------------------------------";?><br><?php

          $presencaB4 = 1;

          if ($_POST['golB4'] != '') {
            $golB4 = $_POST['golB4'];
          } else {
            $golB4 = 0;
          }

          //JOGADOR B5
          if ($_POST['jogadorB5'] != '') {
            $jogadorB5 = $_POST['jogadorB5'];
            $qJogadorB5 = "SELECT * FROM Jogador WHERE idJogador = $jogadorB5 ORDER BY idJogador, mensalista DESC";
            $resultJogadorB5 = mysqli_query($conn, $qJogadorB5);
            $rowJogadorB5 = mysqli_fetch_assoc($resultJogadorB5);
            $descJogadorB5 = $rowJogadorB5['descJogador'];
            $mensalistaJogadorB5 = $rowJogadorB5['mensalista'];
          } else {
            $rowJogadorB5 = null;
            $jogadorB5 = 100;
            $descJogadorB5 = 'DELETAR';
            $mensalistaJogadorB5 = 0;
          }
          
          echo "Segundo jogador time B: ".$jogadorB5;?><br><?php
          echo "Segundo jogador time B: ".$descJogadorB5;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorB5;?><br><?php
          echo "----------------------------------------------------------------------------------------";?><br><?php

          $presencaB5 = 1;

          if ($_POST['golB5'] != '') {
            $golB5 = $_POST['golB5'];
          } else {
            $golB5 = 0;
          }

          //JOGADOR B6
          if ($_POST['jogadorB6'] != '') {
            $jogadorB6 = $_POST['jogadorB6'];
            $qJogadorB6 = "SELECT * FROM Jogador WHERE idJogador = $jogadorB6 ORDER BY idJogador, mensalista DESC";
            $resultJogadorB6 = mysqli_query($conn, $qJogadorB6);
            $rowJogadorB6 = mysqli_fetch_assoc($resultJogadorB6);
            $descJogadorB6 = $rowJogadorB6['descJogador'];
            $mensalistaJogadorB6 = $rowJogadorB6['mensalista'];
          } else {
            $rowJogadorB6 = null;
            $jogadorB6 = 100;
            $descJogadorB6 = 'DELETAR';
            $mensalistaJogadorB6 = 0;
          }
          
          echo "Segundo jogador time B: ".$jogadorB6;?><br><?php
          echo "Segundo jogador time B: ".$descJogadorB6;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorB6;?><br><?php
          echo "----------------------------------------------------------------------------------------";?><br><?php

          $presencaB6 = 1;

          if ($_POST['golB6'] != '') {
            $golB6 = $_POST['golB6'];
          } else {
            $golB6 = 0;
          }

          //JOGADOR B7
          if ($_POST['jogadorB7'] != '') {
            $jogadorB7 = $_POST['jogadorB7'];
            $qJogadorB7 = "SELECT * FROM Jogador WHERE idJogador = $jogadorB7 ORDER BY idJogador, mensalista DESC";
            $resultJogadorB7 = mysqli_query($conn, $qJogadorB7);
            $rowJogadorB7 = mysqli_fetch_assoc($resultJogadorB7);
            $descJogadorB7 = $rowJogadorB7['descJogador'];
            $mensalistaJogadorB7 = $rowJogadorB7['mensalista'];
          } else {
            $rowJogadorB7 = null;
            $jogadorB7 = 100;
            $descJogadorB7 = 'DELETAR';
            $mensalistaJogadorB7 = 0;
          }
          
          echo "Segundo jogador time B: ".$jogadorB7;?><br><?php
          echo "Segundo jogador time B: ".$descJogadorB7;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorB7;?><br><?php
          echo "----------------------------------------------------------------------------------------";?><br><?php

          $presencaB7 = 1;

          if ($_POST['golB7'] != '') {
            $golB7 = $_POST['golB7'];
          } else {
            $golB7 = 0;
          }

          //JOGADOR B8
          if ($_POST['jogadorB8'] != '') {
            $jogadorB8 = $_POST['jogadorB8'];
            $qJogadorB8 = "SELECT * FROM Jogador WHERE idJogador = $jogadorB8 ORDER BY idJogador, mensalista DESC";
            $resultJogadorB8 = mysqli_query($conn, $qJogadorB8);
            $rowJogadorB8 = mysqli_fetch_assoc($resultJogadorB8);
            $descJogadorB8 = $rowJogadorB8['descJogador'];
            $mensalistaJogadorB8 = $rowJogadorB8['mensalista'];
          } else {
            $rowJogadorB8 = null;
            $jogadorB8 = 100;
            $descJogadorB8 = 'DELETAR';
            $mensalistaJogadorB8 = 0;
          }
          
          echo "Segundo jogador time B: ".$jogadorB8;?><br><?php
          echo "Segundo jogador time B: ".$descJogadorB8;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorB8;?><br><?php
          echo "----------------------------------------------------------------------------------------";?><br><?php

          $presencaB8 = 1;

          if ($_POST['golB8'] != '') {
            $golB8 = $_POST['golB8'];
          } else {
            $golB8 = 0;
          }

          //JOGADOR B9
          if ($_POST['jogadorB9'] != '') {
            $jogadorB9 = $_POST['jogadorB9'];
            $qJogadorB9 = "SELECT * FROM Jogador WHERE idJogador = $jogadorB9 ORDER BY idJogador, mensalista DESC";
            $resultJogadorB9 = mysqli_query($conn, $qJogadorB9);
            $rowJogadorB9 = mysqli_fetch_assoc($resultJogadorB9);
            $descJogadorB9 = $rowJogadorB9['descJogador'];
            $mensalistaJogadorB9 = $rowJogadorB9['mensalista'];
          } else {
            $rowJogadorB9 = null;
            $jogadorB9 = 100;
            $descJogadorB9 = 'DELETAR';
            $mensalistaJogadorB9 = 0;
          }
          
          echo "Segundo jogador time B: ".$jogadorB9;?><br><?php
          echo "Segundo jogador time B: ".$descJogadorB9;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorB9;?><br><?php
          echo "----------------------------------------------------------------------------------------";?><br><?php

          $presencaB9 = 1;

          if ($_POST['golB9'] != '') {
            $golB9 = $_POST['golB9'];
          } else {
            $golB9 = 0;
          }

          //JOGADOR B10
          if ($_POST['jogadorB10'] != '') {
            $jogadorB10 = $_POST['jogadorB10'];
            $qJogadorB10 = "SELECT * FROM Jogador WHERE idJogador = $jogadorB10 ORDER BY idJogador, mensalista DESC";
            $resultJogadorB10 = mysqli_query($conn, $qJogadorB10);
            $rowJogadorB10 = mysqli_fetch_assoc($resultJogadorB10);
            $descJogadorB10 = $rowJogadorB10['descJogador'];
            $mensalistaJogadorB10 = $rowJogadorB10['mensalista'];
          } else {
            $rowJogadorB10 = null;
            $jogadorB10 = 100;
            $descJogadorB10 = 'DELETAR';
            $mensalistaJogadorB10 = 0;
          }
          
          echo "Segundo jogador time B: ".$jogadorB10;?><br><?php
          echo "Segundo jogador time B: ".$descJogadorB10;?><br><?php
          echo "Mensalista? ".$mensalistaJogadorB10;?><br><?php
          echo "----------------------------------------------------------------------------------------";?><br><?php

          $presencaB10 = 1;

          if ($_POST['golB10'] != '') {
            $golB10 = $_POST['golB10'];
          } else {
            $golB10 = 0;
          }

          $totalGolA = $golA1 + $golA2 + $golA3 + $golA4 + $golA5 + $golA6 + $golA7 + $golA8 + $golA9 + $golA10;
          $totalGolB = $golB1 + $golB2 + $golB3 + $golB4 + $golB5 + $golB6 + $golB7 + $golB8 + $golB9 + $golB10;
          
          echo "Time A: ".$totalGolA;?><br><?php
          echo "Time B: ".$totalGolB;?><br><?php
          echo "-";?><br><?php
          
          $pontosA = 0;
          $vitoriaA = 0;
          $empateA = 0;
          $derrotaA = 0;

          $pontosB = 0;
          $vitoriaB = 0;
          $empateB = 0;
          $derrotaB = 0;
          
          if($totalGolA > $totalGolB) {
            $timeA = 'V';
            $pontosA = 4;
            $vitoriaA = 1;
            $empateA = 0;
            $derrotaA = 0;
            $timeB = 'D';
            $pontosB = 1;
            $vitoriaB = 0;
            $empateB = 0;
            $derrotaB = 1;
          } elseif ($totalGolA < $totalGolB) {
            $timeB = 'V';
            $pontosB = 4;
            $vitoriaB = 1;
            $empateB = 0;
            $derrotaB = 0;
            $timeA = 'D';
            $pontosA = 1;
            $vitoriaA = 0;
            $empateA = 0;
            $derrotaA = 1;
          } else {
            $timeA = 'E';
            $pontosA = 2;
            $vitoriaA = 0;
            $empateA = 1;
            $derrotaA = 0;
            $timeB = 'E';
            $pontosB = 2;
            $vitoriaA = 0;
            $empateA = 1;
            $derrotaA = 0;
          }

          echo "Time A: ".$timeA;?><br><?php
          echo "Time B: ".$timeB;?><br><?php
          echo "Pontos Time A: ".$pontosA;?><br><?php
          echo "Pontos Time B: ".$pontosB;?><br><?php
          echo "-----------------------------------------------------------------------------";?><br><?php

          $inserirScout = "INSERT INTO Scout 
          (dtPartida, diaPartida, mesPartida, anoPartida, idJogador, descJogador, 
          mensalista, presenca, falta, idParametro, ponto, pontoPresenca, vitoria, 
          empate, derrota, gol)
          VALUES 
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorA1, 
          '$descJogadorA1', '$mensalistaJogadorA1', $presencaA1, 0, '$timeA', $pontosA, 
          $pontosA, $vitoriaA, $empateA, $derrotaA, $golA1),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorA2, 
          '$descJogadorA2', '$mensalistaJogadorA2', $presencaA2, 0, '$timeA', $pontosA, 
          $pontosA, $vitoriaA, $empateA, $derrotaA, $golA2),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorA3, 
          '$descJogadorA3', '$mensalistaJogadorA3', $presencaA3, 0, '$timeA', $pontosA, 
          $pontosA, $vitoriaA, $empateA, $derrotaA, $golA3),          
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorA4, 
          '$descJogadorA4', '$mensalistaJogadorA4', $presencaA4, 0, '$timeA', $pontosA, 
          $pontosA, $vitoriaA, $empateA, $derrotaA, $golA4),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorA5, 
          '$descJogadorA5', '$mensalistaJogadorA5', $presencaA5, 0, '$timeA', $pontosA, 
          $pontosA, $vitoriaA, $empateA, $derrotaA, $golA5),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorA6, 
          '$descJogadorA6', '$mensalistaJogadorA6', $presencaA6, 0, '$timeA', $pontosA, 
          $pontosA, $vitoriaA, $empateA, $derrotaA, $golA6),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorA7, 
          '$descJogadorA7', '$mensalistaJogadorA7', $presencaA7, 0, '$timeA', $pontosA, 
          $pontosA, $vitoriaA, $empateA, $derrotaA, $golA7),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorA8, 
          '$descJogadorA8', '$mensalistaJogadorA8', $presencaA8, 0, '$timeA', $pontosA, 
          $pontosA, $vitoriaA, $empateA, $derrotaA, $golA8),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorA9, 
          '$descJogadorA9', '$mensalistaJogadorA9', $presencaA9, 0, '$timeA', $pontosA, 
          $pontosA, $vitoriaA, $empateA, $derrotaA, $golA9),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorA10, 
          '$descJogadorA10', '$mensalistaJogadorA10', $presencaA10, 0, '$timeA', $pontosA, 
          $pontosA, $vitoriaA, $empateA, $derrotaA, $golA10),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorB1, 
          '$descJogadorB1', '$mensalistaJogadorB1', $presencaB1, 0, '$timeB', $pontosB, 
          $pontosB, $vitoriaB, $empateB, $derrotaB, $golB1),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorB2, 
          '$descJogadorB2', '$mensalistaJogadorB2', $presencaB2, 0, '$timeB', $pontosB, 
          $pontosB, $vitoriaB, $empateB, $derrotaB, $golB2),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorB3, 
          '$descJogadorB3', '$mensalistaJogadorB3', $presencaB3, 0, '$timeB', $pontosB, 
          $pontosB, $vitoriaB, $empateB, $derrotaB, $golB3),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorB4, 
          '$descJogadorB4', '$mensalistaJogadorB4', $presencaB4, 0, '$timeB', $pontosB, 
          $pontosB, $vitoriaB, $empateB, $derrotaB, $golB4),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorB5, 
          '$descJogadorB5', '$mensalistaJogadorB5', $presencaB5, 0, '$timeB', $pontosB, 
          $pontosB, $vitoriaB, $empateB, $derrotaB, $golB5),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorB6, 
          '$descJogadorB6', '$mensalistaJogadorB6', $presencaB6, 0, '$timeB', $pontosB, 
          $pontosB, $vitoriaB, $empateB, $derrotaB, $golB6),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorB7, 
          '$descJogadorB7', '$mensalistaJogadorB7', $presencaB7, 0, '$timeB', $pontosB, 
          $pontosB, $vitoriaB, $empateB, $derrotaB, $golB7),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorB8, 
          '$descJogadorB8', '$mensalistaJogadorB8', $presencaB8, 0, '$timeB', $pontosB, 
          $pontosB, $vitoriaB, $empateB, $derrotaB, $golB8),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorB9, 
          '$descJogadorB9', '$mensalistaJogadorB9', $presencaB9, 0, '$timeB', $pontosB, 
          $pontosB, $vitoriaB, $empateB, $derrotaB, $golB9),
          ('$dataPartida', $diaPartida, $mesPartida, $anoPartida, $jogadorB10, 
          '$descJogadorB10', '$mensalistaJogadorB10', $presencaB10, 0, '$timeB', $pontosB, 
          $pontosB, $vitoriaB, $empateB, $derrotaB, $golB10)

          ";
          echo $inserirScout;?><br><?php
          //REMOVER COMENTARIO PARA INSERIR EM BD!!!!          $executarScout = mysqli_query($conn, $inserirScout);
          if ($executarScout) {
            echo "<h3>Inserido corretamente!</h3>";
          }

          echo "----------------------------------------------------------------------------------------";?><br><?php

          //query para retornar jogador mensalista que não estão nesta lista da partida

        }
      ?>
    </main>
    <footer>
			<img id="logoFooter" src="../1-img/logoBranco.png">
			<p class="copyright">by Douglas Aguiar - 2020</p>
    </footer>
    <!-- <script type="text/javascript" src="../1-js/app.js"></script> -->
  </body>
</html>