<?php 
    $arquivo = 'models/enderecos.model.json';
    if(file_exists($arquivo)){ 
        $json = json_decode(file_get_contents($arquivo), true);
    }else{ 
        $json = [];
    }

    $id = sizeof($json);

    $json[] = [
        "id_endereco" => $id,
        "cpf" => $_SESSION['cpf'],
        "cep" => $_POST['cep'],
        "rua" => $_POST['rua'],
        "bairro" => $_POST['bairro'],
        "cidade" => $_POST['cidade'],
        "estado" => $_POST['estado'],
        "numero" => $_POST['numero']
    ];

    file_put_contents($arquivo, json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

?>