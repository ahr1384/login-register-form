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



?>

<body>
    <div class="main">
        <h1 class="sign">login & register</h1>
        <form class="form1" action="../profile/index.php" method="post">
            <input class="un" type="text" name="username" placeholder="Username" required>
            <input class="pass" type="password" name="password" placeholder="Password">
            <div class="btn-form">
                <input class="submit" type="submit" name="type" value="login">
                <input class="submit" type="submit" name="type" value="register">
            </div>
        </form>
    </div>
</body>

</html>