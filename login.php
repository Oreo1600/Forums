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
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="container">
        <header>
            <h3>Login</h3>
        </header>
        <main>
            <form action="index.php" method="post">
                <P>
                    <label for="username">Username:</label>  
                    <input name="username" type="text" required> </p>
                <p>
                    <label for="password">Password:</label> 
                    <input name="password" type="password" required></p>
                <p><input name="remember-me" type="checkbox"> Remember me</p>
                <p> <input type="submit" name="login" value="Login"></p>
            </form>
            <p style="color: red"><?php echo $err ?></p>
            <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
        </main>
    </div>
</body>

</html>