<!-- DB CONNECT -->
<?php include('videostore_pdo.php'); ?>

<!DOCTYPE html>
<html lang="en">

<!-- HEAD -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Movie Store Search</title>
</head>

<!-- BODY -->

<body>
    <div class="container">
        <div class="content">

            <!-- H1 -->
            <h1>Customer Search</h1>

            <!-- CONTENT -->
            <form action="" method="post">
                <label for="search">Search by name or email (case sensitive):</label><br>
                <label for="search">All names in database in sql file (ex. Jane, James)</label><br>
                <input type="text" name="search" id="search">
                <input type="submit" value="Search">
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
                if (isset($_POST['search'])) {
                    $userInput = $mysqli->real_escape_string($_POST['search']);

                    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                    $query = "SELECT * FROM customer";
                    $result = mysqli_query($mysqli, $query);
                    $resultCheck = mysqli_num_rows($result);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($userInput == $row['first_name'] || $userInput == $row['last_name'] || $userInput == $row['email']) {
                                echo '<br>First Name: ' . $row['first_name'] . '<br>';
                                echo 'Last Name: ' . $row['last_name'] . '<br>';
                                echo 'Email: ' . $row['email'] . '<br>';
                                echo 'Registered: ' . $row['registration_date'] . '<br>';
                                echo 'Birthday: ' . $row['birth_date'] . '<br>';
                            }
                        }
                    }

                    $mysqli->close();
                }
            }
            ?>
        </div>
    </div>

    <!-- JS -->
    <script rel="preload" src="js/script.js"></script>
</body>

</html>