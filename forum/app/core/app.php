<?php

class App {
    
    private $controller = "home";
    private $method  = "index";
    private $params = [];
    public function __construct() {

        $url = $this->splitURL();
        show($url);
    }

    private function splitURL() {

        return explode("/", trim($_GET['url'], "/"));
    }
}