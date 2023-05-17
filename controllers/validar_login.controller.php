<?php
/* $email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$arquivo = "models/usuarios.model.json";

session_start();

$flag = null;

if (isset($arquivo)) {
    fopen($arquivo, 'r');
    $json = json_decode(file_get_contents($arquivo), true);
    for ($i = 0; $i < count($json); $i++) {
        if ($email == $json[$i]['email'] && $senha == $json[$i]['senha']) {
            $_SESSION['logado'] = true;
            $_SESSION['senha'] = $json[$i]['senha'];
            $_SESSION['cpf'] = $json[$i]['cpf'];
            $_SESSION['nome'] = $json[$i]['nome'];
            $flag = true;
            header("Location: pedido");
        }
    }
} */

$bd = new ManipulacaoBanco();

$array = $bd->selecionarDados("usuarios", "email_usuario = '{$_POST['email']}' and senha_usuario = '{$_POST['senha']}'");


if (empty($array)) {
    header("Location: login?error-login=notfound");
} else {
    header("Location: pedido");
}
