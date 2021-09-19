<?php

if (isset($_COOKIE['identify'])) {
    header('Location: ../profile');
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == 'GET') {

    @$error = $_GET['error'];
    @$username = $_GET['username'];
}
$file = '';

if (isset($_GET['file'])) {
    http_response_code(500);
    $file = '<div class="text-file"><div><span>Error 500</span> <br/> <br/> <br/> <p>Internal Server Error<br/> <br/> inform to management <br/> <br/> and <a href="../login">click here</a> to refresh the page</p></div></div>';
}


switch ($error) {
    case 1:
        $display_error = 'Please enter your username and password';
        break;

    case 2:
        $display_error = 'Your username is incorrect';
        break;

    case 3:
        $display_error = 'Your password is incorrect';
        break;

    case 4:
        $display_error = 'You are logged out of your profile';
        break;
    case 5:
        $display_error = 'Username already exists';
        break;

    default:
        $display_error = '';
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login & register Page</title>
    <link rel="stylesheet" href="../assets/css/login-style.css">
</head>

<body>
    <a href="login"></a>
    <?php echo $file ?>
    <div class="main">

        <h1 class="sign">login & register</h1>
        <form class="form1" action="../redirect.php" method="post">
            <input class="un" value="<?php echo $username ?>" type="text" name="username" placeholder="Username" required>
            <input class="pass" type="password" name="password" placeholder="Password" required>
            <div class="error-field"><?php echo $display_error ?></div>
            <div class="btn-form">
                <input class="submit" type="submit" name="type" value="login">
                <input class="submit" type="submit" name="type" value="register">
            </div>
        </form>
    </div>
</body>

</html>