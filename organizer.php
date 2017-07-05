<?php
include 'includes/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="scss/main.css" rel="stylesheet">
    <script language="javascript" type="text/javascript" src="jQuery/jQuery.js"></script>
    <script language="javascript" type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/pic.js" type="text/javascript"></script>

</head>
<body>

<main>
    <div class="width">
        <?php

        $result = mysqli_query($pdo, "SELECT * FROM user") or die("<p><strong>PHP Info: </strong>Abfrage war nicht möglich.</p>");

        //echo "<p><strong>PHP Info: </strong>Abfrage war erfolgreich.</p>";

        echo "<ul>";

        while($row = mysqli_fetch_array($result)){
            echo "<li>" . $row["UserName"] . " " . $row["email"] . "</li>";
        }

        echo "</ul>";
        ?>
        
</main>
</body>
</html>