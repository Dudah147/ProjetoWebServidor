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

    header("Location: enderecos?msg=endereco_cadastrado");
} else {
    header("Location: cadastroEndereco?msg=ja_cadastrado");
}
