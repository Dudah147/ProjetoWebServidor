<?php

$bd = new ManipulacaoBanco();

$array = $bd->selecionarDados("usuarios", "email_usuario = '{$_POST['email']}' and senha_usuario = '{$_POST['senha']}'");

if (empty($array)) {
    header("Location: login?error-login=notfound");
} else {
    session_start();
    for ($i = 0; $i < sizeof($array); $i++) {
        $_SESSION['logado'] = true;
        $_SESSION['senha'] = $array[$i]['senha_usuario'];
        $_SESSION['cpf'] = $array[$i]['cpf_usuario'];
        $_SESSION['nome'] = $array[$i]['nome_usuario'];
    }
    header("Location: pedido");
}


