<?php

			$_db_host = "localhost";
			$_db_datenbank = "wintercamp";
			$_db_benutzername = "root";
			$_db_passwort = "";


			$con = mysqli_connect("localhost", "root", "", "wintercamp");

			$fbenutzername = $_POST["fbenutzername"];
			$fpasswort1 = $_POST["fpasswort1"];

			$fpasswort1=hash("sha512",$fpasswort1);

			##################################################################

			$sql = "SELECT * FROM nutzer WHERE benutzername = '$fbenutzername'";

			$res = mysqli_query($con, $sql);

			while ($ausgabe = mysqli_fetch_assoc($res))
			{
			  $passwort = $ausgabe["passwort"];
				$nID = $ausgabe["nID"];
				$vorname = $ausgabe["vorname"];
				$nachname = $ausgabe["nachname"];
				$eMail = $ausgabe["eMail"];
				$rId = $ausgabe["rId"];

			}
			mysqli_close($con);

			if (empty($fbenutzername) || empty($fpasswort1))
			  {
			    echo "Bitte Nutzerdaten eingeben";
			  }

			if ($fpasswort1 == $passwort)
			{

					#session variable!
					 session_start();
					 $_SESSION['angemeldet'] = 1;
					 $_SESSION['nID'] = $nID;


					  # weiterleitung auf die seite nach erfolgreichem login
			    	header('location: ../index.php'); #Bitte noch den richtigen Link eingeben
			    	exit(1);


			}
			else
			{
						# falsche eingabe gibt meldung aus
						session_start();
						$_SESSION['angemeldet'] = 0;
					 	echo "<script>alert('Anmeldung nicht erfolgreich'); window.location('./logIn.php');</script>";


			}
?>
