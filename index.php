<?php

require('functions.php');

if (isset($_COOKIE['identify'])) {
    header('Location: profile');
} else {
    header('Location: login');
}