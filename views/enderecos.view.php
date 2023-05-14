<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Endereços </title>
    <link rel="stylesheet" href="CSS/Enderecos.css">
</head>

<body id="body">

    <?php require("layout/header.view.php"); ?>

    <div id="container">
        <span id="text_endereco">Meus Endereços</span>
        <hr id="underline">
        <div id="enderecos">

            <?php if ($session == false): ?>
            <a href="login" style="font-size: 2rem;color: red; padding: 0; margin: 4rem;">
                Faça login</a>

            <?php else: ?>
            <a id='btn_cadastrarEnd' href='cadastroEndereco'>
                <img src='img/mais.png' class='mais'>
                <span>CADASTRAR ENDEREÇO</span>
            </a>
            <hr>
            <div id='infos_enderecos'>
                <?php
                    if (!$flag):
                        echo '<h2 id="nao_possui" style="margin: 3rem; color: gray;">Você não possui endereço cadastrado!</h2>';

                    else:
                        foreach ($enderecos_usuario as $endereco): ?>
                <div class='novoEnd'>
                    <div class='row'>
                        <div class='column'>
                            <div class='row'>
                                <span>CEP:
                                    <?= $endereco['cep']; ?>
                                </span>
                                <span>Bairro:
                                    <?= $endereco['bairro']; ?>
                                </span>
                            </div>
                            <div class='row'>
                                <span>Rua:
                                    <?= $endereco['rua']; ?>
                                </span>
                                <span>N°:
                                    <?= $endereco['numero']; ?>
                                </span>
                            </div>
                            <div class='row'>
                                <span>Cidade:
                                    <?= $endereco['cidade']; ?>
                                </span>
                                <span>Estado:
                                    <?= $endereco['estado']; ?>
                                </span>
                            </div>
                        </div>
                        <img src='img/lixeira.png' class='lixeira'>
                    </div>
                </div>
                <?php endforeach;
                    endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <?php require("controllers/carrinho.controller.php");
    require("controllers/usuario.controller.php"); ?>

    <script type="text/javascript" src="JS/Enderecos.js"></script>
    <script type="text/javascript" src="JS/usuario.js"></script>
    <script type="text/javascript" src="JS/carrinho.js"></script>
</body>

</html>