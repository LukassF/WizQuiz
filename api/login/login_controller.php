<?php

class LoginContr{
    private $username;
    private $password;
    private $model;

    public function __construct($params,LoginModel $model)
    {
        $this->username = $params['username'];
        $this->password = $params['password'];
        $this->model = $model;
    }

    public function logInUser(){
        $result = $this->model->getUserByUsername($this->username);
        $logs = [];

        if ($this->are_fields_empty()) {
            array_push($logs ,'Fields cannot be empty!');
        }
        if ($this->is_username_wrong($result)) {
            array_push($logs, 'No username found!');
        }
        if ($this->is_password_wrong($result)) {
            array_push($logs, 'Password is incorrect!');
        } 
        elseif(!$this->are_fields_empty() && !$this->is_username_wrong($result) && !$this->is_password_wrong($result)) {
            array_push($logs, 'Login successfull!');
        }

        if (!empty($logs) && !in_array('Login successfull!',$logs)) {
            return ['status'=>false,'logs'=>$logs];
        }

        unset($result['PASSWORD']);

        $output_object = ['status'=>true,'logs'=>$logs,'user'=>$result];

        $token = $this->generateToken($result['ID']);
        if (!$token[0]) {
            $output_object['status'] = false;
            $output_object['logs'] = ['Token not generated. Try again!'];
            unset($output_object['user']);

        } else {
            $output_object['token'] = $token;
        }
        return $output_object;
    }


    private function generateToken(int $user_id){
            
        $token_bin = random_bytes(30);
        $token = bin2hex($token_bin);

        if($this->isTokenInDb($user_id)){
            $deletion = $this->model->deleteToken($user_id);
            if($deletion != true){
                return [false,$deletion];
            }
        }

        $token_insertion = $this->model->insertToken($token,$user_id);
        if($token_insertion === true){
            return [$token_insertion,$token];
        }

        return [false,$token_insertion];
    }

    private function is_password_wrong($result) {

        if (!$result || password_verify($this->password, $result['PASSWORD'])) {
            return false;
        } else {
            return true;
        }
    }

    private function is_username_wrong(bool|array $result){
        if (!$result) {
            return true;
        } else {
            return false;
        }
    }

    private function are_fields_empty(){
        if (empty($this->username) || empty($this->password)) {
            return true;
        } else {
            return false;
        }
    }

    private function isTokenInDb(int $user_id){
        $result = $this->model->getTokenByUserId($user_id);
        if($result){
            return true;
        }

        return false;
    }
}