<?php
require_once __DIR__ . '/../models/User.php';

use models\User;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $enabled2FA = isset($_POST['enable2FA']) ? true : false;

    if (!$email || empty($username) || empty($password)) {
        $error = "Please fill in all required fields.";
        include __DIR__ . '/../views/register.php';
        exit;
    }

    // Create a new User instance with the 2FA flag.
    $user = new User($email, $username, $password, $enabled2FA);

    if ($user->save()) {
        header("Location: ../views/success.php");
        exit;
    } else {
        $error = "Error saving user. Please try again.";
        include __DIR__ . '/../views/register.php';
        exit;
    }
} else {
    include __DIR__ . '/../views/register.php';
}