<?php
$tamanhos = [
    ['tamanho' => "Pequena", 'info' => "4 Fatias - 25 cm (1 adulto)", 'quantSabor' => 1, 'preco' => 34.90],
    ['tamanho' => "Grande",'info' => "8 Fatias - 35 cm (2 adultos + 1 criança)", 'quantSabor' => 2, 'preco'=> 57.90],
    ['tamanho' => "Gigante",'info' => "12 Fatias - 45 cm (3 adultos)", 'quantSabor' => 3, 'preco'=> 70.90]
];

$massa = [
    ['massa' => "Fina",'info' =>"Massa mais fina e crocante", 'preco' => 0],
    ['massa' => "Tradicional",'info' =>"Tradicional",'preco' => 0],
    ['massa' => "Pan",'info' =>"Massa aerada com flocos de manteiga", 'preco' => 10.00]
];

$bordas = [
    ['borda' => "Sem borda recheada",'preco' => 0],
    ['borda' => "Cheddar",'preco' => 5.00],
    ['borda' => "Requeijão",'preco' => 5.00],
    ['borda' => "Cream cheese",'preco' => 8.00],
    ['borda' => "Chocolate Preto",'preco' => 5.00],
    ['borda' => "Chocolate Branco",'preco' => 5.00]
];

$sabores = [
    ['sabor' => "Alho e óleo",'info' => "Muçarela, alho e óleo", 'tipo' => "Tradicional", 'preco' => 0, 'img' => "img/pizza.jpg"],
    ['sabor' => "Caipira",'info' => "Muçarela, frango desfiado e milho", 'tipo' => "Tradicional", 'preco' => 0, 'img' => "img/pizza.jpg"],
    ['sabor' => "Calabresa",'info' => "Muçarela e calabresa", 'tipo' => "Tradicional", 'preco' => 0, 'img' => "img/pizza.jpg"],
    ['sabor' => "Frango com catupiry",'info' => "Muçarela, frago e catupiry", 'tipo' => "Especial", 'preco' => 5, 'img' => "img/pizza.jpg"],
    ['sabor' => "Strogonoff de frango",'info' => "Muçarela, strogonoff e batata palha", 'tipo' => "Especial", 'preco' => 5, 'img' => "img/pizza.jpg"],
    ['sabor' => "Camarão",'info' => "Muçarela e camarão", 'tipo' => "Premium", 'preco' => 15, 'img' => "img/pizza.jpg"],
    ['sabor' => "Mignon crispy",'info' => "Muçarela, filé mignon e cebola crispy", 'tipo' => "Premium", 'preco' => 15, 'img' => "img/pizza.jpg"]
];

echo json_encode(['massa' => $massa, 'tamanhos' => $tamanhos, 'bordas' => $bordas,'sabores' => $sabores]);