<?php

namespace models;

use database\DBConnectionManager;

require_once(dirname(__DIR__)."/core/db/dbconnectionmanager.php");

class User{

    private $id;
    private $username;
    private $password;
    private $enabled2FA;
    private $secret;

    private $dbConnection;

    // Constructor
    public function __construct() {

        $this->dbConnection = (new DBConnectionManager())->getConnection();

    }

    // Getters and setters
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }    

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getenabled2FA() {
        return $this->enabled2FA;
    }

    public function setenabled2FA($enabled2FA) {
        $this->enabled2FA = $enabled2FA;
    }    

    public function getSecret() {
        return $this->secret;
    }

    public function setSecret($secret) {
        $this->secret = $secret;
    }    

    public function getID() {
        return $this->id;
    }

    public function setID($id) {
        $this->id = $id;
    }    

    // CRUD

    // Read single User by ID
    public function readOne() {
        $query = "SELECT * FROM users WHERE id = :userID";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bindParam(':userID', $this->id);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, User::class);
    }

    public function readByUsername() {
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bindParam(':username', $this->username);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, User::class);
    }
}
