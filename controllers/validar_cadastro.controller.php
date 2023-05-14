<?php
    $flag = null;

    $arquivo = 'models/usuarios.model.json'; //modificar para conexão do banco
    if(isset($arquivo)){    
        
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
            header("Location: ./cadastroUsuario?msg=usuario_cadastrado");
        }else{
            echo 'Cadastro realizado com sucesso!';
            require("controllers/transforma_json.controller.php"); //modificar para conexão do banco
        }
        
    }