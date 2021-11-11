<?php

class Categories {
    
    function  get_all() {
        $query = "SELECT * FROM categories";

        $DB = new Database();
        $data = $DB->read($query);
        if(is_array($data)) {
            return $data;
        }

        return false;
    }
}