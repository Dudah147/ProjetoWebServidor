<?php 
    session_start();

    $arquivo = "models/usuarios.model.json";

    if(isset($arquivo)){
        fopen($arquivo, 'r');   
        $json = json_decode(file_get_contents($arquivo), true);
        for ($i=0; $i < count($json); $i++) { 
            if($_POST['email'] == $json[$i]['email'] && $_POST['senha'] == $json[$i]['senha']){
                $_SESSION['senha'] = $json[$i]['senha'];
                $_SESSION['cpf'] = $json[$i]['cpf'];
            }
        }
        header("Location: pedido.php");
    }

    if(isset($_GET['error'])){
        echo "Não foi possível validar a sessão";
    }
?>