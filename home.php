<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
} else {
    header("Location: login.php");
    exit;
}
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
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Logged in as <?php echo $username; ?></h1>
        <form action="logout.php" method="post">
            <input type="submit" name="logout" value="Logout">
        </form>
    </header>
    <main>
        <div class="new-post">
            <form action="post.php" method="post">
                <textarea name="post-text" cols="30" rows="10" required></textarea>
                <div class="post-btn">
                    <input type="submit" name="post" value="Post">
                </div>
            </form>
        </div>
        <p style="color: red"><?php echo $err ?></p>
        <div class="posts">
            <h3>Posts</h3>
            <?php
            $con = mysqli_connect("localhost", "root", "", "db");
            if (mysqli_errno($con) != 0) {
                $_SESSION["error"] = "Failed to connect: " . mysqli_connect_error();
                header("Location: home.php");
                exit;
            }

            $query = "SELECT * FROM posts ORDER BY datetime DESC";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo "<div class='post'>";
                echo "<div>". $row["text"] ."</div>";
                echo "<div>Post by ". $row["author"] ."</div>";
                echo "<div>". $row["datetime"] ."</div>";
                echo "</div>";
            }
            ?>
        </div>
    </main>
</body>
</html>