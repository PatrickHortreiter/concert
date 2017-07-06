<?php
include 'includes/dbconnect.php';
$results = mysqli_query($pdo, "SELECT * FROM user;");
?>
<?php
session_start();
$loggedIn = isset ($_SESSION['login_organizer']);
if($loggedIn){
    $urmail = $_SESSION['login_organizer'];
}else{
    header ('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="scss/main.css" rel="stylesheet">
    <link href="scss/app.css" rel="stylesheet">
    <script language="javascript" type="text/javascript" src="jQuery/jQuery.js"></script>
    <script language="javascript" type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/pic.js" type="text/javascript"></script>

</head>
<body>
<header>
    <h1>Admin Center</h1>

</header>

<main>
    <div class="width">
    <div class="a controller table">
        <?php

        $result = mysqli_query($pdo, "SELECT * FROM user") or die("<p><strong>PHP Info: </strong>Abfrage war nicht möglich.</p>");
        echo "<table><tr><th>UserID</th><th>UserName</brth><th>Email</th></tr>";

        while($row = mysqli_fetch_array($result)){
            echo "<tr>
                    <td>" . $row["userID"] . " </td>
                    <td>" . $row["UserName"] . "</td>
                    <td>" . $row["email"] . "</td>
                  </tr>";
        }

        echo "</table>";
        ?>
    </div>
        <div class="b controller user">
            <h2>Usercontroller</h2>
        <form method="post" type="submit" action="includes/getUserByID.php">
            <select name="userID">
                <?php
                while($row = mysqli_fetch_array($results)){
                    echo "<option value='" . $row["userID"] . "'>" . $row["UserName"] . "</option>";
                }
                ?>
            </div>
            </select>
            <input type="submit" name="action" class="btn btn-default" value="Update"/>
            <input type="submit" name="action" class="btn btn-default" value="Delete"/>
        </form>
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