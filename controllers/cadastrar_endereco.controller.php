<?php 

$acao = $_GET['acao'] ?? 'variavel';

$cep = $_POST['cep'] ?? '';

echo "$cep";

if ($acao == 'cadastrar'){
    require('controllers/validar_endereco.controller.php');
} else {
    
    require("views/cadastrar_endereco.view.php");
}