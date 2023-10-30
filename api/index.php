<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once './includes/dbhandler.php';
require_once './includes/interfaces.php';
require_once './signup/signup.php';

class Delegator implements DelegatorI {
    private $params;
    public function __construct($params)
    {
        $this->params = $params;
    }

    public function createClass(string $request)
    {
        if($request === 'signup'){
            return new Signup($this->params);
        }
    }
}

$params = ['username'=>'Mark','email'=>'mark@email.com',"password"=>"abcdef"];
$delegator = new Delegator($params);
$result = $delegator->createClass('signup')->execute('insertUser');
var_dump($result);