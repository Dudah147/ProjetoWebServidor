<?php
//endereco
$arquivo = "models/enderecos.model.json";
$enderecos = json_decode(file_get_contents($arquivo), true);
$enderecos_usuario = [];
$flag = false;
foreach ($enderecos as $e) {
    if ($e['cpf'] == $_SESSION['cpf']) {
        $enderecos_usuario[] = $e;
        $flag = true;
    }
}

//carrinho
$arquivo = "models/carrinho.model.json";
$carrinho = json_decode(file_get_contents($arquivo), true);
$carrinho_usuario = null;
foreach ($carrinho as $c) {
    if ($c['cpf'] == $_SESSION['cpf']) {
        $carrinho_usuario  = $c;
        break;
    }
}

$cadastrar = $_GET['acao'] ?? '';

if ($cadastrar == 'cadastrar') {

    require("validar_pedido.controller.php");
} else {
    require("views/finalizar_pedido.view.php");
}
