<?php 

if(isset($_GET['acao'])){
    require('controllers/validar_cadastro.controller.php');
}else{
    require("views/cadastro.view.php");
}