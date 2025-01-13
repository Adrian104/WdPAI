<?php

require 'Routing.php';

$path=trim($_SERVER['REQUEST_URI'], '/');
$path=parse_url($path, PHP_URL_PATH);

Routing::get('','DefaultController');
Routing::get('about','DefaultController');
Routing::get('faq','DefaultController');
Routing::get('feed','DefaultController');
Routing::post('login','SecurityController');
Routing::get('register','DefaultController');
Routing::run($path);