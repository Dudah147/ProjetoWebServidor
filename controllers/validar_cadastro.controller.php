<?php
    /* $flag = null;

    $arquivo = 'models/usuarios.model.json'; //modificar para conexão do banco
    if(isset($arquivo)){    
        
        fopen($arquivo, 'r');   
        $json = json_decode(file_get_contents($arquivo), true);
        for ($i=0; $i < count($json); $i++) {
            if($_POST['cpf']!==$json[$i]['cpf'] || $_POST['email']!==$json[$i]['email']){
                $flag = 1;
            }else{
                $flag = 0;
                break;
            }
        }
        if($flag==0){
            header("Location: ./cadastroUsuario?msg=usuario_cadastrado");
        }else{
            echo 'Cadastro realizado com sucesso!';
            require("controllers/transforma_json.controller.php"); //modificar para conexão do banco
        }
        
    } */

$bd = new ManipulacaoBanco();

$array = $bd->selecionarDados("usuarios", "email_usuario = '{$_POST['email']}' and nome_usuario = '{$_POST['nome']}' and cpf_usuario = '{$_POST['cpf']}' ");
print_r($array);

if (empty($array)) {
     $bd->insereDados([
        'cpf_usuario' => $_POST['cpf'],
        'nome_usuario' => $_POST['nome'],
        'senha_usuario' => $_POST['senha'],
        'email_usuario' => $_POST['email'],
        'nasc_usuario' => $_POST['nascimento']
    ], "usuarios"); 
    header("Location: enderecos?msg=usuario_cadastrado");
} else {
    header("Location: cadastroUsuario?msg=ja_cadastrado");
}
