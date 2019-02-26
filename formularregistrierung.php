<!DOCTYPE html>
	<html>
		<head>
			<title> Test Registrierung </title>
		</head>
		<body>
			<?php
				print_r($_POST);

				if(!empty ($_POST['fbenutzername']) a$_POST['fpasswort1']nd !empty($_POST['fpasswort1']) and !empty( $_POST['fpasswort2']) and !empty($_POST['femail']))
				{
					if (empty ($_POST['fdsgelesen']))
					{
						if ($_POST['fpasswort1']==$_POST['fpasswort2'])
						{
							$anz=strlen($passwort1)
							if ($anz>=6)
							{
								/*$email = test_input($_POST["femail"]);
								if (filter_var($email, FILTER_VALIDATE_EMAIL))
								{ */
							$benutzer='';
							$adminpasswort='root';
							$server='localhost';
							$datenbakname='wintercamp';

							$ok=mysqli_connect($benutzer,$adminpasswort,$server,$datenbankname);


								if (!$ok or !$db)
								{
									echo "Fehler bei der Verbindung zu Datenbank";
								}
								else echo "Verbindung zur Datenbank steht";

							$sqli="SELECT benutzername FROM nutzer";

							$vorname=$_POST['fvorname'];
							$nachname=$_POST['fnachname'];
							$benutzername=$_POST['fbenutzername'];
							$passwort1=$_POST['fpasswort1'];
							$passwort2=$_POST['fpasswort2'];
							$email=strtolower($email);
							$dsgelesen=$_POST['fdsgelesen'];
							$teilnehmer=$_POST['fteilnehmer'];
							$camp=$_POST['fcamp'];
							if ($teilnehmer==true)
								{
									$rID=2;
								}
								else $rID=3;
							$userpasswort=md5($passwort1);

							$sql="INSERT INTO 'wintercamp'.'nutzer'
								('nID','nachname','vorname','benutzername','eMail','passwort','rID','teilnahme')
								VALUES(NULL,'$nachname','$vorname','$benutzername','$email','$userpasswort','$rID','$camp')
							header("Location: frontend.php")

							/*	}
								else echo "Ungültige Email-Adresse!"; */
							}
							else echo "Passwort mit mindestens 6 Zeichen verwenden!";
						}
						else echo "Passwörter stimmen nicht überein!";
					}
					else echo "Datenschutzbestimmung akzeptieren!";
				}
				else echo "fehlende Eingabe!";


			?>
		</body>
	<html>
