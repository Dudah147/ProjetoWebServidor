<?php

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

    require("views/finalizar_pedido.view.php");
    