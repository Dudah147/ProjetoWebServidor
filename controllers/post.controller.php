<?php

class PostController
{
    private $validador;
    private $cadastrar;
    public function __construct(){
        require "vendor/autoload.php";
        $this->validador = new ValidadorController();
        $this->cadastrar = new CadastroController();
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
        if($this->validador->valida_cadastro()){
            $this->cadastrar->cadastraUsuario();
            header("Location: login?msg=usuario_cadastrado");
        }else {
            header("Location: cadastroUsuario?msg=ja_cadastrado");
        }
    }

    public function cadastrarEndereco()
    {
        if($this->validador->valida_endereco()){
            $this->cadastrar->cadastraEndereco();
            header("Location: enderecos?msg=endereco_cadastrado");
        }else {
            header("Location: cadastroEndereco?msg=ja_cadastrado");
        }
    }
}
