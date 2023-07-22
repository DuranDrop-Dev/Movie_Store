<!-- DB CONNECT -->
<?php include('php/videostore_pdo.php'); ?>

<!DOCTYPE html>
<html lang="en">

<!-- HEAD -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Movie Store</title>
</head>

<!-- BODY -->

<body>
    <div class="container">
        <div class="content">

            <!-- H1 -->
            <h1>Movie Store</h1>

            <!-- Links -->
            <center>
                <a href="php/customer_list.php">Customer Search | </a>
                <a href="php/video_list.php">Movie Search | </a>
                <a href="php/rental_list.php">Rental Data</a>
            </center>

            <!-- LOGIN -->
            <?php include('php/login_signup_forms.php'); ?>

            <!-- CART 
            <details class="noStyle" id="cart" open>
                <summary>Cart</summary><br>            
            </details>
            -->

            <!-- CONTENT -->
            <h2>Movie List</h2>
            <div class="grid" id="grid">
                <?php $tagID = 1;
                include('php/movie_data.php'); ?>
                <?php $tagID = 2;
                include('php/movie_data.php'); ?>
                <?php $tagID = 3;
                include('php/movie_data.php'); ?>
                <?php $tagID = 4;
                include('php/movie_data.php'); ?>
                <?php $tagID = 5;
                include('php/movie_data.php'); ?>
                <?php $tagID = 6;
                include('php/movie_data.php'); ?>
                <?php $tagID = 7;
                include('php/movie_data.php'); ?>
                <?php $tagID = 8;
                include('php/movie_data.php'); ?>
                <?php $tagID = 9;
                include('php/movie_data.php'); ?>
                <?php $tagID = 10;
                include('php/movie_data.php'); ?>
            </div>
        </div>
    </div>

</body>

</html>