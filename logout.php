<?php


if (isset($_COOKIE['user-login'])) {
    setcookie('user-login', '', time() - 86400);
    header('Location: login/?error=4');
} else {
    header('Location: login/?error=1');
}
