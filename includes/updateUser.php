<?php
$UserName = $_POST["UserName"];
$email = $_POST["email"];
$userID = $_POST["userID"];

$sql = "UPDATE user SET UserName = '" . $UserName . "', email = '" . $email . "' WHERE userID = " . $userID. ";";

include "dbconnect.php";
$result = mysqli_query($pdo, $sql);

if($result == 1){
    echo "User mit ID " . $userID . " erfolgreich aktualisiert.";
}

?>