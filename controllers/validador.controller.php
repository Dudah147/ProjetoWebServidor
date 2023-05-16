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
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';
        $arquivo = "models/usuarios.model.json";

        session_start();

        $flag = null;

        if (isset($arquivo)) {
            fopen($arquivo, 'r');
            $json = json_decode(file_get_contents($arquivo), true);
            for ($i = 0; $i < count($json); $i++) {
                if ($email == $json[$i]['email'] && $senha == $json[$i]['senha']) {
                    $_SESSION['logado'] = true;
                    $_SESSION['senha'] = $json[$i]['senha'];
                    $_SESSION['cpf'] = $json[$i]['cpf'];
                    $_SESSION['nome'] = $json[$i]['nome'];
                    $flag = true;
                    header("Location: pedido");
                }
            }
        }
        return $this->validado;
    }

    public function valida_cadastro($cpf, $email)
    {
        $arquivo = 'models/usuarios.model.json'; //modificar para conexão do banco
        if (isset($arquivo)) {

            fopen($arquivo, 'r');
            $json = json_decode(file_get_contents($arquivo), true);
            for ($i = 0; $i < count($json); $i++) {
                if ($_POST['cpf'] !== $json[$i]['cpf'] || $_POST['email'] !== $json[$i]['email']) {
                    $flag = 1;
                } else {
                    $flag = 0;
                    break;
                }
            }
            if ($flag == 0) {
                header("Location: ./cadastroUsuario?msg=usuario_cadastrado");
            } else {
                echo 'Cadastro realizado com sucesso!';
                require("controllers/transforma_json.controller.php"); //modificar para conexão do banco
            }
            return $this->validado;
        }
    }

    public function valida_endereco($cpf, $email)
    {
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
        return $this->validado;
    }
}
