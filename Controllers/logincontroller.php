<?php

namespace controllers;

use views\public\Login;
use core\auth\MembershipProvider;

require(dirname(__DIR__)."/resources/views/public/login.php");
require(dirname(__DIR__)."/core/auth/membershipprovider.php");

class LoginController{

    public function read(){
        
        $data =null;

        (new Login())->render($data);
    
    }    

    public function create($data){

        (new Login())->render($data);
    
    }

    public function checkIfUserIsLogged(){
        $membershipprovider = new MembershipProvider();
        if($membershipprovider->isLogged() == true){
            header("Location: employeelist.php");
            exit;
        } else {
            echo "Error: user is not logged in";
        }
    }
}