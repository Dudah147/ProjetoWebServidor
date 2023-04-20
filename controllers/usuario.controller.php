<?php
    if(isset($_SESSION['cpf'], $_SESSION['senha'])){
        $usuario = $_SESSION['nome'];
        $msg = "Deseja sair? Clique aqui";
    }else{
        $usuario = "visitante";
        $msg = "Cadastre-se ou Entre";
    }
    
    require("views/usuario.view.php");
