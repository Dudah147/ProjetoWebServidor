<?php
    $flag = null;
    $arquivo = 'models/usuarios.model.json';
    if(isset($arquivo)){    
        if(empty($_POST['nome']) || empty($_POST['cpf']) || empty($_POST['nascimento']) || empty($_POST['email']) || empty($_POST['senha'])){
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
                header("Location: ./cadastroUsuario.php?signin_error=true");
            }else{
                echo 'Cadastro realizado com sucesso!';
                require("controllers/transforma_json.controller.php");
            }
        }
    }