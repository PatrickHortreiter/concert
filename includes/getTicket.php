<?php
include "dbconnect.php";
	$concertID = $_POST["concertID"];
	$userID = $_POST["UserName"];


	$sql = "INSERT INTO ticket (concertID, userID) VALUES ('" . $concertID . "', '" . $userID. "');";


	$result = mysqli_query($pdo, $sql);

    header("location: ../application.php");
?>

?>



