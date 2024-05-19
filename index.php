<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "db");
if (mysqli_errno($con) != 0) {
    $_SESSION["error"] = "Failed to connect: " . mysqli_connect_error();
    header("Location: login.php");
    exit;
}

// when loggin in from login.html
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = md5('$password')";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 0) {
        $_SESSION["error"] = "Username or password incorrect.";
        header("Location: login.php");
        exit;
    }

    $_SESSION["username"] = $username;
    
    if (isset($_POST["remember-me"])) {
        setcookie("username", $username, time() + 36000);
    }
}
// checking cookie
if (isset($_COOKIE["username"])) {
    $username = $_COOKIE["username"];
    $_SESSION["username"] = $username;
}
// checking for session
if (isset($_SESSION["username"])) {
    header("Location: home.php");
} else { // redirect to login if no session
    header("Location: login.php");
}