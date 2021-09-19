<?php


if (isset($_COOKIE['identify'])) {
    setcookie('identify', '', time() - 43200);
    header('Location: login/?error=4');
} else {
    header('Location: login/?error=1');
}

if (isset($_GET['file'])) {
    header('Location: login/?file=file_not_found');
}
