<?php

namespace database;

class DBConnectionManager{

    private $username;
    private $password; // password to be stored and read through an environment variable
    private $server; 
    private $dbname;

    private $dbConnection;

    function __construct(){

        $this->username = "root"; 
        $this->password = "";
        $this->server = "localhost";
        $this->dbname = "hr";

        try{
        
            $this->dbConnection = new \PDO("mysql:host=$this->server;dbname=$this->dbname", $this->username, $this->password);

        }catch(\PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

    // could be a static function
    function getConnection(){

        return $this->dbConnection;

    }   
    
}