<?php 
    session_start();
    if(isset($_GET['action'])=='deslogar'){
        echo $_SESSION['cpf'];
        if(isset($_SESSION['cpf'])){
            session_destroy();
            header('Location: ../index.php');
        }else{
            echo "Você não está logado";
            header('Location: ../login.php');
        }
    }
?>