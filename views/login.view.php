<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Login </title>
    <link rel="stylesheet" href="CSS/Login.css">
</head>

<body id="body">

    <?php require "layout/header.view.php";
    $msg = $_GET['msg'] ?? '';
    if (isset($_GET['error'])) {
        echo "<div id='feedback'><span>Não foi possível validar a sessão</span><div></div></div>";
    }
    if (isset($_GET['error-login'])) {
        echo "<div id='feedback'><span>Usuário incorreto, tente novamente!</span><div></div></div>";
    }
    if ($msg == 'usuario_cadastrado') {
        echo "<div id='feedback' style='background-color: rgb(84, 190, 13)'><span>Usuário cadastrado com sucesso. Faça Login!</span><div style='background-color: green'></div></div>";
    }

    ?>

    <div id="container">
        <span id="text_login">Login</span>
        <hr id="underline">
        <div id="login">
            <div class="cadastro">


                <div class="input-group">

                    <?php if ($logado == true) : ?>
                        <h1 id="boas-vindas" style="text-align: center;">Olá, <?php echo $_SESSION['nome']; ?></h1>
                        <h3 style="text-align: center;">Você já está logado!</h3>
                        <form action="deslogar" method="POST">
                            <button type="submit" id="sair">Sair</button>
                        </form>
                    <?php else : ?>
                        <form id="form" action="login?action=logar" method="POST">
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
                                <button id="entrar" type="submit">ENTRAR</button>
                                <div class="row">
                                    <hr>
                                    <a href="cadastroUsuario" id="cadastrar">Ainda não tenho cadastro</a>
                                    <hr>
                                </div>
                            </div>
                        <?php endif; ?>
                </div>
                </form>
            </div>
            <!--
        <div class="logado">
            <h1 id="boas-vindas" style="text-align: center;">Olá,</h1>
            <h3 style="text-align: center;">Você já está logado!</h3>
            <button type="button" id="sair">Sair</button>
        </div> -->
        </div>
    </div>

    <?php
    require("controllers/carrinho.controller.php");
    require("controllers/usuario.controller.php");
    ?>


    <script type="text/javascript" src="JS/usuario.js"></script>
    <script type="text/javascript" src="JS/carrinho.js"></script>
</body>

</html>