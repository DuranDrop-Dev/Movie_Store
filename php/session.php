<?php
if (isset($_COOKIE["user"])) {
    echo '<p class="center">Logged in as: ' . $_COOKIE["user"] . '</class=>';
    echo '<center><form action="" method="post"><input type="submit" value="Log Out" name="logout" style="margin-bottom:20px;"></form></center>';
} else {
    include('php/login.php');
}

if (isset($_POST['logout'])) {
    setcookie("user", "", time() - 3600, "/");
    header('Location: http://localhost:3000/index.php');
}
?>