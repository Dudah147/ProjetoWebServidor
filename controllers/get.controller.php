<?php

class GetController
{

    public function viewIndex()
    {

        session_start();

        require "./views/index.view.php";
    }

    public function viewCardapio()
    {
        session_start();

        require "./views/cardapio.view.php";

        require("models/cardapio.model.php");
        echo "<script>const resposta = $cardapio</script>";
    }

    public function viewPedido()
    {
        session_start();

        require("models/cardapio.model.php");
        $cardapio = json_decode($cardapio, true);
        $tamanhos = $cardapio['tamanhos'];
        $bordas = $cardapio['bordas'];
        $massas = $cardapio['massa'];
        $sabores = $cardapio['sabores'];

        require("views/pedido.view.php");
    }

    public function viewEnderecos()
    {
        session_start();

        if (isset($_SESSION['cpf'])) {
            $session = true;
            $arquivo = "models/enderecos.model.json";
            $enderecos = json_decode(file_get_contents($arquivo), true);

            $enderecos_usuario = [];
            $flag = false;
            foreach ($enderecos as $e) {
                if ($e['cpf'] == $_SESSION['cpf']) {
                    $enderecos_usuario[] = $e;
                    $flag = true;
                }
            }
            require("views/enderecos.view.php");
        } else {
            $session = false;
            require("views/enderecos.view.php");
        }
    }

    public function viewLogin()
    {
        session_start();

        if (isset($_SESSION['cpf'], $_SESSION['senha'])) {
            $logado = true;
        } else {
            $logado = false;
        }

        require "views/login.view.php";
    }

    public function viewFinalizarPedido()
    {
        session_start();
        //endereco
        $arquivo = "models/enderecos.model.json";
        $enderecos = json_decode(file_get_contents($arquivo), true);
        $enderecos_usuario = [];
        $flag = false;
        foreach ($enderecos as $e) {
            if ($e['cpf'] == $_SESSION['cpf']) {
                $enderecos_usuario[] = $e;
                $flag = true;
            }
        }

        //carrinho
        $arquivo = "models/carrinho.model.json";
        $carrinho = json_decode(file_get_contents($arquivo), true);
        $carrinho_usuario = null;
        foreach ($carrinho as $c) {
            if ($c['cpf'] == $_SESSION['cpf']) {
                $carrinho_usuario  = $c;
                break;
            }
        }

        require("views/finalizar_pedido.view.php");
    }

    public function viewMeusPedidos()
    {
        session_start();
        $arquivo = "models/pedidos.model.json";
        if (file_exists($arquivo)) {
            $pedidos = json_decode(file_get_contents($arquivo), true);
        } else {
            $pedidos = [];
        }


        $verifica = false;
        $pedidos_usuario = [];

        if (isset($_SESSION['cpf'])) {
            foreach ($pedidos as $pedido) {
                if ($pedido['cpf'] == $_SESSION['cpf']) {

                    $pedidos_usuario[] = $pedido;
                    $verifica = true;
                }
            }
        }
        require("views/meus_pedidos.view.php");
    }

    public function viewCadastroUsuario()
    {
        session_start();

        require("views/cadastro.view.php");
    }
}
