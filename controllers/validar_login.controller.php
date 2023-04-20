<?php 
    function validar_sessao(){
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';
        $arquivo = "models/usuarios.model.json";
        if(isset($_GET['error'])){
            echo "Não foi possível validar a sessão";
        }
        
        if(isset($arquivo)){
            fopen($arquivo, 'r');   
            $json = json_decode(file_get_contents($arquivo), true);
            for ($i=0; $i < count($json); $i++) {
                if($email == $json[$i]['email'] && $senha == $json[$i]['senha']){
                    $_SESSION['logado']= true;
                    $_SESSION['senha'] = $json[$i]['senha'];
                    $_SESSION['cpf'] = $json[$i]['cpf'];
                    $_SESSION['nome'] = $json[$i]['nome'];
                    $flag [] = [
                        'flag' => true,
                        'cpf' =>  $json[$i]['cpf'],
                        'senha' =>  $json[$i]['senha']
                    ];
                    header("Location: pedido.php");
                }
            }
            if(!isset($flag) && !isset($_GET['error'])){
                echo "Usuário incorreto, tente novamente!";
            }
        }else{
            require('controller/transformar_json.controller.php');
        }
    }
    validar_sessao();
?>