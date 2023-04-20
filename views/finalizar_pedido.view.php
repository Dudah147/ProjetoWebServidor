<div id="container">
    <span id="text_finalPedido">Endereço para entrega</span>
    <hr id="underline">
    
    <div id="finalPedido">
        <div class= "row">
            <h3>Resumo Pedido</h3>
        </div>

        <div class="column" id="end">
            <?php 
            if(!$flag):
                echo '<h2 style="margin: 3rem; color: gray;">Você não possui endereço cadastrado!</h2>';
            
            else:
                foreach($enderecos_usuario as $endereco):?>
                    <div style="width: 80%">
                        <label class="rad-label" name="<?=$endereco['id_endereco']?>">
                            <input type="radio" class="rad-input" name="rad">
                            <div class="rad-design"></div>
                            <div class="rad-text">
                                <div class="column">
                                    <div class="row">
                                        <span>CEP: <?=$endereco['cep']?></span>
                                        <span>Bairro: <?=$endereco['bairro']?></span>
                                    </div>
                                    <div class="row">
                                        <span>Rua: <?=$endereco['rua']?></span>
                                        <span>N°: <?=$endereco['numero']?></span>
                                    </div>
                                    <div class="row">
                                        <span>Cidade: <?=$endereco['cidade']?></span>
                                        <span>Estado: <?=$endereco['estado']?></span>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                <?php endforeach;
            endif;?>
            
            <div class="row ou">
                <hr><span>OU</span>
                <hr>
            </div>

            <div id="CadastrarEnd" class="row">
                <img src="img/endereco.png" alt="">
                <span>Cadastrar Endereço</span>
            </div>


        </div>
    </div>
</div>