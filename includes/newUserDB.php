<?php
include "dbconnect.php";

// User-Registration

$regsuccess=false;
$regfail=false;
$passfail=false;

if(isset($_POST['email'])&&isset($_POST['username'])) {
    if (isset($_POST['passwort'])) {
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["passwort"];
        $password2 = $_POST["passwort2"];
        $concertID = NULL;
        if ($password != $password2) {
            $passfail = true;
        } else {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $sql = "INSERT INTO `user` (`userName`, `email`, `password`) VALUES ('".$username."','".$email."','".$hash."')";
            $result = mysqli_query($pdo, $sql);
            // echo $username;
            if ($result) {
//            header('location: index.php');
                $regsuccess = true;
            } else {
                $regfail = true;
            }

        }
    }
}


