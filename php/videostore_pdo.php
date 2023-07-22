<?php
try {
    // SERVER VARIABLES
    $server = "localhost:3306";
    $user = "root";
    $pass = '';
    $db = "videostoremodel";

    // CONNECT
    $mysqli = mysqli_connect($server, $user, $pass, $db);

} catch (Exception $e) {
    // CHECK CONNECTION
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    } else {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
}

?>