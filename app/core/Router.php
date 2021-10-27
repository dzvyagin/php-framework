<?php

namespace application\core;

class Router {
    
    private $routes = [];
    private $params = [];

    public function __construct() {
        $arr = require 'app/config/routes.php';
        foreach ($arr as $key => $value) {
            $this->add($key, $params);
        }
    }

    public function add($route, $params) {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    public function match() {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run() {
        if ($this->match()) {
            $controller = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller.php';
            if (class_exists($controller)) {

            } else {
                echo $controller.' - класс не найдет';
            }
        } else {
            echo "Маршрут не найден";
        }
    }
}