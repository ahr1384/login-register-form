<?php

require('./functions.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $typeLogin = $_POST['type'];
} else {
    header('Location: login/?error=1');
}


switch ($typeLogin) {
    case 'login':
        switch (loginUser($username, $password)) {
            case 'username_not_verified':
                header('Location: login/?error=2');
                break;
            case 'password_verified':
                setcookie('user-login', $username);
                setcookie('user-login', $username, time() + 86400);
                header('Location: profile');
                break;
            case 'password_not_verified':
                header('Location: login/?error=3&username=' . $username);
                break;
        }
        break;

    case 'register':
        switch (addUser($username, $password)) {
            case 'user_added':
                addUser($username, $password);
                setcookie('user-login', $username);
                setcookie('user-login', $username, time() + 86400);
                header('Location: profile');
                break;

            case 'user_not_added':
                header('Location: login/?error=5');
                break;

            default:
                header('Location: login/?error=1');
                break;
        }
        break;

    default:
        header('Location: login/?error=1');
        break;
}
