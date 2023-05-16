<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Pedidos </title>
    <link rel="stylesheet" href="CSS/Pedido.css">
</head>

<body id="body">

    <?php require("layout/header.view.php"); ?>
    <?php
    $msg = $_GET['msg'] ?? '';
    if ($msg == 'campos') {
        echo "<div id='feedback'><span>Preencha todos os campos</span><div></div></div>";
    } else if ($msg == 'login') {
        echo "<div id='feedback'><span>Faça login para continuar</span><div></div></div>";
    }
    ?>
    <div id="container">
        <span id="text_pedido">Pedido Online</span>
        <hr id="underline">
        <div id="pedido">



            <form action="cadastrarPedido" method="POST">
                <div id="tamanho">
                    <div class="tipo">
                        <img src="img/setaCima.png" class="seta" name="setaCima">
                        <span>TAMANHO</span>
                    </div>
                    <hr>
                    <div class="infos">
                        <?php foreach ($tamanhos as $tamanho) :
                            if ($tamanho['qtd_sabor'] == 1) : ?>
                                <div class="row-infos">
                                    <label class="rad-label" tamanho="<?= $tamanho['qtd_sabor'] ?>">
                                        <input type="radio" class="rad-input" name="tamanho" value="<?= $tamanho['tamanho'] ?>">
                                        <div class="rad-design"></div>
                                        <div class="rad-text"><?= $tamanho['tamanho'] ?></div>
                                    </label>
                                    <div>
                                        <span>a partir de R$ <strong style="color: orange;"><?= $tamanho['preco_tamanho'] ?></strong></span>
                                    </div>
                                </div>
                                <span>Escolha até <?= $tamanho['qtd_sabor'] ?> sabor - <?= $tamanho['info_tamanho'] ?></span>
                                <hr>
                            <?php else : ?>
                                <div class="row-infos">
                                    <label class="rad-label" tamanho="<?= $tamanho['qtd_sabor'] ?>">
                                        <input type="radio" class="rad-input" name="tamanho" value="<?= $tamanho['tamanho'] ?>">
                                        <div class="rad-design"></div>
                                        <div class="rad-text"><?= $tamanho['tamanho'] ?></div>
                                    </label>
                                    <div>
                                        <span>a partir de R$ <strong style="color: orange;"><?= $tamanho['preco_tamanho'] ?></strong></span>
                                    </div>
                                </div>
                                <span>Escolha até <?= $tamanho['qtd_sabor'] ?> sabores - <?= $tamanho['info_tamanho'] ?></span>
                                <hr>
                        <?php endif;
                        endforeach; ?>
                    </div>
                </div>

                <div id="borda">
                    <div class="tipo">
                        <img src="img/setaCima.png" class="seta">
                        <span>BORDA</span>
                    </div>
                    <hr>
                    <div class="infos">
                        <?php foreach ($bordas as $borda) :
                            if ($borda['preco_borda'] > 0) : ?>
                                <div class="row-infos">
                                    <label class="rad-label">
                                        <input type="radio" class="rad-input" name="borda" value="<?= $borda['borda'] ?>">
                                        <div class="rad-design"></div>
                                        <div class="rad-text"><?= $borda['borda'] ?></div>
                                    </label>
                                    <div>
                                        <span>adicional de R$ <strong style="color: orange;"><?= $borda['preco_borda'] ?></strong></span>
                                    </div>
                                </div>
                                <hr>
                            <?php else : ?>
                                <div class="row-infos">
                                    <label class="rad-label">
                                        <input type="radio" class="rad-input" name="borda" value="<?= $borda['borda'] ?>">
                                        <div class="rad-design"></div>
                                        <div class="rad-text"><?= $borda['borda'] ?></div>
                                    </label>
                                </div>
                                <hr>
                        <?php endif;
                        endforeach; ?>
                    </div>
                </div>
                <div id="massa">
                    <div class="tipo">
                        <img src="img/setaCima.png" class="seta">
                        <span>MASSA</span>
                    </div>
                    <hr>
                    <div class="infos">
                        <?php foreach ($massas as $massa) :
                            if ($massa['preco_massa'] > 0) : ?>
                                <div class="row-infos">
                                    <label class="rad-label">
                                        <input type="radio" class="rad-input" name="massa" value="<?= $massa['massa'] ?>">
                                        <div class="rad-design"></div>
                                        <div class="rad-text"><?= $massa['massa'] ?></div>
                                    </label>
                                    <div>
                                        <span>adicional de R$ <strong style="color: orange;"><?= $massa['preco_massa'] ?></strong></span>
                                    </div>
                                </div>
                                <hr>
                            <?php else : ?>
                                <div class="row-infos">
                                    <label class="rad-label">
                                        <input type="radio" class="rad-input" name="massa" value="<?= $massa['massa'] ?>">
                                        <div class="rad-design"></div>
                                        <div class="rad-text"><?= $massa['massa'] ?></div>
                                    </label>
                                </div>
                                <hr>
                        <?php endif;
                        endforeach; ?>
                    </div>
                </div>

                <!-- name = sabores -->
                <div id="sabores_id">
                    <div class="tipo">
                        <img src="img/setaCima.png" class="seta">
                        <span>SABORES</span>
                    </div>
                    <hr>
                    <div class="infos">
                        <?php foreach ($sabores as $sabor) :
                            if ($sabor['preco_sabor'] == 0) : ?>
                                <div class="sabor_info" style="margin: .5rem 1rem 0rem 1rem;">
                                    <div class="sabor">
                                        <div class="sabor">
                                            <div class="sabor_quant">
                                                <div class="quant_container">
                                                    <img src="img/menos.png" class="quantImg menos">
                                                    <span style="color: black;margin: 0;">0</span>
                                                    <img src="img/mais.png" class="quantImg mais">
                                                </div>
                                                <span style="margin: 0 0 0 1rem; color: black;"><?= $sabor['sabores'] ?></span>
                                            </div>
                                        </div>

                                        <span style="margin: 1rem 0;"><?= $sabor['info_sabor'] ?></span>
                                    </div>
                                    <span style="border-color: red; color: red;"><?= $sabor['tipo_sabor'] ?></span>
                                    <img src="<?= $sabor['imagem_sabor'] ?>" class="pizza_img">
                                </div>
                                <hr>
                            <?php else : ?>
                                <div class="sabor_info" style="margin: .5rem 1rem 0rem 1rem;">
                                    <div class="sabor">
                                        <div class="sabor">
                                            <div class="sabor_quant">
                                                <div class="quant_container">
                                                    <img src="img/menos.png" class="quantImg menos">
                                                    <span style="color: black;margin: 0;">0</span>
                                                    <img src="img/mais.png" class="quantImg mais">
                                                </div>
                                                <span style="margin: 0 0 0 1rem; color: black;"><?= $sabor['sabores'] ?></span>
                                            </div>
                                        </div>

                                        <span style="margin: 1rem 0;"><?= $sabor['info_sabor'] ?></span>
                                    </div>
                                    <div class="tipo_sabor">
                                        <span style="border-color: red; color: red;"><?= $sabor['tipo_sabor'] ?></span>
                                        <span>adicional de R$ <strong style="color: orange;"><?= $sabor['preco_sabor'] ?></strong></span>
                                    </div>
                                    <img src="<?= $sabor['imagem_sabor'] ?>" class="pizza_img">
                                </div>
                                <hr>
                        <?php endif;
                        endforeach; ?>
                    </div>

                </div>




                <div id="obs">
                    <div class="tipo">
                        <img src="img/setaCima.png" class="seta">
                        <span>OBSERVAÇÕES</span>
                    </div>
                    <div class="infos">
                        <div style="display: flex; flex-direction: column; margin-left: 1rem; margin-right: 1rem; padding-bottom: 1rem;">
                            <label style="color: grey; margin-bottom: 1rem;">Observações</label>
                            <input type="text" name="obs" class="obs_input">
                        </div>
                    </div>
                </div>

                <button type="submit" id="adicionarPedido">ADICIONAR PEDIDO AO CARRINHO</button>
            </form>
        </div>
    </div>
    <?php
    require("controllers/carrinho.controller.php");
    require("controllers/usuario.controller.php");
    ?>

    <script type="text/javascript" src="JS/Pedido.js"></script>
    <script type="text/javascript" src="JS/usuario.js"></script>
    <script type="text/javascript" src="JS/carrinho.js"></script>
</body>

</html>