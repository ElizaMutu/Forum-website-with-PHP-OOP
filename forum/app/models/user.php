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
                $_SESSION['username'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->url_address;

                header("Location:". ROOT ."home");
                die;
            } 
            else {
                $_SESSION['error'] = "Wrong username or password!";
            }
        } else {
            $_SESSION['error'] = "Please enter a valid username and password!";
        }
    }

    function register($POST) {
        $DB = new Database();

        $_SESSION['error'] = "";
        if(isset($POST['username']) && isset($POST['email'])) {
            $arr['url_address'] = get_random_string_max(60);
            $arr['name'] = $POST['name'];
            $arr['username'] = $POST['username'];
            $arr['email'] = $POST['email'];
            $arr['password'] = hash_password($POST['password']);
            
            $query = "INSERT INTO users (url_address,name, username, email, password) VALUES (:url_address,:name, :username, :email, :password)";
            $data = $DB->write($query,$arr);

            if($data) {
                header("Location:". ROOT ."home");
                die;
            } 
        } else {
            $_SESSION['error'] = "Please enter a valid username and password!";
        }
    }

    function check_logged_in() {
        $DB = new Database();

        if(isset($_SESSION['user_url'])) {

            $arr['user_url'] = $_SESSION['user_url'];

            $query = "SELECT * FROM users WHERE url_address=:user_url limit 1";
            $data = $DB->read($query,$arr);

            if(is_array($data)) {
                //logged in
                $_SESSION['id'] = $data[0]->id;
                $_SESSION['username'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->url_address;

                return true;
            }
        }
        return false;
    }
}