<?php
include 'includes/dbconnect.php';
$results = mysqli_query($pdo, "SELECT * FROM concert;");
?>
<?php
    session_start();
    $loggedIn = isset ($_SESSION['login_user']);
    if($loggedIn){
        $urmail = $_SESSION['login_user'];
    }else{
        header ('location: index.php');
    }

?><!--Login/Logout-->


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- mobile-first -->

    <title>xor Application</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="scss/main.css" rel="stylesheet">
    <link href="scss/application.css" rel="stylesheet">
    <script language="javascript" type="text/javascript" src="jQuery/jQuery.js"></script>
    <script language="javascript" type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/pic.js" type="text/javascript"></script>

</head>

<body>

<header>
    <div class="width">
        <h1>Concert</h1>
    </div>
</header>

<main>
    <div class="width">
        <div class="a controller table">
            <h2>Concerts</h2>
        <?php

        $result = mysqli_query($pdo, "SELECT * FROM concert") or die("<p><strong>PHP Info: </strong>Abfrage war nicht möglich.</p>");
        echo "<table><tr><th>ConcertID</th><th>Venue</brth><th>Date</th></tr>";
        $i=0;
        while($row = mysqli_fetch_array($result)){
            $i++;
            echo "<tr>
                    <td>" . $row["concertID"] . " </td>
                    <td>" . $row["venueName"] . "</td>
                    <td>" . $row["date"] . "</td>
                  </tr>";
        }

        echo "</table>";
        ?>
        </div>
        <div class="a controller table">
            <h2>Performances</h2>
            <?php
            $result = mysqli_query($pdo, "SELECT perf.concertID, perf.startTime, perf.endTime, act.name FROM performance AS perf INNER JOIN act ON act.actID = act.actID") or die("<p><strong>PHP Info: </strong>Abfrage war nicht möglich.</p>");
            echo "<table><tr><th>ConcertID</th><th>Start</th><th>End</th><th>Act</th></tr>";
            $i=0;
            while($row = mysqli_fetch_array($result)){
                echo "<tr>
                    <td>" . $row["concertID"] . " </td>
                    <td>" . $row["startTime"] . "</td>
                    <td>" . $row["endTime"] . "</td>
                    <td>" . $row["name"] . "</td>
                  </tr>";
            }

            echo "</table>";
            ?>
        </div>
        <div class="controller">
            <h2>Get a ticket</h2>
            <form action="includes/getTicket.php" type="submit" method="post">
                <p class="x">UserID: <input class="form-control"   type="text" name="userID"/></p>
                <p class="x">ConcertID <input class="form-control" type="text" name="concertID"/></p>
                <input type="submit" class="btn btn-default" value="Get a ticket" name="submit"/>
            </form>
        </div>

    </div>

</main>

<footer>
    <div class="width">

        <!-- Displays the mail -->
        <div class="a" style="margin-left: -20px;">
            <p>Logged in as <b><?php echo $urmail; ?></b></p>
        </div>

        <!-- Logout Button-->
        <?php if ($loggedIn):?>
            <div class = "b" style="margin-right: -20px">
                <a href="logout.php"><button class="btn btn-default">Logout</button></a>
            </div>
        <?php endif; ?>
    </div>

</footer>

</body>
</html>