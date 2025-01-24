<?php

require 'Routing.php';
require 'src/controllers/LoginController.php';
require 'src/controllers/RegisterController.php';

$path=trim($_SERVER['REQUEST_URI'], '/');
$path=parse_url($path, PHP_URL_PATH);

Routing::get('','DefaultController');
Routing::get('about','DefaultController');
Routing::get('faq','DefaultController');
Routing::get('feed','DefaultController');
Routing::get('thread', 'DefaultController');
Routing::post('login','LoginController');
Routing::post('register','RegisterController');

Routing::run($path);