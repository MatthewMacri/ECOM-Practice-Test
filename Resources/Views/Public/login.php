<?php

namespace views\public;

use core\http\RequestBuilder;
use core\auth\MembershipProvider;

require_once(dirname(dirname(dirname(__DIR__)))."\\core\\http\\"."requestbuilder.php");
require_once(dirname(dirname(dirname(__DIR__)))."\\core\\auth\\"."membershipprovider.php");

class Login{

    public function render($data){
        
        $usermessage = ""; 

        $requestBuilder = new RequestBuilder();

        $request = $requestBuilder->getRequest();

        $membershipProvider = new MembershipProvider();

        if($request->getMethod() == 'GET'){

            $usermessage = "Please enter your username and password.";

        }else if($request->getMethod() == 'POST'){
            
           if($membershipProvider->login($data['username'], $data['password'])){

                header("HTTP/1.1 302 Found");
                header("location: /app/employees");

           }else{

            $usermessage = "The username and/or password are incorrect.";

           }
        }
        $html= '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <form action="" method="POST">
                <label for="fname">Username:</label><br>
                <input type="text" name="username"><br>
                <label for="password">Password:</label><br>
                <input type="password" name="password" ><br><br>
                <input type="submit" value="Login">
            </form>'.$usermessage.'
        </body>
        </html>';

        echo $html;

    }
}

