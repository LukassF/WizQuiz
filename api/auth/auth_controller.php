<?php

class AuthContr{
    private $token;
    private $model;

    public function __construct($params,AuthModel $model)
    {
        $this->token = $params[0];
        $this->model = $model;
    }

    public function verifyToken(){
        $found_token = $this->model->getTokenByToken($this->token);

        if(!$found_token){
            return false;
        }
        
        $expiry_date = new DateTime($found_token['EXPIRY_DATE']);
        $current_date = new DateTime();

        return $expiry_date > $current_date;
    }
}