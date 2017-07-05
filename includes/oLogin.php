<?php
include "dbconnect.php";

// Admin-Login

if(isset($_POST['oName'])&&isset($_POST['oPassword'])) {

    $oName = mysqli_real_escape_string($pdo, $_POST['oName']);

    $plainTextPassword = $_POST['oPassword'];
    $plainTextPassword = mysqli_real_escape_string($pdo, $plainTextPassword);
    $sql = "SELECT `organizerID`,`password` FROM `organizer` WHERE `organizerName` = '$oName'";
    $result = mysqli_query($pdo, $sql);

    if (!$result) {
        echo mysqli_error($pdo);
    }

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $passwordFromDb = $row['password'];

        if (password_verify($plainTextPassword, $passwordFromDb)) {
            $_SESSION['login_user'] = $oName;
            $_SESSION['login_userid'] = $row['organizerID'];

            header("location: application.php");

        }

    }
}