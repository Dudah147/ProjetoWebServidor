<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Cardápio </title>
    <link rel="stylesheet" href="CSS/Cardapio.css">
</head>

<body>

    <?php require("layout/header.view.php"); ?>

    <main>

        <div id="container">

            <span id="text_cardapio">Cardápio</span>
            <hr id="underline">
            <div id="container_tipos">
                <a class="tipos">TAMANHO</a>
                <a class="tipos">MASSA</a>
                <a class="tipos">BORDA RECHEADA</a>
                <a class="tipos">TRADICIONAIS</a>
                <a class="tipos">ESPECIAIS</a>
                <a class="tipos">PREMIUM</a>
            </div>

            <hr id="barra">



            <div id="container_info">
                <div class="info">
                    <span>Pequena</span>
                    <span>4 Fatias - 25 cm (1 adulto)</span>
                </div>
                <div class="info">
                    <span>Grande</span>
                    <span>8 Fatias - 35 cm (2 adultos + 1 criança)</span>
                </div>
                <div class="info">
                    <span>Gigante</span>
                    <span>12 Fatias - 45 cm (3 adultos)</span>
                </div>
            </div>

        </div>


    </main>

    <?php
    require("controllers/carrinho.controller.php");
    require("controllers/usuario.controller.php"); ?>
    <script>
        const resposta = <?= $cardapio ?>
    </script>
    <script type="text/javascript" src="JS/Cardapio.js"></script>
    <script type="text/javascript" src="JS/usuario.js"></script>
    <script type="text/javascript" src="JS/carrinho.js"></script>

</body>

</html>