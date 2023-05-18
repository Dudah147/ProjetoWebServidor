<?php

class PostController
{

    public function cadastrarLogin()
    {
        $login = new ValidadorController();
        $login->valida_login($_POST['email'], $_POST['senha']);
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
        $cadatroUsuario = new ValidadorController();
        $cadatroUsuario->valida_cadastro();
    }

    public function cadastrarEndereco()
    {
        $cadastroEndereco = new ValidadorController();
        $cadastroEndereco->valida_endereco();
    }
}
