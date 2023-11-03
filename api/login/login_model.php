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

    public function getTokenByUserId(int $user_id){
        try{
            $sql = "SELECT * FROM sessions as s WHERE s.user_id = :user_id";
            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(":user_id", $user_id);
            $stmt->execute();
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            return false;
        }
    }

    public function deleteToken(int $user_id){
        try{
            $sql = "DELETE FROM sessions WHERE sessions.user_id = :user_id;";
            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(":user_id", $user_id);
            $stmt->execute();

            return true;
        }
        catch(PDOException $e){
            return $e;
        }
    }

    public function insertToken(string $token,int $user_id){

        // setting token validty period for one hour
        $timestamp = time() + 60*60;
        $expiry_date = date('Y-m-d H:i:s',$timestamp);

        try {
            $sql = "INSERT INTO sessions (token,user_id,expiry_date) VALUES (:token,:user_id,:expiry_date);";
            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(":token", $token);
            $stmt->bindParam(":user_id", $user_id);
            $stmt->bindParam(":expiry_date", $expiry_date);
            $stmt->execute();

            return true;
        }
        catch(PDOException $e){
            return $e;
        }
    }
}