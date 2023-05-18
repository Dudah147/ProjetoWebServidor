<?php

class PostController
{
    private $validador;
    public function __construct(){
        require "vendor/autoload.php";
        $this->validador = new ValidadorController();
    }
    public function cadastrarLogin()
    {
        $this->validador->valida_login($_POST['email'],$_POST['senha']);
    }

    public function deslogar()
    {
        session_start();

        if (isset($_SESSION['cpf'])) {
            session_destroy();
            header('Location: /');
        } else {
            echo "Você não está logado";
            header('Location: /login');
        }
    }

    public function cadastrarPedido()
    {
        session_start();

        if (empty($_POST['tamanho']) || empty($_POST['borda']) || empty($_POST['massa']) || empty($_POST['sabores'])) {
            header("Location: pedido?msg=campos");
        } else {
            if ($_SESSION['cpf']) {
                require("transforma_carrinho_json.controller.php");
                header("Location: pedido");
            } else {
                header("Location: pedido?msg=login");
            }
        }
    }

    public function finalizarPedido()
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

            $index = array_search($_SESSION['cpf'], $json_carrinho);
            unset($json_carrinho[$index]);


            file_put_contents($arquivo, json_encode($json_carrinho, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            require("transforma_carrinho_json.controller.php"); // reformular numa classe de transformação de json
            header("Location: meus_pedidos?msg=finalizado"); // utilizar redirect do simple-router
        }
    }

    public function cadastrarUsuario()
    {
        $this->validador->valida_cadastro();
    }

    public function cadastrarEndereco()
    {
        $this->validador->valida_endereco();
    }
}
