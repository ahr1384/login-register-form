<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login & register Page</title>
    <link rel="stylesheet" href="../assets/css/login-style.css">
</head>

<?php

$error = '';

if ($_SERVER["REQUEST_METHOD"] == 'GET') {

    @$error = $_GET['error'];
}


switch ($error) {
    case 1:
        $display_error = 'Please enter your username and password';
        break;

    case 2:
        $display_error = 'Please enter username and password';
        break;

    case 3:
        $display_error = 'Your username is incorrect';
        break;

    case 4:
        $display_error = 'Your password is incorrect';
        break;

    default:
        $display_error = '';
}

?>

<body>
    <div class="main">
        <h1 class="sign">login & register</h1>
        <form class="form1" action="../redirect.php" method="post">
            <input class="un" type="text" name="username" placeholder="Username" required>
            <input class="pass" type="password" name="password" placeholder="Password" required>
            <div class="error"><?php echo $display_error ?></div>
            <div class="btn-form">
                <input class="submit" type="submit" name="type" value="login">
                <input class="submit" type="submit" name="type" value="register">
            </div>
        </form>
    </div>
</body>

</html>