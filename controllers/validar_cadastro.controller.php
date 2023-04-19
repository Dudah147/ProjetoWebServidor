<?php
    $flag = null;
    $arquivo = 'models/usuarios.model.json';
    if(isset($arquivo)){    
        if(!isset($_POST['nome']) || !isset($_POST['cpf']) || !isset($_POST['nascimento']) || !isset($_POST['email']) || !isset($_POST['senha'])){
            echo 'Erro! Preencha todos os campos!';
        } else {
            fopen($arquivo, 'r');   
            $json = json_decode(file_get_contents($arquivo), true);
            for ($i=0; $i < count($json); $i++) {
                if($_POST['cpf']!==$json[$i]['cpf'] || $_POST['email']!==$json[$i]['email']){
                    $flag = 1;
                }else{
                    $flag = 0;
                    break;
                }
            }
            if($flag==0){
                header("Location: ./cadastro.php?signin_error=true");
            }else{
                echo 'Cadastro realizado com sucesso!';
                require("controllers/transforma_json.controller.php");
            }
        }
    }