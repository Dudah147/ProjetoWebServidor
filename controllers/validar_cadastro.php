<?php

class ValidarCadastro
{

    private $bd;
    public function __construct()
    {
        $this->bd = new ManipulacaoBanco();
    }

    public function validarPedido()
    {

        if (empty($_POST['tamanho']) || empty($_POST['borda']) || empty($_POST['massa']) || empty($_POST['sabores'])) {
            header("Location: pedido?msg=campos");
        } else {
            if ($_SESSION['cpf']) {

                $arquivo = 'models/carrinho.model.json';
                if (file_exists($arquivo)) {
                    $json = json_decode(file_get_contents($arquivo), true);
                } else {
                    $json = [];
                }

                //resgata informações dos itens
                $itens = [];
                $valor_total = 0;

                $tamanho = $this->bd->selecionarDados('tamanho', "tamanho = '{$_POST['tamanho']}'");
                $borda = $this->bd->selecionarDados('borda', "borda = '{$_POST['borda']}'");
                $massa = $this->bd->selecionarDados('massa', "massa = '{$_POST['massa']}'");

                $itens["tamanho"] = [
                    "tamanho" => $tamanho[0]['tamanho'],
                    "preco" => $tamanho[0]['preco_tamanho']
                ];
                $valor_total += $tamanho[0]['preco_tamanho'];

                $itens["borda"] = [
                    "borda" => $borda[0]['borda'],
                    "preco" => $borda[0]['preco_borda']
                ];
                $valor_total += $borda[0]['preco_borda'];

                $itens["massa"] = [
                    "massa" => $massa[0]['massa'],
                    "preco" => $massa[0]['preco_massa']
                ];
                $valor_total += $massa[0]['preco_massa'];

                $sabores_post =  explode(",", $_POST['sabores']);
                foreach ($sabores_post as $sab) {
                    $aux = $this->bd->selecionarDados('sabores', "sabores = '{$sab}'");
                    $itens["sabores"][] = [
                        "sabor" => $aux[0]['sabores'],
                        "preco" => $aux[0]['preco_sabor']
                    ];
                    $valor_total += $aux[0]['preco_sabor'];
                }
                $itens['total'] = $valor_total;

                print("<pre>" . print_r($itens, true) . "</pre>");

                //flag para ver se o cliente não possui no carrinho
                $flag = false;
                for ($i = 0; $i < sizeof($json); $i++) {
                    //Se o cliente tiver carrinho ele faz append em itens
                    if ($json[$i]['cpf'] == $_SESSION['cpf']) {

                        $json[$i]['itens'][] = $itens;

                        $flag = true;
                    }
                }

                //verifica se o cliente não possui no carrinho
                if ($flag == false) {
                    $json[] = [
                        "cpf" => $_SESSION['cpf'],
                        "itens" => [$itens]
                    ];
                }

                file_put_contents($arquivo, json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

                header("Location: pedido?msg=pedido_add");
            } else {
                header("Location: pedido?msg=login");
            }
        }
    }

    public function validarFinalizarPedido()
    {
        if (!$_POST['endereco'] || !$_POST['forma_pagamento']) {
            header('Location: finalizar_pedido?msg=campos');
        } else {
            //Remover pedido do carrinho
            $arquivo = 'models/carrinho.model.json';
            if (file_exists($arquivo)) {
                $json_carrinho = json_decode(file_get_contents($arquivo), true);
            } else {
                $json_carrinho = [];
            }
            $carrinho_usuario = [];
            for ($i = 1; $i <= sizeof($json_carrinho); $i++) {
                if ($json_carrinho["$i"]['cpf'] == $_SESSION['cpf']) {
                    $carrinho_usuario = $json_carrinho["$i"];
                    // unset($json_carrinho["$i"]);
                }
            }


            file_put_contents($arquivo, json_encode($json_carrinho, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));


            $dt = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
            $dt->setTimestamp(time());

            $data = $dt->format('d-m-Y H:i:s');

            echo $data;

            // $id_pedido = $this->bd->insereDados([
            //     "cpf_usuario" => $_SESSION['cpf'],
            //     "valor_total_pedido" => $_POST['valor_total'],
            //     "data_pedido" => $data
            //     // "itens" => $carrinho_usuario['itens']
            // ], "pedidos");




            // require("transforma_pedido.controller.php"); // reformular numa classe de transformação de json

            // header("Location: meus_pedidos?msg=finalizado"); // utilizar redirect do simple-router
        }
    }
}
