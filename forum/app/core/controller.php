<?php

class Controller {

    protected function view($view, $data = []) {

        if(file_exists("../app/views/". $view .".php")) {
            
            include "../app/views/". $view .".php";
        } else {
            include "../app/views/404.php";
        }
    }

    protected function loadModel($model, $data = []) {

        if(file_exists("../app/models/". $model .".php")) {
            
            include_once "../app/models/". $model .".php";
            return $model = new $model();
        } 
        return false;
    }
}