<div id="container">
    <span id="text_endereco">Meus Endereços</span>
    <hr id="underline">
    <div id="enderecos">

        <a id='btn_cadastrarEnd' href='./cadastrar_endereco.php'>
            <img src='img/mais.png' class='mais'>
            <span>CADASTRAR ENDEREÇO</span>
        </a>
        <hr>
        <div id='infos_enderecos'>
            <?php 
            if(!$flag):
                echo '<h2 id="nao_possui" style="margin: 3rem; color: gray;">Você não possui endereço cadastrado!</h2>';
            
            else:
                foreach($enderecos_usuario as $endereco):?>
                    <div class='novoEnd'>
                        <div class='row'>
                            <div class='column'>
                                <div class='row'>
                                    <span>CEP: <?= $endereco['cep'];?></span>
                                    <span>Bairro: <?= $endereco['bairro'];?></span>
                                </div>
                                <div class='row'>
                                    <span>Rua: <?= $endereco['rua'];?></span>
                                    <span>N°: <?= $endereco['numero'];?></span>
                                </div>
                                <div class='row'>
                                    <span>Cidade: <?= $endereco['cidade'];?></span>
                                    <span>Estado: <?= $endereco['estado'];?></span>
                                </div>
                            </div>
                            <img src='img/lixeira.png' class='lixeira'>
                        </div>
                    </div>
                <?php endforeach;
            endif;?>
        </div>
    </div>
</div>