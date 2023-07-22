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
            <h1>Movie Search</h1>

            <!-- CONTENT -->
            <form action="" method="post">
                <label for="search">Search movie by name or actor (case sensitive):</label><br>
                <input type="text" name="search" id="search">
                <input type="submit" value="Search">
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
                if (isset($_POST['search'])) {
                    $userInput = $mysqli->real_escape_string($_POST['search']);

                    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                    $query = "SELECT * FROM movies;";
                    $result = mysqli_query($mysqli, $query);
                    $resultCheck = mysqli_num_rows($result);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($userInput == $row['movie_title'] || $userInput == $row['main_characters']) {
                                echo '<br>Title: ' . $row['movie_title'] . '<br>';
                                echo 'Main Characters: ' . $row['main_characters'] . '<br>';
                                echo 'Directed By: ' . $row['directed_by'] . '<br>';
                                echo 'Released: ' . $row['release_date'] . '<br>';
                                echo 'Description: ' . $row['description'] . '<br>';
                            }
                        }
                    }

                    $mysqli->close();
                }
            }
            ?>
        </div>
    </div>

</body>

</html>