<?php

class SignupModel {
    private $db;

    public function __construct()
    {
        $this->db = DBH::getInstance();
    }
    public function insertUserDB(string $username, string $email, string $password){
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO users (username,password,email) VALUES (:username,:password,:email);";
            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $hashedPassword);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){
            return $e;
        }
    }

    public function getEmail(string $email)
    {
        try{
            $sql = "SELECT username FROM users WHERE email = :email;";
            $stmt = $this->db->connect()->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            return $e;
        }
    }

    public function getUsername(string $username)
    {

        try{
            $sql = "SELECT username FROM users WHERE username = :username;";
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