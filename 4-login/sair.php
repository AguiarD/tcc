<?php 
  session_start();

  unset (
    $_SESSION['loginErro']
  );

  header('Locatio: login.php');

?>