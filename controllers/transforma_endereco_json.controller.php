<?php

class insereBanco
{

    private $con;

    function __construct()
    {
        $this->con = ConexaoBanco::get();
        $this->con->prepare('USE `projetowebservidor`')->execute();
    }

    public function insere($params, $tabela)
    {
        $insert = '(';
        $values = '(';
        foreach ($params as $k => $v) {
            $insert =  $insert . $k . ", ";
            $values = $values . ":" . $k . ", ";
        }

        $insert = substr($insert, 0, (strlen($insert) - 2)) . ")";
        $values = substr($values, 0, (strlen($values) - 2)) . ")";


        $sql = "INSERT INTO $tabela $insert VALUES $values";
        $query = $this->con->prepare($sql);

        foreach ($params as $key => $value) {

            $query->bindParam($key, $value);
        }

        $query->execute();
    }
}

// if ($con = ConexaoBanco::get()) {
//     if (isset($_SESSION['cpf'])) {
//         // $query = $con->prepare("SELECT * FROM enderecos");
//         // $array[] = $query->execute();
//         // print_r($array);

//         $query = $con->prepare("INSERT INTO enderecos (cpf_usuario, cidade, estado, numero, bairro, cep, rua) VALUES (:cpf_usuario, :cidade, :estado, :numero, :bairro, :cep, :rua)");
//         $query->bindParam(':cpf_usuario', $_SESSION['cpf']);
//         $query->bindParam(':cidade', $_POST['cidade']);
//         $query->bindParam(':estado', $_POST['estado']);
//         $query->bindParam(':numero', $_POST['numero']);
//         $query->bindParam(':bairro', $_POST['bairro']);
//         $query->bindParam(':cep', $_POST['cep']);
//         $query->bindParam(':rua', $_POST['rua']);
//         $query->execute();
//     }
// }



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
