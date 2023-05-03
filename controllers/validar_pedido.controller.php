<?php

if (!$_POST['endereco'] || !$_POST['forma_pagamento']) {
    header('Location:finalizar_pedido.php?acao=erro');
} else {
    //Primeiro passo remover pedido do carrinho
    $arquivo = 'models/carrinho.model.json';
    if (file_exists($arquivo)) {
        $json_carrinho = json_decode(file_get_contents($arquivo), true);
    } else {
        $json_carrinho = [];
    }

    $index = array_search($_SESSION['cpf'], $json_carrinho);
    unset($json_carrinho[$index]);


    file_put_contents($arquivo, json_encode($json_carrinho, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    //adicionar informações do carrinho em pedidos (futuramente insert no banco)
    $arquivo = 'models/pedidos.model.json';
    if (file_exists($arquivo)) {
        $json = json_decode(file_get_contents($arquivo), true);
    } else {
        $json = [];
    }

    $id = sizeof($json) + 1;

    $dt = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
    $dt->setTimestamp(time());

    $data = $dt->format('d.m.Y, H:i:s');
    $json[] = [
        "id_pedido" => $id,
        "cpf" => $_SESSION['cpf'],
        "valor_total" => $_POST['valor_total'],
        "data" => $data,
        "forma_pagamento" => $_POST['forma_pagamento'],
        "itens" => $carrinho_usuario['itens']
    ];

    file_put_contents($arquivo, json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    header('Location:meus_pedidos.php');
}
