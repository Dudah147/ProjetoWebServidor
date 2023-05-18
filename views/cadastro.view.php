<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Cadastro </title>
    <link rel="stylesheet" href="CSS/Cadastro.css">
</head>

<body id="body">
    <?php require "layout/header.view.php";

    $msg = $_GET['msg'] ?? '';
    if ($msg == 'campos') {
        echo "<div id='feedback'><span>Preencha todos os campos</span><div></div></div>";
    }
    if ($msg == 'ja_cadastrado') {
        echo "<div id='feedback'><span>Usuário já cadastrado</span><div></div></div>";
    }
    ?>

    <div id="container">
        <span id="text_cadastro">Cadastro</span>
        <hr id="underline">
        <div id="cadastro">

            <form id="form" action="cadastrarUsuario" method="POST">
                <div class="input-group">
                    <div class="input-box">
                        <label>Nome:</label>
                        <input type="text" name="nome" id="name">
                        <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                        <i class="img-error"><img src="img/error-icon.svg" alt=""></i>
                        <small>Error message</small>
                    </div>
                    <div class="input-box">
                        <label>CPF:</label>
                        <input type="text" name="cpf" id="cpf" placeholder="123.456.789-10">
                        <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                        <i class="img-error"><img src="img/error-icon.svg" alt=""></i>
                        <small>Error message</small>
                    </div>
                    <div class="input-box">
                        <label>Data de Nascimento:</label>
                        <input type="text" name="nascimento" id="nascimento" placeholder="DD/MM/YYYY">
                        <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                        <i class="img-error"><img src="img/error-icon.svg" alt=""></i>
                        <small>Error message</small>
                    </div>
                    <div class="input-box">
                        <label>E-mail:</label>
                        <input type="email" name="email" id="email" placeholder="exemplo@email.com">
                        <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                        <i class="img-error"><img src="img/error-icon.svg" alt=""></i>
                        <small>Error message</small>
                    </div>
                    <div class="input-box">
                        <label>Senha:</label>
                        <input type="password" name="senha" id="passwords">
                        <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                        <i class="img-error"><img src="img/error-icon.svg" alt=""></i>
                        <small>Error message</small>
                    </div>
                    <div class="botoes">
                        <button id="btnEnviar" type="submit">Enviar</button>
                        <button type="reset">Excluir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php require("controllers/carrinho.controller.php"); ?>

    <?php require("controllers/usuario.controller.php"); ?>

    <script type="text/javascript" src="JS/usuario.js"></script>
    <script type="text/javascript" src="JS/carrinho.js"></script>
</body>

</html>