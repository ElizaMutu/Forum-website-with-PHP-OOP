<?php

class Home extends Controller {

    function index() {

        $data['page_title'] = "Home";
        // show($DB->read(""));
        $this->view("home",$data);
    }

} 