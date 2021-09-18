<?php

define('SITE_URL', __DIR__ . DIRECTORY_SEPARATOR);


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



function addUser(string $username, $password): string
{

    $urlContents = SITE_URL . 'assets' . DIRECTORY_SEPARATOR . 'information' . DIRECTORY_SEPARATOR . 'users.json';

    $jsonContents = file_get_contents($urlContents);

    $randomCokiePass = randomString();

    $newContents =
        "{" .
        '"username"'   . ":" . '"' . $username . '"' . "," .
        '"password"'   . ":" . '"' . password_hash($password,PASSWORD_DEFAULT) . '"' . "," .
        '"cokie-pass"' . ":" . '"' . $randomCokiePass . '"' .
        "}";

    $oldContents = str_replace(['[', ']'], '', $jsonContents);

    file_put_contents($urlContents, '[' . $oldContents . ',' . $newContents . ']');

    return 'user Added';
}



function loginUser(string $username, $password)
{

    $urlContents = SITE_URL . 'assets' . DIRECTORY_SEPARATOR . 'information' . DIRECTORY_SEPARATOR . 'users.json';

    $jsonContents = file_get_contents($urlContents);

    $userContents = json_decode($jsonContents, true);

    $searchInUsers = array_search($username, array_column($userContents, "username"));

    $loginUser = '';

    if ($searchInUsers == false) {
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
