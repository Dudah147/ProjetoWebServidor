<?php

require "vendor/autoload.php";

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::get('ProjetoWebServidor/', 'GetController@viewIndex');
Router::get('ProjetoWebServidor/cardapio', 'GetController@viewCardapio');


Router::start();
