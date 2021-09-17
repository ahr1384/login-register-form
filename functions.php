<?php

define('SITE_URL', __DIR__ .DIRECTORY_SEPARATOR);


function randomString($length = 18)
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
    
    $urlContents = SITE_URL . 'assets'.DIRECTORY_SEPARATOR.'information'.DIRECTORY_SEPARATOR.'users.json';

    $jsonContents = file_get_contents($urlContents);

    $newContents =
        "{" .
        '"username"'   . ":" . '"' . $username      . '"' . "," .
        '"password"'   . ":" . '"' . password_hash($password, null, []) . '"' . "," .
        '"cokie-pass"' . ":" . '"' . password_hash(randomString(), null, []) . '"' .
        "}";

    $oldContents = str_replace(['[', ']'], '', $jsonContents);

    file_put_contents($urlContents, '[' . $oldContents . ',' . $newContents . ']');

    return 'user Added';
};
