<?php
   include('config.php'); // chama a página de configuração
   session_start(); // função do php que inicia a sessão.
   
   $user_check = $_SESSION['login_user']; // obter login do usuário na sessão
   
   $ses_sql = mysqli_query($db, "select nome from usuarios where login = '$user_check' "); // obter nome do usuários
   
   $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

   $login_session = $row['nome']; // adicionar o nome do usuário na variavel de sessão

   if(!isset($_SESSION['login_user'])){ // se não exise algum usuário logado, redireciona para o login
      header("location:login.php");
      die();
   }
?>