<?php

class Home extends Controller {

    function index() {

        $data['page_title'] = "Home";
        
        $categories = $this->loadModel("categories");
        $result = $categories->get_all();

        $data['categories'] = $result;

        $this->view("home",$data);
    }

} 