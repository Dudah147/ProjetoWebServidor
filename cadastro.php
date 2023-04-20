<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Cadastro </title>
    <link rel="stylesheet" href="CSS/Cadastro.css">
</head>

<body id="body">
    <?php require("controllers/header.controller.php");?>
    <div id="container_cadastro">
        <span id="text_cadastro">Cadastro</span>
        <hr id="underline">
        <div id="cadastro">
            <?php 
                session_start();
                if(isset($_GET['signin_error'])){
                    echo "Cadastro já realizado";
                }
                require("controllers/cadastro.controller.php");
            ?>
        </div>
    </div>
    <?php require("controllers/carrinho.controller.php");?>
    
    <?php require("controllers/usuario.controller.php");?>


    <script type="text/javascript" src="JS/Cadastro.js"></script>
</body>

</html>