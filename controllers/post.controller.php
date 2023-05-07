<?php

class PostController
{

    public function cadastrarLogin()
    {
        require("controllers/validar_login.controller.php");
    }

    public function deslogar()
    {
        session_start();

        if (isset($_SESSION['cpf'])) {
            session_destroy();
            header('Location: /');
        } else {
            echo "Você não está logado";
            header('Location: /login');
        }
    }

    public function cadastrarPedido()
    {
        session_start();

        if (empty($_POST['tamanho']) || empty($_POST['borda']) || empty($_POST['massa']) || empty($_POST['sabores'])) {
            header("Location: pedido?msg=campos");
        } else {
            if ($_SESSION['cpf']) {
                require("transforma_pedido_json.controller.php");
                header("Location: pedido");
            } else {
                header("Location: pedido?msg=login");
            }
        }
    }
}
