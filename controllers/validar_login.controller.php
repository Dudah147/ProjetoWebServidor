<?php
function validar_sessao()
{
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $arquivo = "models/usuarios.model.json";

    session_start();

    $flag = null;

    if (isset($arquivo)) {
        fopen($arquivo, 'r');
        $json = json_decode(file_get_contents($arquivo), true);
        for ($i = 0; $i < count($json); $i++) {
            if ($email == $json[$i]['email'] && $senha == $json[$i]['senha']) {
                $_SESSION['logado'] = true;
                $_SESSION['senha'] = $json[$i]['senha'];
                $_SESSION['cpf'] = $json[$i]['cpf'];
                $_SESSION['nome'] = $json[$i]['nome'];
                $flag = true;
                header("Location: pedido");
            }
        }
        if ($flag == null) {
            header("Location: login?error-login=notfound");
        }
    } else {
        require('controller/transformar_json.controller.php');
    }
}
validar_sessao();
