<?php


define('URL_CONTENT', __DIR__ . '/assets/information/users.json');


function userContents()
{
    @$jsonContents = file_get_contents(URL_CONTENT);

    $userContents = json_decode($jsonContents, true);

    return $userContents;
}



function randomString($length = 38)
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

    $userContents = userContents();

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

    $userContents = userContents();

    $searchInUsers = array_search($username, array_column($userContents, "username"));

    $loginUser = '';

    if ($searchInUsers === false) {
        $loginUser = 'username_not_verified';
        return $loginUser;
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



function checkUserInfo(string $un): bool | array
{
    $unchek = checkUser($un);

    $userStatus = '';

    if ($unchek === false) {
        $userStatus = false;
        return $userStatus;
    }

    $userContents = userContents();

    $username = $userContents[$unchek]["username"];
    $password = $userContents[$unchek]["password"];
    $cookieValue = $userContents[$unchek]["cookie-value"];

    $userStatus = [$username, $password, $cookieValue];

    return $userStatus;
}



function checkUserCookieValue(string $cv): string
{
    $userContents = userContents();

    $searchInUsers = array_search($cv, array_column($userContents, "cookie-value"));

    if ($searchInUsers === false) {
        setcookie('identify', '', time() - 43200);
        header('Location: ./login');
        return "";
    }

    return $searchInUsers;
}
