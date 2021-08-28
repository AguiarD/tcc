<?php 

  class Usuario {

    private $pdo;
    public $msgErro = "";

    public function conectar($nome, $host, $usuario, $senha) {
      global $pdo;
      try {
        $pdo = new PDO("mysql:dbname=".$nome."host=".$host,$usuario,$senha);
      } catch (PDOException $e) {
        $msgErro = $e->getMessage();
      }
      
    }
    
    public function cadastrar($usuario, $login, $senha) {
      global $pdo;
      //verificar se já existe o login cadastrado
      $verificarUsuario = $pdo->prepare("SELECT LOGIN FROM USUARIOS WHERE LOGIN = :l");
      $verificarUsuario->bindeValue(":l",$login);
      $verificarUsuario->execute();
      if ($verificarUsuario->rowCount() > 0) {
        return false; //já está cadastrado
      }else {
        //caso não tenha cadastro, cadatrar
        $verificarUsuario = $pdo->prepare("INSERT INTO USUARIOS ('USUARIO', 'LOGIN', 'SENHA') VALUES (:u, :l, :s)");
        $verificarUsuario->bindeValue(":u",$usuario);
        $verificarUsuario->bindeValue(":l",$login);
        $verificarUsuario->bindeValue(":s",$senha);
        $verificarUsuario->execute();
        return true; //tuudo ok
      }
    }
    
    public function logar($email, $senha) {
      global $pdo;
      //verificar se o email e senha estão cadastrados, se sim
      //entrar no sistema (sessao)
      $logarUsuario = $pdo->prepare("SELECT ID_USUARIO FROM USUARIOS WHERE USUARIO = :l AND SENHA = :s");
      $verificarUsuario->bindValue(":l",$login);
      $verificarUsuario->bindValue(":s",$senha);
      $verificarUsuario->execute();
      if ($verificarUsuario->rowCount() > 0) {
        $dado = $verificarUsuario->fetch();
        session_start();
        $_SESSION['id_usuario'] = $dado['ID_USUARIO'];
        return true; //logado com sucesso
      } else {
        return false; //nao foi possivel logar
      }
    }
  }

?>