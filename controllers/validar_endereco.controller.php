<?php


    if(isset($_SESSION['email'], $_SESSION['senha'], $_SESSION['cpf'])){
        $cep = $_POST['cep'] ?? '';
        $rua = $_POST['rua'] ?? '';
        $bairro = $_POST['bairro'] ?? '';
        $cidade = $_POST['cidade'] ?? '';
        $estado = $_POST['estado'] ?? '';
        $numero = $_POST['numero'] ?? '';

        
        echo "$cep";
        
        if($cep ==''){
            echo 'Erro! Preencha todos os dados';
        }else {
            echo 'cadastrar no banco';
            
        }
    }else{
        header("Location: login.php?error=true");
    }