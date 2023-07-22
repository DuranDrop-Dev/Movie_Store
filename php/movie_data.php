<?php
// ERROR REPORTING  
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// GET QUERY
$query = "SELECT * FROM movies;";
$result = mysqli_query($mysqli, $query);
$resultCheck = mysqli_num_rows($result);

// HANDLE QUERY WHILE LOOP
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['movies_id'] == $tagID) {
            $title = $row['movie_title'];
            $actor = $row['main_characters'];
            $director = $row['directed_by'];
            $release = $row['release_date'];
            $description = $row['description'];
            $pic = $row['image_name'];
            $checked_out = $row['checked_out'];
        }
    }
}
?>
<!-- MOVIE -->
<div class="movie_container">

    <details class="detailContainer" id="detailContainer">
        <summary>
            <?php echo $title ?><br>
            <img src="images/<?php echo $pic ?>" alt="image">
        </summary>
        <h2>
            <?php echo $title ?>
        </h2>
        <p><b>Starring:</b>
            <?php echo $actor ?><br><br>
            <b>Director/s:</b>
            <?php echo $director ?><br><br>
            <b>Released:</b>
            <?php echo $release ?><br><br>
            <b>Description:</b>
            <?php echo $description ?>
        </p>
        <?php /* 
       if ($checked_out == 0) {
           echo '<input type="button" value="Add To Cart" onclick="addToCart(`' . $title . '`)"><br>';
       } else {
           echo '<input type="button" value="Checked Out" onclick="checkedOut()">';
       } */
        ?>

    </details>
</div>