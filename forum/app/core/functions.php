<?php

function show($stuff) {
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function firstwords($s, $limit=20) {
    return preg_replace('/((\w+\W*){'.($limit-1).'}(\w+))(.*)/', '${1}', $s);   
}

