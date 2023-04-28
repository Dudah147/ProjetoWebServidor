<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/HomePage.css" media="screen" />
    <style>
     @import url('https://fonts.googleapis.com/css2?family=Norican&display=swap');
    </style>
</head>
<body style=" margin: 0; padding: 0; font-size: 16px;font-family: Verdana, Geneva, Tahoma, sans-serif; margin-left: 10;">
 
    <?php
      session_start();
      require("controllers/header.controller.php");
      require("controllers/index.controller.php");
      require("controllers/carrinho.controller.php");
      require("controllers/usuario.controller.php");
      require('controllers/conectarBanco.controller.php');
      $con = new conectarBanco("localhost", "root", "", "ProjetoWebServidor");
      $con->conectarBanco();
    ?>
    
  <script type="text/javascript" src="JS/usuario.js"></script>
  <script type="text/javascript" src="JS/carrinho.js"></script>
</body>
</html>
