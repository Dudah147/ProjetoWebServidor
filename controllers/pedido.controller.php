<?php
require("models/cardapio.model.php");
$cardapio = json_decode($cardapio, true);
$tamanhos = $cardapio['tamanhos'];
$bordas = $cardapio['bordas'];
$massas = $cardapio['massa'];
$sabores = $cardapio['sabores'];

require("views/pedido.view.php");
