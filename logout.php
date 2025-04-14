<?php

require_once "Resources/Views/Public/logout.php";

use views\public\Logout;

$logout = new Logout();
$logout->logout();