<?php

class GetController
{

    public function viewIndex()
    {

        session_start();

        require "./views/index.view.php";
    }

    public function viewCardapio()
    {
        session_start();

        require "./controllers/cardapio.controller.php";
    }

    public function viewPedido()
    {
        session_start();
        require "./controllers/pedido.controller.php";
    }

    public function viewEnderecos()
    {
        session_start();
        require "./controllers/enderecos.controller.php";
    }

    public function viewLogin()
    {
        session_start();
        
        require "./controllers/login.controller.php";
    }
}
