<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Login </title>
    <link rel="stylesheet" href="CSS/Login.css">
</head>

<body id="body">
    <?php 
    session_start();
    require("controllers/header.controller.php");
    if(isset($_SESSION['cpf'], $_SESSION['senha'])){
        require("controllers/logado.controller.php");
    }else{
        require("controllers/login.controller.php");
    }
    require("controllers/carrinho.controller.php");
    require("controllers/usuario.controller.php");?>


    <script type="text/javascript" src="JS/Login.js"></script>
</body>

</html>