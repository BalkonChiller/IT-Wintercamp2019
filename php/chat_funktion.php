<?php

$_db_host = "localhost";
$_db_datenbank = "wintercamp";
$_db_benutzername = "root";
$_db_passwort = "";


$con = mysqli_connect("localhost", "root", "", "wintercamp");

$message = $_POST["send-message-area"];
$sender =  $_SESSION['fbenutzername'];
$rid = $_SESSION['rId'];


##################################################################

 ?>
