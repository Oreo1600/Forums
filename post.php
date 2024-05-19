<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "db");
if (mysqli_errno($con) != 0) {
    $_SESSION["error"] = "Failed to connect: " . mysqli_connect_error();
    header("Location: home.php");
    exit;
}

$query = "INSERT INTO posts (text, author, datetime) values ('".$_POST["post-text"]."', '". $_SESSION["username"] ."',NOW())";
$result = mysqli_query($con, $query);

header("Location: home.php");