<?php

require "vendor/autoload.php";

use Pecee\SimpleRouter\SimpleRouter as Router;

//GET
Router::get('/', 'GetController@viewIndex');

Router::get('/cardapio', 'GetController@viewCardapio');

Router::get('/pedido', 'GetController@viewPedido');

Router::get('/enderecos', 'GetController@viewEnderecos');

Router::get('/login', 'GetController@viewLogin');

Router::get('/finalizar_pedido', 'GetController@viewFinalizarPedido');

Router::get('/meus_pedidos', 'GetController@viewMeusPedidos');

Router::get('/cadastroUsuario', 'GetController@viewCadastroUsuario');


//POST
Router::post('/login', 'PostController@cadastrarLogin');

Router::post('/deslogar', 'PostController@deslogar');

Router::post('/cadastrarPedido', 'PostController@cadastrarPedido');

Router::post('/cadastrarUsuario', 'PostController@cadastrarUsuario');

Router::post('/finalizarPedido', 'PostController@finalizarPedido');

Router::start();
