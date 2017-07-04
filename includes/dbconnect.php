<?php
    include_once 'dbconfig.php';

//Verbindung
$pdo=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($pdo->connect_error) {
    die("Alles ist zu spät".$pdo->connect_error);
}


