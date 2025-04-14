<?php

namespace core\http;

require("request.php");

// A factory class for requests
class RequestBuilder{

    public function getRequest(){

        $method = $this->getRequestMethod();
        $url = $_SERVER['REQUEST_URI'];
        $headers = getallheaders();
        $body = file_get_contents("php://input");        
        $postFields = $_POST;
        $params =  $this->getURLParams();

        return new Request($method, $url, $headers, $body, $params, $postFields );

    }

    private function getRequestMethod(){

        $requestMethod = "";

        if(isset($this->getURLParams()[1]))
            $requestMethod = $this->getURLParams()[1];

        switch($requestMethod){
            case 'list': $requestMethod = 'GET';
                break;
            case 'create': $requestMethod = 'POST';
                break;
            case 'update': $requestMethod = 'PUT';
                break;
            case 'delete': $requestMethod = 'DELETE';
                break;
            default:
                $requestMethod =  $_SERVER["REQUEST_METHOD"];
        }

        return $requestMethod;
    }

    // We assume that our url is of the format:
    // [baseurl]/[resource]/[action optional]/id
    // e.g., app/employees/list/1
    // This method will return an array:
    // $params = getURLParams();
    // $params[0] -> resource
    // $params[1] -> action or method
    // $params[2] -> id 

    function getURLParams(){

        // Since we may get a url of the form app/employees/1/ that finishes with a slash we need to use trim
        // to remove the last slash
        // Then we need to use explode to transform the value of $_GET['url'] into an array
    
        return explode("/", trim($_GET["url"], "/") );
    
    }



}
