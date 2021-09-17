<?php

require('functions.php');


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
                header('Location: login/?error=3');
                break;
            case 'password_verified':
                header('Location: profile');
                break;
            case 'password_not_verified':
                header('Location: login/?error=4');
                break;
        }
        break;

    case 'register':
        addUser($username, $password);
        header('Location: profile');
        break;

    default:
        header('Location: login/?error=1');
        break;
}
