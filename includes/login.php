
<!-- USER LOGIN -->

<?php

include "includes/dbconnect.php";

session_start();

$ifError = false;

if(isset($_POST['email'])&&isset($_POST['password'])){

    $email = mysqli_real_escape_string($pdo, $_POST['email']);

    $plainTextPassword = $_POST['password'];

    $plainTextPassword = mysqli_real_escape_string($pdo, $plainTextPassword);

    $sql = "SELECT `usersID`,`password` FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($pdo, $sql);

    if(!$result) {
        echo mysqli_error($pdo);
    }

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $passwordFromDb = $row['password'];

        if(password_verify($plainTextPassword, $passwordFromDb)) {
            $_SESSION['login_user'] = $email;
            $_SESSION['login_userid'] = $row['userID'];

            header("location: application.php");

        } else {
            $ifError = true;
        }

    } else {
        $ifError = true;
    }

}
