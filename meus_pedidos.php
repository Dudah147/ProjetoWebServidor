<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Pedidos</title>
    <link rel="stylesheet" type="text/css" href="CSS/HomePage.css" media="screen" />
    <style>
     @import url('https://fonts.googleapis.com/css2?family=Norican&display=swap');
    </style>
</head>
<body>
    <?php require("controllers/header.controller.php");?>
    
    <div id="container_meus_pedidos">
        <span id="text_login">Meus Pedidos</span>
        <hr id="underline">
    </div>
    
    <?php require("controllers/carrinho.controller.php");?>
    
    <?php require("controllers/usuario.controller.php");?> 

    <script type="text/javascript" src="JS/MeusPedidos.js"></script>

</body>
</html>