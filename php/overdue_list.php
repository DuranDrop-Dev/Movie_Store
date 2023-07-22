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
    <title>Movie Store Overdue</title>
</head>

<!-- BODY -->

<body>
    <div class="container">
        <center class="content">
            <!-- H1 -->
            <h1>Overdue List</h1>
            <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
                <table border="1">
                    <thead>
                        <th>Rental ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Movie Title</th>
                        <th>Checked Out</th>
                        <th>Due Date</th>
                        <th>Days Past Due</th>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT rental.rental_id, customer.first_name AS First_Name, customer.last_name AS Last_Name,
                            rental.checked_out AS Checked_Out, rental.due_date AS Due, 
                            movies.movie_title AS Title
                                FROM customer
                                INNER JOIN rental ON customer.customer_id = rental.cust_id 
                                INNER JOIN movies ON movies.movies_id = rental.video_id
                                WHERE TIMESTAMPDIFF(DAY, rental.due_date, CURRENT_DATE) > 0;";
                        $result = mysqli_query($mysqli, $query);
                        $resultCheck = mysqli_num_rows($result);
                        while ($row = mysqli_fetch_array($result)) {
                            $date1 = new DateTime(date("Y/m/d"));
                            $date2 = new DateTime($row['Due']);
                            $difference = $date1->diff($date2);
                            ?>
                            <tr>
                                <td>
                                    <?php echo $row['rental_id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['First_Name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Last_Name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Title']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Checked_Out']; ?>
                                </td>
                                <td>
                                    <?php echo $row['Due']; ?>
                                </td>
                                <td>
                                    <?php echo $difference->format('%d days'); ?>
                                </td>
                            </tr>
                            <?php
                        }
            }
            ?>
                </tbody>
            </table>

        </center>
    </div>

</body>

</html>