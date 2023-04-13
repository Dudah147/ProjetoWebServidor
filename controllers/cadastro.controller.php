<?php 

$acao = $_GET['acao'] ?? 'variavel';

if($acao == 'cadastro'){
    require('controllers/validar_cadastro.controller.php');

}else{
    require("views/cadastro.view.php");
}