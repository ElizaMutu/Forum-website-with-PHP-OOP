<?php

class Categories {
    
    function  get_all() {
        $DB = new Database();

        $query = "SELECT * FROM categories";

        $data = $DB->read($query);
        if(is_array($data)) {
            return $data;
        }

        return false;
    }
}