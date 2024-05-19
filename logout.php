<?php
session_start();
setcookie("username", "", time() - 60);
session_destroy();
header("Location: login.php");