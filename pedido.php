<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Pedidos </title>
    <link rel="stylesheet" href="CSS/Pedido.css">
</head>
<body id="body">
    
    <?php 
        require("controllers/header.controller.php");

        session_start();
        if(!isset($_SESSION['cpf'])){
            header("Location: login.php?error=true");
            exit;
        }
        require("controllers/pedido.controller.php");
        require("controllers/carrinho.controller.php");
        require("controllers/usuario.controller.php");?>

    <script type="text/javascript" src="JS/Pedido.js"></script>
</body>
</html>