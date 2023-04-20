<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Cardápio </title>
    <link rel="stylesheet" href="CSS/Cardapio.css">
</head>
<body>
    
    <?php 
        session_start();
        require("controllers/header.controller.php");
        require("controllers/cardapio.controller.php");
        require("controllers/carrinho.controller.php");
        require("controllers/usuario.controller.php");
    ?>

    
    <script type="text/javascript" src="JS/Cardapio.js"></script>
    <script type="text/javascript" src="JS/usuario.js"></script>
    <script type="text/javascript" src="JS/carrinho.js"></script>
</body>
</html>