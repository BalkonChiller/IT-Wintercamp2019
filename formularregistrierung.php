<!DOCTYPE html>
	<html>
		<head>
			<title> Test Registrierung </title>
		</head>
		<body>
			<?php
				print_r($POST);
				
				if(!empty ($_POST['fbenutzername']) and !empty($POST['fpasswort1']) and !empty( $POST['fpasswort2']) and !empty($POST['femail']))
				{
					if (empty ($_POST['fdsgelesen']))
					{
						if ($passwort1==$passwort2)
						{
							$anz=strlen($passwort1)
							if ($anz>=6)
							{
								
							$benutzer='tollerAdmin';
							$adminpasswort='testAdmin2019';
							$server='localhost';
							$datenbakname='wintercamp';
							
							$ok=mysqli_connect("","root","localhost",$datenbankname);
							$db=mysql_select_db($datenbankname);
							
								if (!$ok or !$db)
								{
									echo "Fehler bei der Verbindung zu Datenbank";
								}
								else echo "Verbindung zur Datenbank steht";
								
							$vorname=$POST['fvorname'];
							$nachname=$POST['fnachname'];
							$benutzername=$POST['fbenutzername'];
							$passwort1=$POST['fpasswort1'];
							$passwort2=$POST['fpasswort2'];
							$email=strtolower($POST['femail']);
							$dsgelesen=$POST['fdsgelesen'];
							$teilnehmer=$POST['fteilnehmer'];
							
							$userpasswort=md5($passwort1);
							
							
							
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