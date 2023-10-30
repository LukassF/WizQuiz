<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/website/api/includes/interfaces.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/website/api/signup/signup_controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/website/api/signup/signup_model.php';

class Signup implements ExecutableI{
    private $controller;
    public function __construct($params)
    {
        $this->controller = new SignupContr($params, new SignupModel());
    }

    public function execute(string $method){
        if($method === 'insertUser'){
            return $this->controller->insertUser();
        }
    }
}