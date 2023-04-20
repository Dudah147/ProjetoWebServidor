<?php

    $arquivo = "models/enderecos.model.json";
    $enderecos = json_decode(file_get_contents($arquivo), true);

    

    echo "
        <div class='novoEnd'>
            <div class='row'>
                <div class='column'>
                    <div class='row'>
                        <span>CEP: <?= $enderecos[0]['cep'];?></span>
                        <span>Bairro: <?= $enderecos[0]['bairro'];?></span>
                    </div>
                    <div class='row'>
                        <span>Rua: <?= $enderecos[0]['rua'];?></span>
                        <span>N°: <?= $enderecos[0]['numero'];?></span>
                    </div>
                    <div class='row'>
                        <span>Cidade: <?= $enderecos[0]['cidade'];?></span>
                        <span>Estado: <?= $enderecos[0]['estado'];?></span>
                    </div>
                </div>
                <img src='img/lixeira.png' class='lixeira'>
            </div>
        </div>
    ";