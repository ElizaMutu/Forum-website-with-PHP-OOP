<?php

class Discussions {
    
    function  get_all() {
        $DB = new Database();

        $query = "SELECT * FROM discussions";

        $data = $DB->read($query);
        if(is_array($data)) {
            return $data;
        }

        return false;
    }
}