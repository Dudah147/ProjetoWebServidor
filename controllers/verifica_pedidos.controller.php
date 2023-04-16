<?php
// ARRAY TEMPORARIO ATÉ PODER RESGATAR O SESSION
    $arquivo = "models/pedidos.model.json";
    $pedidos = json_decode(file_get_contents($arquivo), true);
    $verifica = false;
    $win = [];
    // print("<pre>".print_r($pedidos,true)."</pre>");
    foreach($pedidos as $pedido){
        if($pedido['cpf'] == "115.392.999-61"){
            $pedido_id = $pedido["id_pedido"];
            $pedido_data = $pedido["data"];
            $pedido_total = $pedido["valor_total"];
            echo "<div class='pedido'>
                <div>
                    <h3>Pedido  $pedido_id </h3>
                    <span style='color:grey; font-size: .8rem'>$pedido_data</span>
                    <button class='ver_detalhes'>Ver detalhes</button>
                </div>
                <div>
                    <span>Total: <strong>R$ $pedido_total</strong>
                </div>
            </div>";
            $verifica = true;
            $win[] = $pedido;
        }
    }


    if($verifica == false){
        echo "Você não possui pedidos";
    }