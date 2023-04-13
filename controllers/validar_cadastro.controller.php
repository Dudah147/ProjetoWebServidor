<?php
    
    $nome = $_POST['nome']??'';
    $cpf = $_POST['cpf'] ?? '';
    $nascimento = $_POST['nascimento'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    
    if($nome=='' || $cpf=='' || $nascimento=='' || $email=='' ||$senha==''){
        echo 'Erro! Preencha todos os campos!';
    } else {
        echo 'Cadastro realizado com sucesso!';
        require("controllers/transformar_json.controller.php");
    }
