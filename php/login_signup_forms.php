<!-- SESSION CHECK -->
<?php include('php/session.php'); ?>

<!-- LOGIN FORM -->
<details class="noStyle">
    <summary>Log In</summary><br>
    <form id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email_log">Email:</label><br>
        <input type="email" name="email_log" id="email_log" autocomplete="off"><br><br>
        <label for="password_log">Password:</label><br>
        <input type="password" name="password_log" id="password_log" autocomplete="off"><br><br>
        <input type="submit" value="Log In" name="login">
    </form>
</details>