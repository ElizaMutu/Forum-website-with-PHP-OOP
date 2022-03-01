<?php

class User {
    
    function login($POST) {
        $DB = new Database();

        $_SESSION['error'] = "";
        $_SESSION['status'] = "";
        if(isset($POST['username']) && isset($POST['password'])) {

            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password'];

            $query = "SELECT * FROM users WHERE username=:username && password=:password limit 1";
            $data = $DB->read($query,$arr);

            $user = $POST['username'];
            $passFromInput = $POST['password'];
            $hash = $DB->getPasswordFromDb($user);

            $foundpassword = password_verify($passFromInput, $hash);
            if($foundpassword) {
                //if(is_array($data)) {
                    //logged in
                    //$_SESSION['user_url'] = $data[0]->url_address; 
                    $_SESSION['username'] = $user;
                    $_SESSION['password'] = $hash;
                    $_SESSION['status'] = "Hello, " .$_SESSION['username']. "!";
    
                    // echo "TRUE";

                } else {
                    $_SESSION['error'] = "Wrong username or password!";
                    // echo "FALSE";
                    // echo($data);
                }            
            // } else {
            //     $_SESSION['error'] = "Wrong password!";
            // }
        } else {
            $_SESSION['error'] = "Please enter a valid username and password!";
        }
    }

    function register($POST) {
        $DB = new Database();

        $_SESSION['error'] = "";
        $_SESSION['status'] = "";
        if(isset($POST['username']) && isset($POST['email'])) {
            
            $arr['url_address'] = get_random_string_max(60);
            $arr['name'] = $POST['name'];
            $arr['username'] = $POST['username'];
            $arr['email'] = $POST['email'];
            $arr['password'] = $POST['password'];

            if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$arr['password'])) {
                $_SESSION['error'] = "Password must contain at least 8 characters: lowercase and uppercase letters, numbers and special characters(@#-_$%^&+=§!?) ! ! !";
            } else {
                $arr['password'] = hash_password($POST['password']);

                $query = "INSERT INTO users (url_address,name, username, email, password) VALUES (:url_address,:name, :username, :email, :password)";
                $data = $DB->write($query,$arr);
                
                if($data) {
                    $_SESSION['status'] = "You have registered succesfully, ".$arr['username']."!!!";
                    header("Location:". ROOT ."home");
                    die;
                } 
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

    function logout() {
        unset($_SESSION['username']);

        header("Location:". ROOT ."home");
        die;
    }
}