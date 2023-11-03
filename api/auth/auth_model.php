<?php

class AuthModel{
    private $db;

    public function __construct()
    {
        $this->db = DBH::getInstance();
    }

    public function getTokenByToken(string $token){
        try{
            $sql = "SELECT * FROM sessions as s WHERE s.token = :token";
            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(":token", $token);
            $stmt->execute();
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            return false;
        }
    }
}