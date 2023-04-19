<?php 
   
      if(!isset($_SESSION['cpf'])){
       header("Location: login.php?error=true");
       exit;
   }else require("views/finalizar_pedido.view.php");

