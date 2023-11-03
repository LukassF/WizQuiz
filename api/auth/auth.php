<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/website/api/includes/interfaces.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/website/api/auth/auth_controller.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/website/api/auth/auth_model.php';

class Auth implements ExecutableI{
    private $controller;

    public function __construct($params)
    {
        $this->controller = new AuthContr($params,new AuthModel());
    }

    public function execute(string $method)
    {
        if($method === 'checkToken'){
            return $this->controller->verifyToken();
        }   
    }
}