<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
	</head>

	<body>
	<div class="main_page">
		  <div class="page_header floating_element">
			<span class="floating_element">
			  Log In - Dumpseite
			</span>
		  </div>
	</div>

<?php

$_db_host = "localhost";
$_db_datenbank = "wintercamp";
$_db_benutzername = "root";
$_db_passwort = "";

session_start();
$con = mysqli_connect("localhost", "root", "", "wintercamp");


$fbenutzername = $_POST["fbenutzername"];
$fpasswort1 = $_POST["fpasswort1"];

##################################################################


$sql = "SELECT * FROM nutzer WHERE benutzername = '$fbenutzername'";

$res = mysqli_query($con, $sql);

echo "<table border = 1>";

while ($ausgabe = mysqli_fetch_assoc($res))
{
  echo "<tr><td>" . $ausgabe["nID"] . "</td>" .
     "<td>" . $ausgabe["nachname"] . "</td>" .
       "<td>" . $ausgabe["vorname"] . "</td></tr>" ;

}
mysqli_close($con);

echo "</table>";

?>
  </body>
</html>
