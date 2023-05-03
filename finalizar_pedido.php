<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Finalizar Pedido </title>
    <link rel="stylesheet" href="CSS/FinalizarPedido.css">
</head>

<body id="body">

    <?php
    session_start();

    require("controllers/header.controller.php");

    $cadastrar = $_GET['acao'] ?? '';


    require("controllers/finalizar_pedido.controller.php");


    require("controllers/carrinho.controller.php");
    require("controllers/usuario.controller.php");

    ?>
    <script type="text/javascript" src="JS/carrinho.js"></script>
    <script type="text/javascript" src="JS/usuario.js"></script>
</body>

</html>