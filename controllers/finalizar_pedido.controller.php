<?php
    session_start();

    //resgatar localStorage

    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : "";

    if ($contentType === "application/json") {

        $conteudo = trim(file_get_contents("php://input"));

        $conteudo_dados = json_decode($conteudo, true);
    }



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



