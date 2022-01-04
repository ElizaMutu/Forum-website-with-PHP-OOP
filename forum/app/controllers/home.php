<?php

class Home extends Controller {

    function index() {

        $data['page_title'] = "Home";
        
        $discussions = $this->loadModel("discussions");
        $res = $discussions->get_all();

        $data['discussions'] = $res;

        $categories = $this->loadModel("categories");
        $result = $categories->get_all();

        $data['categories'] = $result;

        if(isset($_POST['password'])) {
            $user = $this->loadModel("user");
            $user->register($_POST);
        } 
        elseif(isset($_POST['username']) && !(isset($_POST['email']))) {
            $user = $this->loadModel("user");
            $user->login($_POST);
        }

        if(isset($_POST['email'])) {
            $user = $this->loadModel("user");
            $user->register($_POST);
        } 
        elseif(isset($_POST['username']) && !(isset($_POST['email']))) {
            $user = $this->loadModel("user");
            $user->login($_POST);
        }
        
        $this->view("home",$data);
    }

} 