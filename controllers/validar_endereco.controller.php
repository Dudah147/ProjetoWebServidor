<?php
    $flag1 = null;
    $arquivo = 'models/enderecos.model.json';

    if(isset($arquivo)){
        if(isset($_SESSION['senha'], $_SESSION['cpf'])&& $_SESSION['logado']==true){
            if(empty($_POST['cep']) || empty($_POST['rua']) || empty($_POST['bairro']) || empty($_POST['cidade']) || empty($_POST['estado']) || empty($_POST['numero'])){           
                echo 'Erro! Preencha todos os dados';
            }else {
                fopen($arquivo, 'r');   
                $json = json_decode(file_get_contents($arquivo), true);
                for ($i=0; $i < count($json); $i++) {
                    if(($_POST['numero']!==$json[$i]['numero'])|| ($_POST['numero']==$json[$i]['numero']&&$_POST['cep']!==$json[$i]['cep'])){
                        $flag1 = 1;
                    }else if($_POST['numero']==$json[$i]['numero']&&$_POST['cep']==$json[$i]['cep'] && $_SESSION['cpf']!==$json[$i]['cpf']){
                        $flag1 = 1;
                    }else {
                        $flag1 = 0;
                        break;
                    }
                }
                if($flag1==0){
                    header("Location: ./cadastrar_endereco.php?error-end=true");
                }else{
                    echo 'Cadastro realizado com sucesso!';
                    require("controllers/transforma_endereco_json.controller.php");
                }
            }
        }
    }else{
        header("Location: login.php?error=true");
    }