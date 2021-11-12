<?php

class Register extends Controller {

    function index() {

        $data['page_title'] = "Register";

        if(isset($_POST['email'])) {
            $user = $this->loadModel("user");
            $user->register($_POST);
        } 
        elseif(isset($_POST['username']) && !(isset($_POST['email']))) {
            $user = $this->loadModel("user");
            $user->login($_POST);
        }
        
        $this->view("register",$data);

    }
}