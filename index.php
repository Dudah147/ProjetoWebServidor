<?php

require "vendor/autoload.php";

use Pecee\SimpleRouter\SimpleRouter as Router;

//index
Router::get('/', 'GetController@viewIndex');

//cardapio
Router::get('/cardapio', 'GetController@viewCardapio');

//cadastro do pedido
Router::get('/pedido', 'GetController@viewPedido');
Router::post('/cadastrarPedido', 'PostController@cadastrarPedido');

//enderecos
Router::get('/enderecos', 'GetController@viewEnderecos');

//login
Router::get('/login', 'GetController@viewLogin');
Router::post('/login', 'PostController@cadastrarLogin');
Router::post('/deslogar', 'PostController@deslogar');

//finalizar pedido
Router::get('/finalizar_pedido', 'GetController@viewFinalizarPedido');
Router::post('/finalizarPedido', 'PostController@finalizarPedido');

//meus pedudos
Router::get('/meus_pedidos', 'GetController@viewMeusPedidos');

//cadastro de usuario
Router::get('/cadastroUsuario', 'GetController@viewCadastroUsuario');
Router::post('/cadastrarUsuario', 'PostController@cadastrarUsuario');

//cadastro de endereco
Router::get('/cadastroEndereco', 'GetController@viewCadastroEndereco');
Router::post('/cadastrarEndereco', 'PostController@cadastrarEndereco');


Router::start();