<?php

namespace core\auth;

Use models\User;

require_once(dirname(dirname(__DIR__))."\\Models\\"."user.php");

class MembershipProvider{

    private $user;

    public function __construct(){

        $this->user = new User();

    }


     // Getters and setters
    public function getUser() {
        return $this->user;
    }    

    public function setUser($user) {
        $this->user = $user;
    }    
   

    public function initUserByUsername($username) {

        $this->user->setUsername($username);

        $users = $this->user->readByUsername();

        if(isset($users[0]))
            $this->user = $users[0];

    }

    public function login($username, $password){

        $this->initUserByUsername($username);

        if(password_verify($password, $this->user->getPassword())){
            
            session_start();
            $_SESSION['username'] = $this->user->getUsername();

            return true;

        }else
            return false;

    }

}
