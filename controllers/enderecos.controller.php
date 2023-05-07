<?php
if (isset($_SESSION['cpf'])) {
    $session = true;
    $arquivo = "models/enderecos.model.json";
    $enderecos = json_decode(file_get_contents($arquivo), true);

    $enderecos_usuario = [];
    $flag = false;
    foreach ($enderecos as $e) {
        if ($e['cpf'] == $_SESSION['cpf']) {
            $enderecos_usuario[] = $e;
            $flag = true;
        }
    }
    require("views/enderecos.view.php");
} else {
    $session = false;
    require("views/enderecos.view.php");
}
