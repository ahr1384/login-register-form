<?php

define('SITE_URL', __DIR__ . DIRECTORY_SEPARATOR);

define('URL_CONTENT', SITE_URL . 'assets' . DIRECTORY_SEPARATOR . 'information' . DIRECTORY_SEPARATOR . 'users.json');



function randomString($length = 16)
{
    $str = "";
    $characters = array_merge(range('A', 'Z'), range('a', 'z'), range('0', '9'), range('@', '-'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}



function checkUser(string $username): bool | int
{
    $jsonContents = file_get_contents(URL_CONTENT);

    $userContents = json_decode($jsonContents, true);

    $searchInUsers = array_search($username, array_column($userContents, "username"));

    // $ii = '';

    // if( $searchInUsers === false){
    //     $ii = 'falseeeee';
    // } else {
    //     $ii = 'trueeeee';
    // }

    return $searchInUsers;
}



function addUser(string $username, $password): string
{

    $userStatus = '';

    $chekUserName = checkUser($username);

    if ($chekUserName === false) {

        $jsonContents = file_get_contents(URL_CONTENT);

        $newContents =
            "{" .
            '"username"'   . ":" . '"' . $username . '"' . "," .
            '"password"'   . ":" . '"' . password_hash($password, PASSWORD_DEFAULT) . '"' . "," .
            '"cookie-value"' . ":" . '"' . randomString() . '"' .
            "}";

        $oldContents = str_replace(['[', ']'], '', $jsonContents);

        file_put_contents(URL_CONTENT, '[' . $oldContents . ',' . $newContents . ']');

        $userStatus = 'user_added';
    } else {
        $userStatus = 'user_not_added';
    }


    return $userStatus;
}



function loginUser(string $username, $password)
{

    $jsonContents = file_get_contents(URL_CONTENT);

    $userContents = json_decode($jsonContents, true);

    $searchInUsers = array_search($username, array_column($userContents, "username"));

    $loginUser = '';

    if ($searchInUsers === false) {
        $loginUser = 'username_not_verified';
    } else {
        $passwordVerify = (password_verify($password, $userContents[$searchInUsers]["password"]));

        if ($passwordVerify === true) {
            $loginUser = 'password_verified';
        } else {
            $loginUser = 'password_not_verified';
        }
    }

    return $loginUser;
}

