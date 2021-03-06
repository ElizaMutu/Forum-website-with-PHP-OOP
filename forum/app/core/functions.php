<?php

function show($stuff) {
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function firstwords($s, $limit=20) {
    return preg_replace('/((\w+[\W|\s]*){'.($limit-1).'}\w+|\W|\s)(?:(.*|\s))/', '${1}', $s);   
}

function get_random_string_max($length) {
    $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
    $text = "";

    $length = rand(4,$length);

    for($i=0;$i<$length;$i++) {
        $random = rand(0,61);
        $text .= $array[$random];
    }
    return $text;
}

function check_message() {
    
    if(isset($_SESSION['status']))  {
        echo "<p class='hello-class'>" .$_SESSION['status']. "</p>";
        unset($_SESSION["status"]);
    }

    else if(isset($_SESSION['error']) && $_SESSION['error'] != "") {
        echo "<p class='error-message'>" .$_SESSION['error']. "</p>";
        unset ($_SESSION['error']);
    }

    if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['status'])) {
        echo "<p class='hello-class'>" .$_SESSION['status']. "</p>";
        unset($_SESSION["status"]);
    } 
}

function hash_password($string) {
    $string = password_hash($string, PASSWORD_DEFAULT);
    return $string;
}