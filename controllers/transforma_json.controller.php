<?php 
    $dados = array(
        array(
            "nome" => $nome,
            "cpf" => $cpf,
            "nascimento" => $nascimento,
            "email" => $email,
            "senha" => $senha
        )
    );

    $arquivo = 'models/usuarios.model.php';
    $json = json_encode($dados);
    $file = fopen(__DIR__ . '/' . $arquivo,'w');
    fwrite($file, $json);
    fclose($file);
?>