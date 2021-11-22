<?php

class Home extends Controller {

    function index() {

        $data['page_title'] = "Home";
        
        $discussions = $this->loadModel("discussions");
        $res= $discussions->get_all();

        $data['discussions'] = $res;

        $categories = $this->loadModel("categories");
        $result = $categories->get_all();

        $data['categories'] = $result;

        $this->view("home",$data);
    }

} 