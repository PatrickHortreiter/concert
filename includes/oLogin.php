<?php
include "dbconnect.php";

// User-Login


session_start();

$ifError = false;

if(isset($_POST['oName'])&&isset($_POST['oPassword'])){

    $oName = mysqli_real_escape_string($pdo, $_POST['oName']);

    $plainTextPassword = $_POST['oPassword'];
    $plainTextPassword = mysqli_real_escape_string($pdo, $plainTextPassword);
    $sql = "SELECT `organizerID`,`password` FROM `organizer` WHERE `organizerName` = '$oName'";
    $result = mysqli_query($pdo, $sql);

    if(!$result) {
        echo mysqli_error($pdo);
    }

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $passwordFromDb = $row['oPassword'];

        if(password_verify($plainTextPassword, $passwordFromDb)) {
            $_SESSION['login_user'] = $oName;
            $_SESSION['login_userid'] = $row['userID'];

            header("location: application.php");

        } else {
            $ifError = true;
        }

    } else {
        $ifError = true;
    }

}