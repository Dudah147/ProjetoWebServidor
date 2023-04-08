<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Login </title>
    <link rel="stylesheet" href="CSS/Login.css">
</head>

<body id="body">
    <?php 
        require("views/header.view.php");
    ?>

    <div id="container_login">
        <span id="text_login">Login</span>
        <hr id="underline">

        <div id="login">
            <div class="cadastro">
                <form id="form" action="pedido.php">

                    <div class="input-group">
                        <div class="input-box">
                            <label>E-mail:</label>
                            <input type="text" name="email" id="email">
                            <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                            <i class="img-error"><img src="img/error-icon.svg" alt=""></i>

                            <small>Error message</small>
                        </div>
                        <div class="input-box">
                            <label>Senha:</label>
                            <input type="password" name="senha" id="senha">
                            <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                            <i class="img-error"><img src="img/error-icon.svg" alt=""></i>

                            <small>Error message</small>
                        </div>
                        <div class="botoes">
                            <button id="entrar" type="button">ENTRAR</button>
                            <div class="row">
                                <hr>
                                <a href="Cadastro.html" id="cadastrar">Ainda não tenho cadastro</a>
                                <hr>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="logado">
                <h1 id="boas-vindas" style="text-align: center;">Olá,</h1>
                <h3 style="text-align: center;">Você já está logado!</h3>
                <button type="button" id="sair">Sair</button>
            </div>
        </div>
    </div>

    <?php require("views/carrinho.view.php");?>
    
    <?php require("views/usuario.view.php");?>


    <script type="text/javascript" src="JS/Login.js"></script>
</body>

</html>