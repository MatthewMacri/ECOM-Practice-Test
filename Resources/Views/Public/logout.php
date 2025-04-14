<?php

namespace views\public;

use core\http\RequestBuilder;
use core\auth\MembershipProvider;

require_once(dirname(dirname(dirname(__DIR__))) . "/core/http/requestbuilder.php");
require_once(dirname(dirname(dirname(__DIR__))) . "/core/auth/membershipprovider.php");

class Logout {
    public function logout() {
        session_start();
        $_SESSION = [];
    
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
    
        session_destroy();
    
        header('Location: ../index.html');
        exit;
    }
    
}
