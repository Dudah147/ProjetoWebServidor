<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Meus Pedidos</title>
    <link rel="stylesheet" href="CSS/meus_pedidos.css">

</head>

<body>

    <?php
    require "layout/header.view.php";

    $msg = $_GET['msg'] ?? '';
    if ($msg == 'finalizado') {
        echo "<div id='feedback' style='background-color: rgb(84, 190, 13)'><span>Pedido finalizado com sucesso!</span><div style='background-color: green'></div></div>";
    }
    ?>

    <div id="container">
        <span id="text_meus_pedidos">Meus Pedidos</span>
        <hr id="underline">


        <div id="meus_pedidos">

            <?php

            if (isset($_SESSION['cpf'])) {
                if ($verifica == false) :
                    echo "Você não possui pedidos";
                else :

                    foreach ($pedidos_usuario as $pedido) : ?>

                        <div class='pedido'>
                            <div>
                                <h3 id_pedido=<?= $pedido["id_pedido"] ?>>Pedido <?= $pedido["id_pedido"] ?> </h3>
                                <span style='color:grey; font-size: .8rem'><?= $pedido["data"] ?></span>
                                <button class='ver_detalhes'>Ver detalhes</button>
                            </div>
                            <div>
                                <span>Total: <strong>R$ <?= $pedido["valor_total"] ?></strong>
                            </div>
                        </div>
            <?php
                    endforeach;
                    $win = json_encode($pedidos_usuario);
                    echo "<script>let pedidos = $win</script>";
                endif;
            } else {
                echo '<a href="login" style="font-size: 2rem;color: red; padding: 0; margin: 4rem;">Faça login</a>';
            }
            ?>

        </div>
    </div>

    <?php
    require("controllers/carrinho.controller.php");
    require("controllers/usuario.controller.php");
    ?>

    <script type="text/javascript" src="JS/MeusPedidos.js"></script>
    <script type="text/javascript" src="JS/usuario.js"></script>
    <script type="text/javascript" src="JS/carrinho.js"></script>

</body>

</html>