<?php

function resgatarInfo()
{
    require("models/cardapio.model.php");
    $cardapio = json_decode($cardapio, true);
    //Trata os sabores
    $sabores_post =  explode(",", $_POST['sabores']);
    $valor_total = 0;
    $i = [];

    foreach ($cardapio['tamanhos'] as $tamanho) {
        if ($tamanho['tamanho'] == $_POST['tamanho']) {
            $i["tamanho"] = [
                "tamanho" => $tamanho['tamanho'],
                "preco" => $tamanho['preco']
            ];

            $valor_total += $tamanho['preco'];
        }
    }

    foreach ($cardapio['bordas'] as $bordas) {
        if ($bordas['borda'] == $_POST['borda']) {
            $i["borda"] = [
                "borda" => $bordas['borda'],
                "preco" => $bordas['preco']
            ];

            $valor_total += $bordas['preco'];
        }
    }

    foreach ($cardapio['massa'] as $massa) {
        if ($massa['massa']  == $_POST['massa']) {
            $i["massa"] = [
                "massa" => $massa['massa'],
                "preco" => $massa['preco']
            ];

            $valor_total += $massa['preco'];
        }
    }

    foreach ($sabores_post as $sab) {
        foreach ($cardapio['sabores'] as $sabores) {

            if ($sabores['sabor'] == $sab) {

                $i['sabores'][] = [
                    "sabor" => $sabores['sabor'],
                    "preco" => $sabores['preco']
                ];

                $valor_total += $sabores['preco'];

                break;
            }
        }
    }

    $i['total'] = $valor_total;

    return $i;
}


$arquivo = 'models/carrinho.model.json';
if (file_exists($arquivo)) {
    $json = json_decode(file_get_contents($arquivo), true);
} else {
    $json = [];
}


//resgata informações dos itens
$itens = resgatarInfo();

//flag para ver se o cliente não possui no carrinho
$flag = false;
for ($i = 0; $i < sizeof($json); $i++) {
    //Se o cliente tiver carrinho ele faz append em itens
    if ($json[$i]['cpf'] == $_SESSION['cpf']) {
        echo "<div id='feedback' style='background-color: rgb(41, 199, 67);'><span>Pedido adicionado ao carrinho</span><div style='background-color: green;'></div></div>";

        $json[$i]['itens'][] = $itens;

        $flag = true;
    }
}

//verifica se o cliente não possui no carrinho
if ($flag == false) {
    $json[] = [
        "cpf" => $_SESSION['cpf'],
        "itens" => [$itens]
    ];
}



file_put_contents($arquivo, json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
