<?php
include '../php/datenbanklink.php';

$fbenutzername = $_POST["fbenutzername"];
$fpasswort1 = $_POST["fpasswort1"];

$sql = "SELECT * FROM nutzer WHERE benutzername = '$fbenutzername'";

$res = mysqli_query($db_link, $sql);

while ($ausgabe = mysqli_fetch_assoc($res)) {
  $passwort = $ausgabe["passwort"];
	$nID = $ausgabe["nID"];
	$vorname = $ausgabe["vorname"];
	$nachname = $ausgabe["nachname"];
	$eMail = $ausgabe["eMail"];
	$rId = $ausgabe["rId"];

}
mysqli_close($db_link);

if (empty($fbenutzername) || empty($fpasswort1)) {
	echo "<script>alert('Bitte Nutzerdaten eingeben'); window.location.assign('../php/logIn.php');</script>";
}

$fpasswort1=hash("sha512",$fpasswort1);

if ($fpasswort1 == $passwort) {
		# session variable!
	session_start();
 	$_SESSION['fbenutzername'] = $fbenutzername;
	$_SESSION['angemeldet'] = 1;
 	$_SESSION['nID'] = $nID;
 	$_SESSION['vorname'] = $vorname;
	$_SESSION['nachname'] = $nachname;
	$_SESSION['eMail'] = $eMail;
	$_SESSION['rId'] = $rId;

  # weiterleitung auf die seite nach erfolgreichem login
	header('location: ../index.php');
}
else {
	# falsche eingabe gibt meldung aus
	session_start();
	$_SESSION['angemeldet'] = 0;
 	echo "<script>alert('Anmeldung nicht erfolgreich'); window.location.assign('../php/logIn.php');</script>";
}
?>
