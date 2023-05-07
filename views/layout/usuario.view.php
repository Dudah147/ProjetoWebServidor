<!-- --- usuario --- -->
<div id="user_container">
    <div id="header_user">
        <h2>Olá, <?=$usuario?></h2>
        <a href="login.php"><?=$msg?></a>
    </div>
    <div class="column">
        <div class="row">
            <img src="img/inicio.png" class="imgs_user">
            <a href="index.php">Início</a>
        </div>
        <div class="row">
            <img src="img/endereco.png" class="imgs_user">
            <a href="enderecos.php">Meus Endereços</a>
        </div>
        <div class="row">
            <img src="img/pedido.png" class="imgs_user">
            <a href="meus_pedidos.php">Meus Pedidos</a>
        </div>
    </div>
</div>
<!-- --- fim usuario --- -->