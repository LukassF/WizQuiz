<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/website/api/includes/interfaces.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/website/api/login/login_controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/website/api/login/login_model.php';

class Login implements ExecutableI{
    private $controller;
    public function __construct($params)
    {
        $this->controller = new LoginContr($params, new LoginModel());
    }
    public function execute(string $method)
    {
        if($method === 'logInUser'){
            return $this->controller->logInUser();  
        }
    }
}