<?php

namespace core\http;

// Immutable
// as an option since the request represents external data that we don't need to change in our application
// we can make its objects as immutable:
// 1- Set the properties as private
// 2- only set the properties using the contructor
// 3- don't create setters 
// this way once the object is created the values cannot be changed
// this is also useful in multithreading applications to guarantee that the same data
// is used by all threads and it doesn't get changed in one of the threads.

class Request{

    private $method;
    private $url;
    private $headers;
    private $body;
    private $params;
    private $postFields;

    function __construct($method, $url, $headers, $body, $params, $postFields){

        $this->method = $method;
        $this->url = $url;
        $this->headers = $headers;
        $this->body = $body;
        $this->params = $params;
        $this->postFields = $postFields;
    }

    // NO setters

    // Getters
    public function getMethod(){
        return $this->method;
    }
    public function getURL(){
        return $this->url;
    }
    public function getHeaders(){
        return $this->headers;
    }
    public function getBody(){
        return $this->body;
    }
    public function getParams(){
        return $this->params;
    }
    public function getpostFields(){
        return $this->postFields;
    }
}