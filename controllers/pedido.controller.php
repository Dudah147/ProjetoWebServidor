<?php
    require("models/cardapio.model.php");
    $cardapio = json_decode($cardapio, true);
    $tamanhos = $cardapio['tamanhos'];
    $bordas = $cardapio['bordas'];
    $massas = $cardapio['massa'];
    $sabores = $cardapio['sabores'];

    if (isset($_GET['cadastrar'])){
        if(empty($_POST['tamanho']) || empty($_POST['borda']) || empty($_POST['massa']) || empty($_POST['sabores'])){
            echo "<div id='feedback'><span>Preencha todos os campos</span><div></div></div>";
        }
        else{
            if($_SESSION['cpf']){
                require("transforma_pedido_json.controller.php");
            }
            else{
                echo "<div id='feedback'><span>Faça login para continuar</span><div></div></div>";
            }
        }   
    }

    require("views/pedido.view.php");