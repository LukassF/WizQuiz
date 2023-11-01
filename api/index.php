<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once './includes/dbhandler.php';
require_once './includes/interfaces.php';
require_once './signup/signup.php';
require_once './login/login.php';

class Delegator implements DelegatorI {
    private $params;
    public function __construct($params=[])
    {
        $this->params = $params;
    }

    public function createClass(string $request)
    {
        if($request === 'signup'){
            return new Signup($this->params);
        }
        elseif($request === 'login'){
            return new Login($this->params);
        }
    }
}


$request = $_GET['request'];
$method = $_GET['method'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $data = json_decode(file_get_contents("php://input"));

    if(empty($data)){
        echo json_encode([false,'Fields cannot be empty']);
        die();
    }

    $delegator = new Delegator((array) $data->body);
}
elseif($_SERVER['REQUEST_METHOD'] === 'GET'){
    $delegator = new Delegator();
}

$result = $delegator->createClass($request)->execute($method);
echo json_encode($result);