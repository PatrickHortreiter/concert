<?php
include "dbconnect.php";
	$concertID = $_POST["concertID"];
	$userID = $_POST["userID"];

	$sql = "INSERT INTO ticket (concertID, userID) VALUES ('" . $concertID . "', '" . $userID. "');";

	echo "<p><strong>PHP Info: </strong>" . $sql . "</p>";

	$result = mysqli_query($pdo, $sql);

	echo $result;
?>

?>



