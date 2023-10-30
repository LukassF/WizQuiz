<?php

class SignupContr {
    private $username;
    private $email;
    private $password;
    private $model;

    public function __construct($params, $model)
    {
        $this->username = $params['username'];
        $this->email = $params['email'];
        $this->password = $params['password'];
        $this->model = $model;
    }

    public function insertUser(){
        $log = '';
        if ($this->are_fields_empty()) {
            $log = "Fields can't be empty!";
        }
         elseif ($this->email_invalid()) {
            $log = "Email is invalid or taken!";
        } elseif ($this->username_taken()) {
            $log = "Username is taken!";
        } 
        else {
            $log = 'Signup successfull!';
        }

        if (!empty($log) && $log !== 'Signup successfull!') {
            return $log;
        }

        return [$this->model->insertUserDB(
            $this->username ,
            $this->email,
            $this->password
        ), $log];
    }


    private function are_fields_empty()
    {
        if (empty($this->username) || empty($this->email) || empty($this->password)) {
            return true;
        } else {
            return false;
        }
    }

    private function email_invalid()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL) || $this->model->getEmail($this->email)) {
            return true;
        } else {
            return false;
        }
    }

    private function username_taken()
    {
        if ($this->model->getUsername($this->username)) {
            return true;
        } else {
            return false;
        }
    }
}