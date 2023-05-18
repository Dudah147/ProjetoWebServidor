<?php

class GetController
{
    private $bd;
    public function __construct()
    {
        require "vendor/autoload.php";
        $this->bd = new ManipulacaoBanco();
    }

    public function viewIndex()
    {

        session_start();

        require "./views/index.view.php";
    }

    public function viewCardapio()
    {
        session_start();

        //Selecionar os tamanhos
        $tamanho = $this->bd->selecionarDados('tamanho');

        //Selecionar as massas
        $massa = $this->bd->selecionarDados('massa');

        //Selecionar borda
        $bordas = $this->bd->selecionarDados('borda');

        //Selecionar sabores
        $sabores = $this->bd->selecionarDados('sabores');

        //Adicionando valores ao cardapio
        $cardapio = [
            'massa' => $massa,
            'tamanhos' => $tamanho,
            'bordas' => $bordas,
            'sabores' => $sabores
        ];

        $cardapio = json_encode($cardapio);

        require "./views/cardapio.view.php";
    }

    public function viewPedido()
    {
        session_start();
        $tamanhos = $this->bd->selecionarDados('tamanho');
        $bordas = $this->bd->selecionarDados('borda');
        $massas = $this->bd->selecionarDados('massa');
        $sabores = $this->bd->selecionarDados('sabores');

        require("views/pedido.view.php");
    }

    public function viewEnderecos()
    {
        session_start();

        if (isset($_SESSION['cpf'])) {
            $session = true;

            $enderecos_usuario = $this->bd->selecionarDados('enderecos', "cpf_usuario = '{$_SESSION['cpf']}'");

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
        $enderecos_usuario = $this->bd->selecionarDados('enderecos', "cpf_usuario = '{$_SESSION['cpf']}'");

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
        // $arquivo = "models/pedidos.model.json";
        // if (file_exists($arquivo)) {
        //     $pedidos = json_decode(file_get_contents($arquivo), true);
        // } else {
        //     $pedidos = [];
        // }


        // $verifica = false;
        // $pedidos_usuario = [];

        // if (isset($_SESSION['cpf'])) {
        //     foreach ($pedidos as $pedido) {
        //         if ($pedido['cpf'] == $_SESSION['cpf']) {

        //             $pedidos_usuario[] = $pedido;
        //             $verifica = true;
        //         }
        //     }
        // }


        if (isset($_SESSION['cpf'])) {
            $pedidos = $this->bd->selecionarDados('pedidos', "cpf_usuario = '{$_SESSION['cpf']}'");

            if(!empty($pedidos)){
                $sql = "";
                $pedidos['itens'] = $this->bd->selecionarDados('pedidos', "cpf_usuario = '{$_SESSION['cpf']}'");
                

                $verifica = true;
            }
        }
        require("views/meus_pedidos.view.php");
    }

    public function viewCadastroUsuario()
    {
        session_start();

        require("views/cadastro.view.php");
    }

    public function viewCadastroEndereco()
    {
        session_start();

        require("views/cadastrar_endereco.view.php");
    }
}
