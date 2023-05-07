<?php

if (isset($_SESSION['cpf'], $_SESSION['senha'])) {
    $logado = true;
} else {
    $logado = false;
}

require("views/login.view.php");
