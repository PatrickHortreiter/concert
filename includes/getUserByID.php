<?php
include "dbconnect.php";
?>

<?php
$userID = $_POST["userID"];
$action = $_POST["action"];
$ordiestring = "<p><strong>PHP Info: </strong>Abfrage war nicht möglich.</p>";

if ($action=="Update"){
    $sql = "SELECT * FROM user WHERE userID = " . $userID . ";";
    $result = mysqli_query($pdo, $sql) or die($ordiestring);
    echo "
    
    ";

    while($row = mysqli_fetch_array($result)){

        echo "
			<form action='updateUser.php' type='submit' method='post'>
				<p>UserID <input type='text' name='userID' value='" . $userID. "'/></p><p>UserID nicht verändern</p>
				<p>UserName <input type='text' name='UserName' value='" . $row["UserName"] . "'/></p>
				<p>Email <input type='text' name='email' value='" . $row["email"] . "'/></p>
				<input type='submit' name='action' value='Update'/>
			</form>";
    }
} else if ($action=="Delete"){
    $sql = "DELETE FROM user WHERE userID = " . $userID . ";";
    $result = mysqli_query($pdo, $sql) or die($ordiestring);
    if ($result == 1) {
        header ("location: ../organizer.php");
    } else {
        echo "Fehler.";
    }
}

$resp = mysqli_close($pdo);

?>


