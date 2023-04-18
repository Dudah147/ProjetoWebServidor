<?php 

if(isset($_GET['acao'])){
    require('controllers/validar_endereco.controller.php');
}else{
    require("views/cadastrar_endereco.view.php");
}