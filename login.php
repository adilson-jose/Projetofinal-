<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

      $myusername = mysqli_real_escape_string($db, $_POST['username']); // pegar o usuário do metodo post
      $mypassword = mysqli_real_escape_string($db, $_POST['password']); // pgar a senha do metodo post
      
      $sql = "SELECT id FROM usuarios WHERE login = '$myusername' and senha = '$mypassword'";
      $result = mysqli_query($db, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      //$active = $row['active']; pega o campo ativo pra ver se o usuário ainda esta ativo
      
      $count = mysqli_num_rows($result); // conta a qtd de linhas q retornou
            
      // se achou algum registro, retorna uma linha
      if($count == 1) { // se retornou pelo menu uma linha
         $_SESSION['login_user'] = $myusername; // criar uma variavel de sessão cm o nome da pessoa que fez o login
         header("location: home.php"); // redirecionar para a página home.php
      }
      else {
         $error = "Seu Login ou Senha São Inválidos...";
      }
   }
?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="login.php"><img class="logo-img" src="assets/images/logo.png" alt="logo">
              </a><span class="splash-description">Preencha suas informações.</span>
            </div>
            <div class="card-body">
                <form action = "" method = "post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" name="username" type="text" placeholder="Usuário" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Lembrar Minha Senha</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Logar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>