<?php
session_start();
$err = "";
if (isset($_SESSION["error"])) {
    $err = $_SESSION["error"];
    unset($_SESSION["error"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <header>
            <h3>Sign up</h3>
        </header>
        <main>
            <form action="register.php" method="post">
                <P>Username: <input name="username" type="text" required> </p>
                <p>Password: <input name="password" type="password" required></p>
                <p>Confirm Password: <input name="cpassword" type="password" required></p>
                <p><input type="submit" name="signup" value="Sign up"></p>
            </form>
            <p style="color: red"><?php echo $err ?></p>
        </main>
    </div>
</body>
</html>