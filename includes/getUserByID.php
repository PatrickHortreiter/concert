<?php
include "dbconnect.php";

$userID = $_POST["userID"];
$action = $_POST["action"];
$ordiestring = "<p><strong>PHP Info: </strong>Abfrage war nicht möglich.</p>";

if ($action=="Display"){
    $sql = "SELECT * FROM user WHERE userID = " . $userID . ";";
    $result = mysqli_query($pdo, $sql) or die($ordiestring);
    while($row = mysqli_fetch_array($result)){

        echo "
			<form action='updateUser.php' type='submit' method='post'>
				<p>UserID <input type='text' name='userID' value='" . $userID. "'/></p>
				<p>UserName <input type='text' name='UserName' value='" . $row["UserName"] . "'/></p>
				<p>Email <input type='text' name='email' value='" . $row["email"] . "'/></p>
				<input type='submit' name='action' value='Update'/>
			</form>";
    }
} else if ($action=="Delete"){
    $sql = "DELETE FROM user WHERE userID = " . $userID . ";";
    $result = mysqli_query($pdo, $sql) or die($ordiestring);
    if ($result == 1) {
        echo "User mit ID " . $userID . " wurde gelöscht.";
    } else {
        echo "Fehler.";
    }
}

$resp = mysqli_close($pdo);

?>