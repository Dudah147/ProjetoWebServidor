<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Pedidos </title>
    <link rel="stylesheet" href="CSS/Pedido.css">
</head>
<body id="body">
    
    <?php require("views/header.view.php");?>

    <div id="container_pedido">
        <span id="text_pedido">Pedido Online</span>
        <hr id="underline">
    
        <div id="pedido">
            <div id="tamanho">
                <div class="tipo">
                    <img src="img/setaCima.png" class="seta" name="setaCima">
                    <span>TAMANHO</span>
                </div>
                <hr>
                <div class="infos">
                    
                </div>
            </div>
            
            <div id="borda">
                <div class="tipo">
                    <img src="img/setaCima.png" class="seta">
                    <span>BORDA</span>
                </div>
                <hr>
                <div class="infos">
                </div>
            </div>
            <div id="massa">
                <div class="tipo">
                    <img src="img/setaCima.png" class="seta">
                    <span>MASSA</span>
                </div>
                <hr>
                <div class="infos">
                </div>
            </div>


            <div id="sabores_id">
                <div class="tipo">
                    <img src="img/setaCima.png" class="seta">
                    <span>SABORES</span>
                </div>
                <hr>
                <div class="infos">
                    
                </div>
                
            </div>

            


            <div id="obs">
                <div class="tipo">
                    <img src="img/setaCima.png" class="seta">
                    <span>OBSERVAÇÕES</span>
                </div>
                <div class="infos">
                    
                </div>
            </div>
            
        </div>
    </div>
    
    <?php require("views/carrinho.view.php");?>
    
    <?php require("views/usuario.view.php");?>

    <script type="text/javascript" src="JS/Pedido.js"></script>
</body>
</html>