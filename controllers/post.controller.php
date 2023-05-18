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

        $validarPedido = new ValidadorController();
        $validarPedido->validarPedido();
    }

    public function finalizarPedido()
    {
        session_start();

        $finalizarPedido = new ValidadorController();
        $finalizarPedido->validaFinalizarPedido();
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
