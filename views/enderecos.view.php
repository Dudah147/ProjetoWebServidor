<div id="container">
    <span id="text_endereco">Meus Endereços</span>
    <hr id="underline">
    <div id="enderecos">
        <?php if(!isset($_SESSION['cpf'])){
            echo '<a href="login.php" style="font-size: 2rem;color: red; padding: 0; margin: 4rem;">Faça login</a>';
        }
        
        
        else{
            echo "
            <a id='btn_cadastrarEnd' href='./cadastrar_endereco.php'>
                <img src='img/mais.png' class='mais'>
                <span>CADASTRAR ENDEREÇO</span>
            </a>
            <hr>
            <div id='infos_enderecos'>
                require('../controllers/verifica_enderecos.controller.php');
            </div>";
        }
        
        ?>
    </div>
</div>