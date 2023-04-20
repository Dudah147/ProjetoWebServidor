<?php
    session_start();

    if(empty($_SESSION['logado'])||$_SESSION['logado']==false){
        header('Location:login.php');
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Cadastrar Endereço </title>
    <link rel="stylesheet" href="CSS/CadastrarEnd.css">
</head>

<body id="body">
    <?php require("controllers/header.controller.php");?>
    <div id="container_cadEnd">
        <span id="text_cadEnd">Cadastrar Endereço</span>
        <hr id="underline">
        <div id="cadEnd">
            <span><?php
                if(isset($_GET['error'])){
                   echo 'Endereço já cadastrado';
                }?></span>
             <?= require("controllers/cadastrar_endereco.controller.php");?>
        </div>
</div>
        
<?php
    require("controllers/carrinho.controller.php");
    require("controllers/usuario.controller.php");
?>


    <script type="text/javascript" src="JS/CadastrarEnd.js"></script>
</body>

</html>