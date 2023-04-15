<?php 

$arquivo = 'models/usuarios.model.json';
if(file_exists($arquivo)){ 
    $json = json_decode(file_get_contents($arquivo), true);
} else { 
    $json = [];
}

$json[] = [
    "nome" => $_POST['nome'],
    "cpf" => $_POST['cpf'],
    "nascimento" => $_POST['nascimento'],
    "email" => $_POST['email'],
    "senha" => $_POST['senha']
];

file_put_contents($arquivo, json_encode($json, JSON_PRETTY_PRINT));

?>