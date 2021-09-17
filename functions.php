<?php



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



function addUser(string $username, $password): bool
{

    $urlContents = 'http://localhost/php/php-projects/login&register-form/assets/information/users.json';

    $jsonContents = file_get_contents($urlContents);

    $newContents =
        "{" .
        '"username"'   . ":" . '"' . $username      . '"' . "," .
        '"password"'   . ":" . '"' . password_hash($password, null, []) . '"' . "," .
        '"cokie-pass"' . ":" . '"' . password_hash(randomString(), null, []) . '"' .
        "}";

    $oldContents = str_replace(['[', ']'], '', $jsonContents);

    file_put_contents($urlContents, '[' . $oldContents . ',' . $newContents . ']');

    return true;
};
