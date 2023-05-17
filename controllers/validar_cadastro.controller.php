<?php

$bd = new ManipulacaoBanco();

$array = $bd->selecionarDados("usuarios", "email_usuario = '{$_POST['email']}' and nome_usuario = '{$_POST['nome']}' and cpf_usuario = '{$_POST['cpf']}' ");
print_r($array);

if (empty($array)) {
     $bd->insereDados([
        'cpf_usuario' => $_POST['cpf'],
        'nome_usuario' => $_POST['nome'],
        'senha_usuario' => $_POST['senha'],
        'email_usuario' => $_POST['email'],
        'nasc_usuario' => $_POST['nascimento']
    ], "usuarios"); 
    header("Location: enderecos?msg=usuario_cadastrado");
} else {
    header("Location: cadastroUsuario?msg=ja_cadastrado");
}
