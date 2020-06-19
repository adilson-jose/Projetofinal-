<?php
   define('DB_SERVER', 'localhost:3306'); // variável para armazenar o endereço do servidor
   define('DB_USERNAME', 'root'); // variável para armazenar o nome do usuário do servidor
   define('DB_PASSWORD', ''); // variável para armazenar a senha do usuário do servidor
   define('DB_DATABASE', 'vagas'); // variável para armazenar o nome do banco de dados no servidor
   $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE); // conectar ao banco mysql no servidor nos enderços das variáveis

   // Check connection
   // verificar se a conexão existe.
   if (!$db) {
     die("Connection failed: " . mysqli_connect_error());
   }
   //echo "Connected successfully";

?>