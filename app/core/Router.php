<?php

namespace application\core;

class Router {
    
    private $routes = [];
    private $params = [];

    public function __construct() {
        $arr = require 'app/config/routes.php';
        var_dump($arr);
    }

    public function add() {

    }

    public function match() {

    }

    public function run() {

    }
}