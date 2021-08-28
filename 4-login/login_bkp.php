<?php
  include "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Pelada Secreta - Login</title>
  </head>
  <body>
    <b id="topo"></b>
    <header>
      <div class="caixa">
        <h1><img id="logo" src="img/logo.png"></h1>

        <nav>
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="galeria.html">Galeria</a></li>
            <li><a href="contatos.html">Contatos</a></li>
            <li><a class="atual" href="login.php">Login</a></li>
          </ul>
        </nav>
      </div>
      </header>
      <main>
        <form action="" class="formLogin">
          <label for="email">Email</label>
          <input class="inputLogin" type="text" name="login" id="cEmail" required placeholder="email@dominio.com" maxlength="255">

          <label for="senha">Senha</label>
          <input class="inputLogin" type="password" name="senha" id="cSenha" required placeholder="senha" maxlength="255">

          <input class="btnEnviar" name="entrar" type="submit" value="Entrar">

          <a class="esqueciSenha" href="scout.php">Esqueci minha senha!</a>

        </form>
            
        <?php 
          if(isset($_POST['entrar'])){
            $login = $_POST['login'];
            $senha = md5($_POST['senha']);
            $queryUsuario = "select * from USUARIOS where LOGIN='$login' and SENHA='$senha'";
            $selectUsuario = mysqli_query($queryUsuario, $conn);
            $totalRegistros = mysqli_num_rows($selectUsuario);
            if($totalRegistros > 0) {
              header("Location:scout.php");
              echo "Login efetuado!";
            } else {
               echo "Dados invalidos!";
            }
          }
        ?>

        <div class="linkInterno">
          <a class="voltar" href="#topo">Início</a>
        </div>
      </main>
      <footer>
        <img id="logoFooter" src="img/logoBranco.png">
        <p class="copyright">by Douglas Aguiar - 2020</p>
      </footer>
      <script type="text/javascript" src="js/app.js"></script>

    </body>
</html>
<!-- 
  ?php
  require_once "conexao.php";

  session_start ();

  $login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE;

  $senha = isse($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;

  if(!$login || !$senha){
    echo "Precisa informar Login e Senha!";
    exit;
  }

  $SQL = "select ID_USUARIO, USUARIO, LOGIN, SENHA, NIVEL
  FRON USUARIOS
  WHERE LOGIN = "" . $login . """;
  $result_id = @mysql_query($SQL) or die("Erro no Banco de Dados!");
  $total = @mysql_num_rows($result_id);

  if($total){
    $dados = @mysql_fecth_array($result_id);

    if(!strcmp($senha, $dados["SENHA"])){
      $_SESSION["id_usuario"] = $dados[""];
      $_SESSION["nome_usuario"] = stripslashes($dados["USUARIO"]);
      $_SESSION["permissao"] = stripslashes($dados["NIVEL"]);
      header("Location index.php");
      exit;

    }
    else  {
      "Senha Invalida!";
      exit;
    }
  }
  else {
    echo "O Login inexistente!";
    exit;
  }
  ? 
-->
