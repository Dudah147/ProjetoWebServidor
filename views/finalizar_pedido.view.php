<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Finalizar Pedido </title>
    <link rel="stylesheet" href="CSS/FinalizarPedido.css">
</head>

<body id="body">

    <?php require "layout/header.view.php";

    $msg = $_GET['msg'] ?? '';
    if ($msg == 'campos') {
        echo "<div id='feedback'><span>Preencha todos os campos</span><div></div></div>";
    }
    ?>


    <div id="container">
        <span id="text_finalPedido" class="fonte">Finalizar Pedido</span>
        <hr id="underline">

        <?php if (!isset($_SESSION['cpf'])) : ?>
            <a href="login" style="font-size: 2rem;color: red; padding: 0; margin: 4rem;">
                Faça login</a>

        <?php else : ?>

            <form action="finalizarPedido" method="POST" id="finalPedido">
                <span class="title">Confira seu pedido</span>
                <div class="column info">
                    <hr>
                    <?php $total = 0;
                    foreach ($carrinho_usuario['itens'] as $car) :
                        $total += $car['total']; ?>

                        <div class="itens_pedido row">
                            <div class="co">
                                <strong>
                                    <?= $car['tamanho']['tamanho'] ?>
                                </strong>
                                <?php foreach ($car['sabores'] as $sabor) : ?>
                                    <span>
                                        <?= $sabor['sabor'] ?>
                                    </span>
                                <?php endforeach; ?>

                                <?php if ($car['borda']['preco'] > 0) : ?>
                                    <span>+ R$
                                        <?= $car['borda']['preco'] ?> Borda
                                        <?= $car['borda']['borda'] ?>
                                    </span>
                                <?php endif; ?>
                                <?php if ($car['massa']['preco'] > 0) : ?>
                                    <span>+ R$
                                        <?= $car['massa']['preco'] ?> Massa
                                        <?= $car['massa']['massa'] ?>
                                    </span>
                                <?php endif; ?>

                            </div>
                            <div class="co">
                                <h3>R$
                                    <?= $car['total'] ?>
                                </h3>
                            </div>

                        </div>
                        <hr>
                    <?php endforeach; ?>
                </div>


                <span class="title">Endereço</span>
                <div class="column info">
                    <?php
                    if (empty($enderecos_usuario)) :
                        echo '<h2 style="margin: 3rem; color: gray;">Você não possui endereço cadastrado!</h2>';

                    else :
                        foreach ($enderecos_usuario as $endereco) : ?>
                            <div style="width: 80%">
                                <label class="rad-label">
                                    <input type="radio" class="rad-input" name="endereco" value="<?= $endereco['id_endereco'] ?>">
                                    <div class="rad-design"></div>
                                    <div class="rad-text">
                                        <div class="column">
                                            <div class="row">
                                                <span>CEP:
                                                    <?= $endereco['cep'] ?>
                                                </span>
                                                <span>Bairro:
                                                    <?= $endereco['bairro'] ?>
                                                </span>
                                            </div>
                                            <div class="row">
                                                <span>Rua:
                                                    <?= $endereco['rua'] ?>
                                                </span>
                                                <span>N°:
                                                    <?= $endereco['numero'] ?>
                                                </span>
                                            </div>
                                            <div class="row">
                                                <span>Cidade:
                                                    <?= $endereco['cidade'] ?>
                                                </span>
                                                <span>Estado:
                                                    <?= $endereco['estado'] ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>

                    <?php endforeach;
                    endif; ?>

                    <div class="row ou">
                        <hr><span>OU</span>
                        <hr>
                    </div>

                    <a id="CadastrarEnd" class="row" href="cadastroEndereco">
                        <img src="img/endereco.png" alt="">
                        <span>Cadastrar Endereço</span>
                    </a>
                </div>

                <span class="title">Forma de Pagamento</span>
                <div class="column info">
                    <div>
                        <label class="rad-label">
                            <input type="radio" class="rad-input" name="forma_pagamento" value="Pix">
                            <div class="rad-design"></div>
                            <div class="rad-text">Pix</div>
                        </label>
                        <label class="rad-label">
                            <input type="radio" class="rad-input" name="forma_pagamento" value="Dinheiro">
                            <div class="rad-design"></div>
                            <div class="rad-text">Dinheiro</div>
                        </label>
                        <label class="rad-label">
                            <input type="radio" class="rad-input" name="forma_pagamento" value="Cartao de credito">
                            <div class="rad-design"></div>
                            <div class="rad-text">Cartao de credito</div>
                        </label>
                        <label class="rad-label">
                            <input type="radio" class="rad-input" name="forma_pagamento" value="Cartao de debito">
                            <div class="rad-design"></div>
                            <div class="rad-text">Cartao de debito</div>
                        </label>
                    </div>
                </div>
                <div id="total_pedido">
                    <div class="ro">
                        <h2>Total Pedido</h2>
                        <input type="hidden" name="valor_total" value="<?= $total ?>">
                        <h2 style="color: green">
                            <?= $total ?>
                        </h2>
                    </div>
                    <button type="submit">ENVIAR PEDIDO</button>
                </div>
            </form>
        <?php endif; ?>
    </div>

    <?php
    require("controllers/carrinho.controller.php");
    require("controllers/usuario.controller.php");

    ?>
    <script type="text/javascript" src="JS/carrinho.js"></script>
    <script type="text/javascript" src="JS/usuario.js"></script>
</body>

</html>