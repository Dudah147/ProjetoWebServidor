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
            header("Location: pedido?msg=logado");
        }
        return $this->validado;
    }

    public function valida_cadastro()
    {
        if (empty($_POST['nome']) || empty($_POST['cpf']) || empty($_POST['nascimento']) || empty($_POST['email']) || empty($_POST['senha'])) {
            header('Location: cadastroUsuario?msg=campos');
        } else {
            $array = $this->bd->selecionarDados("usuarios", "email_usuario = '{$_POST['email']}' or cpf_usuario = '{$_POST['cpf']}' ");
            print_r($array);
            if (empty($array)) {
                $this->validado = true;
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
                $this->validado = true;
            }
        }
        return $this->validado;
    }

    public function validarPedido()
    {

        if (empty($_POST['tamanho']) || empty($_POST['borda']) || empty($_POST['massa']) || empty($_POST['sabores'])) {
            header("Location: pedido?msg=campos");
            return false;
        } else {
            if ($_SESSION['cpf']) {
                return true;
            } else {
                header("Location: pedido?msg=login");
                return false;
            }
        }
    }

    public function validaFinalizarPedido()
    {
        if (!$_POST['endereco'] || !$_POST['forma_pagamento']) {
            return false;
        } else {
            return true;
        }
    }
}
