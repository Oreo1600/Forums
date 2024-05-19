<?php
session_start();
if (isset($_POST["signup"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    if ($password != $cpassword) {
        $_SESSION["error"] = "Passwords don't match";
        header("Location: signup.php");
        exit;
    }

    $con = mysqli_connect("localhost", "root", "", "db");
    if (mysqli_errno($con) != 0) {
        $_SESSION["error"] = "Failed to connect: " . mysqli_connect_error();
        header("Location: signup.php");
        exit;
    }

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION["error"] = "Username already exists.";
        header("Location: signup.php");
        exit;
    }

    $query = "INSERT INTO users VALUES ('$username', md5('$password'))";
    $result = mysqli_query($con, $query);
    if (mysqli_errno($con) != 0) {
        $_SESSION["error"] = "Error: " . mysqli_connect_error();
        header("Location: signup.php");
        exit;
    }
    header("Location: login.php");
}