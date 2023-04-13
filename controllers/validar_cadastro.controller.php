<?php

    if(!isset($_POST['nome']) || !isset($_POST['cpf']) || !isset($_POST['nascimento']) || !isset($_POST['email']) || !isset($_POST['senha'])){
        echo 'Erro! Preencha todos os campos!';
    } else {
        echo 'Cadastro realizado com sucesso!';
        require("controllers/transforma_json.controller.php");
    }