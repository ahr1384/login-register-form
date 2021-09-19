<?php

require('./functions.php');

if (userContents() === NULL) {
    setcookie('identify', '', time() - 43200);
    header('Location: login/?file=file_not_found');
    return;
}

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['type'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $typeLogin = $_POST['type'];
} else {
    header('Location: login/?error=1');
    setcookie('identify', '', time() - 43200);
}



switch ($typeLogin) {
    case 'login':
        switch (loginUser($username, $password)) {
            case 'username_not_verified':
                header('Location: login/?error=2');
                break;
            case 'password_verified':
                setcookie('identify', checkUserInfo($username)[2], time() + 43200, '', '', '', true);
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
                setcookie('identify', checkUserInfo($username)[2], time() + 43200, '', '', '', true);
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
