<?php

class CadastroController {
    private $bd;

    public function __construct()
    {
        require "vendor/autoload.php";
        $this->bd = new ManipulacaoBanco();
    }

    public function cadastraUsuario(){
        $this->bd->insereDados([
            'cpf_usuario' => $_POST['cpf'],
            'nome_usuario' => $_POST['nome'],
            'senha_usuario' => $_POST['senha'],
            'email_usuario' => $_POST['email'],
            'nasc_usuario' => $_POST['nascimento']
        ], "usuarios");
    }

    public function cadastraEndereco(){
        $this->bd->insereDados([
            'cpf_usuario' => $_SESSION['cpf'],
            'cidade' => $_POST['cidade'],
            'estado' => $_POST['estado'],
            'numero' => $_POST['numero'],
            'bairro' => $_POST['bairro'],
            'cep' => $_POST['cep'],
            'rua' => $_POST['rua']
        ], "enderecos");
    }
}