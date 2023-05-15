<?php
$flag1 = null;
$arquivo = 'models/enderecos.model.json';

if (file_exists($arquivo)) {

    fopen($arquivo, 'r');
    $json = json_decode(file_get_contents($arquivo), true);
    for ($i = 0; $i < count($json); $i++) {
        if (($_POST['numero'] !== $json[$i]['numero']) || ($_POST['numero'] == $json[$i]['numero'] && $_POST['cep'] !== $json[$i]['cep'])) {
            $flag1 = 1;
        } else if ($_POST['numero'] == $json[$i]['numero'] && $_POST['cep'] == $json[$i]['cep'] && $_SESSION['cpf'] !== $json[$i]['cpf']) {
            $flag1 = 1;
        } else {
            $flag1 = 0;
            break;
        }
    }
    if ($flag1 == 0) {
        header("Location: cadastroEndereco?msg=ja_cadastrado");
    } else {
        require("controllers/transforma_endereco_json.controller.php");
    }
} else {
    require("controllers/transforma_endereco_json.controller.php");
}
