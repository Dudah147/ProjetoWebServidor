<?php

    $flag = null;
    $arquivo = 'models/enderecos.model.json';

    if(isset($arquivo)){
        if(isset($_SESSION['senha'], $_SESSION['cpf'])){
            if(!isset($_POST['cep'], $_POST['rua'], $_POST['bairro'], $_POST['cidade'], $_POST['estado'], $_POST['numero'])){           
                echo 'Erro! Preencha todos os dados';
                }else {
                    fopen($arquivo, 'r');   
                    $json = json_decode(file_get_contents($arquivo), true);
                    for ($i=0; $i < count($json); $i++) {
                        if($_SESSION['cpf']!==$json[$i]['cpf'] && $_POST['cep']!==$json[$i]['cep'] && $_POST['rua']!==$json[$i]['rua'] && $_POST['numero']!==$json[$i]['numero'] ){
                            $flag = 1;
                        }else{
                            $flag = 0;
                            break;
                        }
                    }
                    if($flag==0){
                        header("Location: ./cadastrar_endereco.php?error=true");
                    }else{
                        echo 'Cadastro realizado com sucesso!';
                        require("controllers/transforma_endereco_json.controller.php");
                    }
                }
            }
        
        }else
        {
            header("Location: login.php?error=true");
        }