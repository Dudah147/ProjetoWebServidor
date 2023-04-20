<?php 
    session_start();
    if(isset($_SESSION['cpf'])){
        $arquivo = "models/enderecos.model.json";
        $enderecos = json_decode(file_get_contents($arquivo), true);
        $enderecos_usuario = [];
        $flag = false;
        foreach($enderecos as $e){
            if($e['cpf'] == $_SESSION['cpf']){
                $enderecos_usuario [] = $e;
                $flag = true;
            }
        }
        require("views/verifica_enderecos.view.php");
    }else{
        require("views/enderecos.view.php");
    }
