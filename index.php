<?php

// require('functions.php');

if (isset($_COOKIE['user-login'])) {
    header('Location: profile');
} else {
    header('Location: login/?error=1');
}
