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

# Datenbankverbindung herstellen
$link =mysqli_connect($_db_host, $_db_username, $_db_passwort);

# Hat die Verbindung geklappt ?
if (!$link)
    {
    die("Keine Datenbankverbindung möglich: " . mysql_error());
    }

# Verbindung zur richtigen Datenbank herstellen
$datenbank = mysql_select_db($_db_datenbank, $link);

if (!$datenbank)
    {
    echo "Kann die Datenbank nicht benutzen: " . mysql_error();
    mysql_close($link);        # Datenbank schliessen
    exit;                    # Programm beenden !
    }

$fbenutzername = $_POST["fbenutzername"];
$fpasswort1 = $_POST["fpasswort1"];

##################################################################

$sql = "SELECT * from nutzer where benutzername = '$fbenutzername'";

$res = mysqli_query($sql, $link);

echo $res;

?>
  </body>
</html>
