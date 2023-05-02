<?php
    //endereco
    $arquivo = "models/enderecos.model.json";
    $enderecos = json_decode(file_get_contents($arquivo), true);
    $enderecos_usuario = [];
    $flag = false;
    foreach($enderecos as $e){
        if($e['cpf'] == $_SESSION['cpf']){
            $enderecos_usuario [] = $e;
            $flag = true;
        }
    }

    //carrinho
    $arquivo = "models/carrinho.model.json";
    $carrinho = json_decode(file_get_contents($arquivo), true);
    $carrinho = [];
    foreach($carrinho as $c){
        if($c['cpf'] == $_SESSION['cpf']){
            $carrinho [] = $c;
            break;
        }
    }


    require("views/finalizar_pedido.view.php");
    