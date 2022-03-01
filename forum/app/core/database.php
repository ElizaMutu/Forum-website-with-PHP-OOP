<?php

class Database {

    public function db_connect() {
        try {
            $string = DB_TYPE .":host=".DB_HOST.";dbname=".DB_NAME.";";
            $db = new PDO($string, DB_USER, DB_PASS);
            return $db;
        } 
        catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function read($query, $data = []) {
        $DB = $this->db_connect();
        $stmt = $DB->prepare($query);
        
        if(count($data) == 0) {
            $stmt = $DB->query($query);
            $check = 0;
            if($stmt) {
                $check = 1;
            }
        } else {
            $check = $stmt->execute($data);
        }

        if($check) {
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            if(is_array($data) && count($data) > 0) {
                return $data;
            }
            return false;
            
        } else {
            return false;
        }
    }

    public function write($query, $data = []) {
        $DB = $this->db_connect();
        $stmt = $DB->prepare($query);
        
        if(count($data) == 0) {
            $stmt = $DB->query($query);
            $check = 0;
            if($stmt) {
                $check = 1;
            }
        } else {
            $check = $stmt->execute($data);
        }

        if($check) {
            return true;
        } else {
            return false;
        }
    }

    public function getPasswordFromDb($username) {
        $DB = $this->db_connect();
        $q = "SELECT password FROM users WHERE username = ?";
        $hash = $DB->prepare($q);
        $hash ->bindParam(1, $username);
        $hash->execute();
        $results = $hash ->fetchAll(PDO::FETCH_OBJ);

        if(isset($results[0])) {
            return $results[0] -> password;
        }
    }

}