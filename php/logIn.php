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

			$sql = "SELECT passwort FROM nutzer WHERE benutzername = '$fbenutzername'";

			$res = mysqli_query($con, $sql);

			while ($ausgabe = mysqli_fetch_assoc($res))
			{
			  $passwort = $ausgabe["passwort"];

			}
			mysqli_close($con);

			if (empty($fbenutzername) or empty($passwort1))
			  {
			    echo "Bitte Nutzerdaten eingeben";
			  }

			if ($fpasswort1 == $passwort)
			{
			     # weiterleitung auf die seite nach erfolgreichem login
			     header('location: menu.html'); #Bitte noch den richtigen Link eingeben
			     exit(1);
			}
			else
			{
			     # weiterleitung auf die Login-seite ...
					 alert ("Anmeldung nicht erfolgreich.");
					# header('location: logIn.html');
			   #  exit();

			}


?>
  </body>
</html>
