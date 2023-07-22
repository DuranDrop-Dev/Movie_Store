<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    if (isset($_POST['email_log']) && isset($_POST['password_log'])) {
        $userInput = $mysqli->real_escape_string($_POST['email_log']);
        $passInput = $mysqli->real_escape_string($_POST['password_log']);

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $query = "SELECT email, password FROM customer;";
        $result = mysqli_query($mysqli, $query);
        $resultCheck = mysqli_num_rows($result);

        $found_email = false;
        $found_pass = false;

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($userInput == $row['email'] && $passInput == $row['password']) {
                    $found_email = true;
                    $found_pass = true;
                    setcookie("user", $row['email'], time() + 3600);
                }
            }
        }

        $mysqli->close();

        if ($found_email && $found_pass == true) {
            header('Location: http://localhost:3000/index.php');
        } else {
            echo '<p class="center">Email/Password is incorrect<?p>';
        }
    }
}

?>