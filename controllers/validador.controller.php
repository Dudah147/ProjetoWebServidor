<?php

class ValidadorController
{
    private $validado;
    private $bd;

    public function __construct()
    {
        require "vendor/autoload.php";
        $this->validado = false;
        $this->bd = new ManipulacaoBanco();
    }

    public function valida_login($email, $senha)
    {
        $array = $this->bd->selecionarDados("usuarios", "email_usuario = '{$email}' and senha_usuario = '{$senha}'");

        if (empty($array)) {
            header("Location: login?error-login=notfound");
        } else {
            session_start();
            for ($i = 0; $i < sizeof($array); $i++) {
                $_SESSION['logado'] = true;
                $_SESSION['senha'] = $array[$i]['senha_usuario'];
                $_SESSION['cpf'] = $array[$i]['cpf_usuario'];
                $_SESSION['nome'] = $array[$i]['nome_usuario'];
            }
            $this->validado = true;
            header("Location: pedido");
        }
        return $this->validado;
    }

    public function valida_cadastro()
    {
        if (empty($_POST['nome']) || empty($_POST['cpf']) || empty($_POST['nascimento']) || empty($_POST['email']) || empty($_POST['senha'])) {
            header('Location: cadastroUsuario?msg=campos');
        } else {
            $array = $this->bd->selecionarDados("usuarios", "email_usuario = '{$_POST['email']}' and nome_usuario = '{$_POST['nome']}' and cpf_usuario = '{$_POST['cpf']}' ");
            print_r($array);

            if (empty($array)) {
                $this->bd->insereDados([
                    'cpf_usuario' => $_POST['cpf'],
                    'nome_usuario' => $_POST['nome'],
                    'senha_usuario' => $_POST['senha'],
                    'email_usuario' => $_POST['email'],
                    'nasc_usuario' => $_POST['nascimento']
                ], "usuarios");
                $this->validado = true;
                header("Location: login?msg=usuario_cadastrado");
            } else {
                header("Location: cadastroUsuario?msg=ja_cadastrado");
            }
            return $this->validado;
        }
    }

    public function valida_endereco()
    {

        session_start();

        if (empty($_POST['cep']) || empty($_POST['rua']) || empty($_POST['bairro']) || empty($_POST['cidade']) || empty($_POST['estado']) || empty($_POST['numero'])) {
            header('Location: cadastroEndereco?msg=campos');
        } else {
            $array = $this->bd->selecionarDados("enderecos", "numero = {$_POST['numero']} and cep = '{$_POST['cep']}' and cpf_usuario = '{$_SESSION['cpf']}' ");

            if (empty($array)) {
                $this->bd->insereDados([
                    'cpf_usuario' => $_SESSION['cpf'],
                    'cidade' => $_POST['cidade'],
                    'estado' => $_POST['estado'],
                    'numero' => $_POST['numero'],
                    'bairro' => $_POST['bairro'],
                    'cep' => $_POST['cep'],
                    'rua' => $_POST['rua']
                ], "enderecos");

                header("Location: enderecos?msg=endereco_cadastrado");
            } else {
                header("Location: cadastroEndereco?msg=ja_cadastrado");
            }
            $this->validado = true;
        }
        return $this->validado;
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
                    "id_tamanho" => $tamanho[0]['id_tamanho'],
                    "tamanho" => $tamanho[0]['tamanho'],
                    "preco" => $tamanho[0]['preco_tamanho']
                ];
                $valor_total += $tamanho[0]['preco_tamanho'];

                $itens["borda"] = [
                    "id_borda" => $borda[0]['id_borda'],
                    "borda" => $borda[0]['borda'],
                    "preco" => $borda[0]['preco_borda']
                ];
                $valor_total += $borda[0]['preco_borda'];

                $itens["massa"] = [
                    "id_massa" => $massa[0]['id_massa'],
                    "massa" => $massa[0]['massa'],
                    "preco" => $massa[0]['preco_massa']
                ];
                $valor_total += $massa[0]['preco_massa'];

                $sabores_post =  explode(",", $_POST['sabores']);
                foreach ($sabores_post as $sab) {
                    $aux = $this->bd->selecionarDados('sabores', "sabores = '{$sab}'");
                    $itens["sabores"][] = [
                        "id_sabor" => $aux[0]['id_sabor'],
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

    public function validaFinalizarPedido()
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
                    unset($json_carrinho["$i"]);
                }
            }


            file_put_contents($arquivo, json_encode($json_carrinho, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));


            $dt = new DateTime("now", new DateTimeZone('America/Sao_Paulo'));
            $dt->setTimestamp(time());

            $data = $dt->format('Y-m-d H:i:s');

            echo $data;

            $id_pedido = $this->bd->insereDados([
                "cpf_usuario" => $_SESSION['cpf'],
                "valor_total_pedido" => $_POST['valor_total'],
                "data_pedido" => $data
            ], "pedidos");

            foreach ($carrinho_usuario['itens'] as $item) {
                $id_item = $this->bd->insereDados([
                    "id_borda" => $item['borda']['id_borda'],
                    "id_tamanho" => $item['tamanho']['id_tamanho'],
                    "id_massa" => $item['massa']['id_massa'],
                    "id_pedido" => $id_pedido,
                    "valor_item" => $item['total']
                ], "item");

                foreach ($item['sabores'] as $sabor) {
                    $this->bd->insereDados([
                        "id_item" => $id_item,
                        "id_sabor" => $sabor['id_sabor']
                    ], "item_sabores");
                }
            }


            header("Location: meus_pedidos?msg=finalizado"); // utilizar redirect do simple-router
        }
    }
}
