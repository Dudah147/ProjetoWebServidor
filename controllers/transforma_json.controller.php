<?php 
    $dados = [
        "nome" => $_POST['nome'],
        "cpf" => $_POST['cpf'],
        "nascimento" => $_POST['nascimento'],
        "email" => $_POST['email'],
        "senha" => $_POST['senha']
    ];

    $arquivo = 'models/usuarios.model.json';
    $json = json_encode($dados, JSON_PRETTY_PRINT);

    file_put_contents($arquivo, $json, FILE_APPEND);

?>