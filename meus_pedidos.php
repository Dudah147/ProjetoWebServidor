<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Meus Pedidos</title>
    <link rel="stylesheet" href="CSS/meus_pedidos.css">

</head>
<body>
    <?php require("controllers/header.controller.php");?>
    
    <?php require("controllers/meus_pedidos.controller.php");?>

    <?php require("controllers/carrinho.controller.php");?>
    
    <?php require("controllers/usuario.controller.php");?> 

    <script type="text/javascript" src="JS/MeusPedidos.js"></script>
    <script type="text/javascript" src="JS/usuario.js"></script>
    <script type="text/javascript" src="JS/carrinho.js"></script>

</body>
</html>