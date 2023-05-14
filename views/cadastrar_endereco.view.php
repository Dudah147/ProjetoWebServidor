<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Cadastrar Endereço </title>
    <link rel="stylesheet" href="CSS/CadastrarEnd.css">
</head>

<body id="body">

    <?php require("layout/header.view.php");

    $msg = $_GET['msg'] ?? '';
    if ($msg == 'campos') {
        echo "<div id='feedback'><span>Preencha todos os campos</span><div></div></div>";
    }
    ?>

    <div id="container">
        <span id="text_cadEnd">Cadastrar Endereço</span>
        <hr id="underline">
        <div id="cadEnd">
            <?php if (!isset($_SESSION['cpf'])): ?>
                <a href="login" style="font-size: 2rem;color: red; padding: 0; margin: 4rem;">
                    Faça login</a>

            <?php else: ?>
                <form id="form" action="cadastrarEndereco" method="POST">
                    <div class="input-group">
                        <div class="input-box">
                            <label>CEP:</label>
                            <input type="text" name="cep" id="cep" placeholder="XXXXX-XXX">
                            <button class="busca" type="button">Buscar</button>
                            <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                            <i class="img-error"><img src="img/error-icon.svg" alt=""></i>

                            <small>Error message</small>
                        </div>
                        <div class="input-box">
                            <label>Rua:</label>
                            <input type="text" name="rua" id="street">
                            <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                            <i class="img-error"><img src="img/error-icon.svg" alt=""></i>

                            <small>Error message</small>
                        </div>
                        <div class="input-box">
                            <label>Bairro:</label>
                            <input type="text" name="bairro" id="district">
                            <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                            <i class="img-error"><img src="img/error-icon.svg" alt=""></i>

                            <small>Error message</small>
                        </div>
                        <div class="input-box">
                            <label>Cidade:</label>
                            <input type="text" name="cidade" id="city">
                            <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                            <i class="img-error"><img src="img/error-icon.svg" alt=""></i>

                            <small>Error message</small>
                        </div>
                        <div class="input-box">
                            <label>Estado:</label>
                            <input type="text" name="estado" id="state">
                            <i class="img-success"><img src="img/success-icon.svg" alt=""></i>
                            <i class="img-error"><img src="img/error-icon.svg" alt=""></i>

                            <small>Error message</small>
                        </div>
                        <div class="input-box">
                            <label>Número:</label>
                            <input type="number" name="numero" id="number">
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
            <?php endif; ?>
        </div>
    </div>

    <?php
    require("controllers/carrinho.controller.php");
    require("controllers/usuario.controller.php");
    ?>

    <script type="text/javascript" src="JS/CadastrarEnd.js"></script>
    <script type="text/javascript" src="JS/usuario.js"></script>
    <script type="text/javascript" src="JS/carrinho.js"></script>
</body>

</html>