<?php

require_once 'src/controllers/DefaultController.php';

class Routing {
    public static $routes;

    public static function get($url, $controller) {
        self::$routes[$url]=$controller;
    }
    public static function post($url, $controller) {
        self::$routes[$url]=$controller;
    }

    public static function run($url) {
        $action = explode("/",$url)[0];

        if(!array_key_exists($action,self::$routes)) {
            $object = new DefaultController;
            $object->error();
            exit();
        }

        $controller=self::$routes[$action];
        $object = new $controller;
        $action = $action ?: 'index';

        $object->$action();
    }
}