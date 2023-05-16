<?php

$bd = new ManipulacaoBanco();

$array = $bd->selecionarDados("enderecos", "numero = {$_POST['numero']} and cep = '{$_POST['cep']}' and cpf_usuario = '{$_SESSION['cpf']}' ");

if (empty($array)) {
    $bd->insereDados([
        'cpf_usuario' => $_SESSION['cpf'],
        'cidade' => $_POST['cidade'],
        'estado' => $_POST['estado'],
        'numero' => $_POST['numero'],
        'bairro' => $_POST['bairro'],
        'cep' => $_POST['cep'],
        'rua' => $_POST['rua']
    ], "enderecos");
} else {
    header("Location: cadastroEndereco?msg=ja_cadastrado");
}

// if (($_POST['numero'] !== $json[$i]['numero']) || ($_POST['numero'] == $json[$i]['numero'] && $_POST['cep'] !== $json[$i]['cep'])) {
//     $flag1 = 1;
// } else if ($_POST['numero'] == $json[$i]['numero'] && $_POST['cep'] == $json[$i]['cep'] && $_SESSION['cpf'] !== $json[$i]['cpf']) {
//     $flag1 = 1;
