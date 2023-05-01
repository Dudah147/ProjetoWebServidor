<?php 

    $arquivo = 'models/carrinho.model.json';
    if(file_exists($arquivo)){ 
        $carrinho = json_decode(file_get_contents($arquivo), true);
    } else { 
        $carrinho = [];
    }

    $verifica = false;
    foreach($carrinho as $car){
        if($car['cpf'] == $_SESSION['cpf']){

            $win = $car['itens'];
            $verifica = true;
        }
    }

    if($verifica == false){
        echo "<script>const carrinho = $verifica</script>";
    }   
    else{
        $win = json_encode($win);
        echo "<script>const carrinho = $win</script>";
    }

    
    
    require("views/carrinho.view.php");