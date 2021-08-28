<?php 
  
  include "../conexao.php";
  // session_start();
  // $_SESSION['nome'] = "douglas";
    
    if((isset($_POST['login'])) && (isset($_POST['senha']))) {
    
      if(isset($_POST['entrar'])){
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $queryUsuario = "select * from usuarios where LOGIN='$login' and SENHA='$senha' and DT_EXPIRAR >= curdate()";
        $selectUsuario = mysqli_query($conn, $queryUsuario);
        $totalRegistros = mysqli_num_rows($selectUsuario);
        
        while ($select = mysqli_fetch_array($selectUsuario)) {
          $qUsuario = $select['USUARIO'];
          $qLogin = $select['LOGIN'];
          $qSenha = $select['SENHA'];
          $qNivel = $select['NIVEL'];
          $qDtExpirar = $select['DT_EXPIRAR'];
        }

        //-------------lembrar de validar acesso por nivel e acompanher nas telas depois logoff
        if(($totalRegistros > 0) && ($qNivel == 1)) {
          session_start();
          $_SESSION['nome'] = $qNivel;
          // if ($nivelAcessoUsuario == 1) {
          header('Location: ../6-scout/scout.php');
          echo "Login efetuado!";
          // }
        } elseif (($totalRegistros > 0) && ($qNivel == 2)) {
          session_start();
          $_SESSION['nome'] = $qNivel;
          header('Location: ../6-scout/scout.php');
          echo "Login efetuado!";
        } else {
          session_start();
          $_SESSION['loginErro'] = "Dados invalidos, ou senha expirou!";
          header('Location: ../4-login/login.php');
          //  echo "Dados invalidos. Verificar o Cadastro!";
          echo $qNivel;
        }
      }
    } else {
      session_start();
      $_SESSION['loginErro'] = "Usuario, senha ou prazo expirado!";
      header('Location: ../4-login/login.php');
      echo $qNivel;
    }



?>