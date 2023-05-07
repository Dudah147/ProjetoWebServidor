<?php

require "vendor/autoload.php";

use Pecee\SimpleRouter\SimpleRouter as Router;


Router::get('/', 'GetController@viewIndex');

Router::get('/cardapio', 'GetController@viewCardapio');

Router::get('/pedido', 'GetController@viewPedido');

Router::get('/enderecos', 'GetController@viewEnderecos');

Router::get('/login', 'GetController@viewLogin');


//POST
Router::post('/login', 'PostController@cadastrarLogin');

Router::start();
