<?php 
    require("./models/ConexaoBanco.php");

    if($con = ConexaoBanco::get()){
        if(isset($_SESSION['cpf'])){
            // $querry = $con->prepare("SELECT * FROM enderecos WHERE cpf='{$_SESSION['cpf']}' AND cep='{$_POST['cep']}'");
            // $array[] = $query->execute();
            
            if(empty($array)){
                $query = $con->prepare("INSERT INTO endereco (cpf_usuario, cidade, estado, numero, bairro, cep, rua) VALUES (:cpf_usuario, :cidade, :estado, :numero, :bairro, :cep, :rua)");
                $query->bindParam(':cpf_usuario', $_SESSION['cpf']);
                $query->bindParam(':cidade', $_POST['cidade']);
                $query->bindParam(':estado', $_POST['estado']);
                $query->bindParam(':numero', $_POST['numero']);
                $query->bindParam(':bairro', $_POST['bairro']);
                $query->bindParam(':cep', $_POST['cep']);
                $query->bindParam(':rua', $_POST['rua']);
                $query->execute();
            }
        }
    }



/* 
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
 */
