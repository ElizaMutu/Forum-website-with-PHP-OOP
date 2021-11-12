<?php

class User {
    
    function login($POST) {
        $DB = new Database();

        $_SESSION['error'] = "";
        if(isset($POST['username']) && isset($POST['password'])) {

            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password'];

            $query = "SELECT * FROM users WHERE username=:username && password=:password limit 1";
            $data = $DB->read($query,$arr);

            if(is_array($data)) {
                //logged in
                $_SESSION['id'] = $data[0]->id;
                $_SESSION['username'] = $data[0]->username;
            } else {
                $_SESSION['error'] = "Wrong username or password!";
            }
        } else {
            $_SESSION['error'] = "Please enter a valid username and password!";
        }
    }

    function register($POST) {
        $DB = new Database();

        $_SESSION['error'] = "";
        if(isset($POST['username']) && isset($POST['password'])) {
            $arr['name'] = $POST['name'];
            $arr['username'] = $POST['username'];
            $arr['email'] = $POST['email'];
            $arr['password'] = $POST['password'];

            $query = "INSERT INTO users (name, username, email, password) VALUES (:name, :username, :email, :password)";
            $data = $DB->write($query,$arr);

            if($data) {
                header("Location:". ROOT ."login");
                die;
            } 
        } else {
            $_SESSION['error'] = "Please enter a valid username and password!";
        }
    }

    function check_logged_in() {
        
    }
}