<?php

class LoginModel{
    private $db;

    public function __construct()
    {
        $this->db = DBH::getInstance();
    }

    public function getUserByUsername(string $username){
        try{
            $sql = "SELECT * FROM users WHERE username = :username OR email = :username;";
            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            return $e;
        }
    }
}