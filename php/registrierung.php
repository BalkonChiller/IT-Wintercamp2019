<!DOCTYPE html>
<?php
$error = false;

  if(isset($_POST['fbenutzername']) and isset($_POST['fpasswort1']) and isset($_POST['fpasswort2']) and isset($_POST['femail'])){
  if(empty ($_POST['fbenutzername']) or empty($_POST['fpasswort1']) or empty( $_POST['fpasswort2']) or empty($_POST['femail'])){

    echo "fehlende Eingabe!";
    $error = true;
  }

	$vorname = $_POST['fvorname'];
	$nachname = $_POST['fnachname'];
	$benutzername = $_POST['fbenutzername'];
	$passwort1 = $_POST['fpasswort1'];
	$passwort2 = $_POST['fpasswort2'];
	$email = strtolower($_POST['femail']);
	$dsgelesen = $_POST['fdsgelesen'];
	$teilnehmer = $_POST['fteilnehmer'];
	$campe = $_POST['fcamp'];
	$jahr = $_POST['fjahr'];
    $camp = $campe." ".$jahr;

    include '../php/datenbanklink.php';

    $sqli="SELECT Count(nID) AS anz FROM nutzer WHERE benutzername='".$benutzername."'";

	$erg1 = 0;
    $erg1 = mysqli_fetch_row(mysqli_query($db_link,$sqli))[0];

    if($erg1 != 0) {
      echo "<script>alert('Benutzername ist bereits vergeben!');</script>";
      $error = true;
    }

    $sqli="SELECT Count(nID) AS anz FROM nutzer WHERE eMail='".$email."'";

	$erg2 = 0;
    $erg2=mysqli_fetch_row(mysqli_query($db_link,$sqli))[0];

    if($erg2 != 0) {
      echo "<script>alert('Email wurde bereits verwendet!');</script>";
      $error = true;
    }

	if ($teilnehmer) {
		$rID = 2;
	}
	else $rID = 3;

	$userpasswort=hash("sha512",$passwort1);

	if (!$error) {
	$sqli="INSERT INTO nutzer (nachname,vorname,benutzername,eMail,passwort,rID,teilnahme) VALUES('".$nachname."','".$vorname."','".$benutzername."','".$email."','".$userpasswort."','".$rID."','".$camp."')";
	  $query_result= mysqli_query($db_link,$sqli);

    header('location: ./logIn.php');
	}
	else echo ".$error.";
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <script language="javascript" type="text/javascript" src="../javascript/registrierung.js"></script>
        <link rel="stylesheet" type="text/css"  href="../css/stylesheet1.css">
        <title>IT-Camp/Registrierung</title>
    </head>
    <body>
<?php
include './header.php';
?>
   <br>
   <div class="row aside">
   <div class="col-3 col-s-3 menu"></div>
   <br>
   <h1>IT-Camp Registrierung</h1>

   <form action="../php/registrierung.php" method="post" onsubmit="return registrieren();">
   <input type="text" name="fvorname" id="fvorname" required placeholder="Vorname"> <br>
   <input type="text" name="fnachname" id="fnachname" required placeholder="Nachname"> <br>
   <input type="text" name="fbenutzername" id="fbenutzername" required placeholder="Benutzername"> <br>
   <input type="password" name="fpasswort1" id="fpasswort1" required placeholder="Passwort"> <br>
   <input type="password" name="fpasswort2" id="fpasswort2" required placeholder="Passwort bestätigen"> <br>
   <input type="text" id='femail' name="femail" required placeholder="E-Mail-Adresse"> <br>

   <br>
   <label for="checkbox"> Habe Teilgenommen
   <input type="checkbox" class="checkbox" id='fteilnehmer' name="fteilnehmer" onclick="sichtbarkeit()">
   </label>
   <br>

   <div id="teilnehmerjahr">&nbsp
   <select id='fcamp' name="fcamp" size="1">
   <option value ="Wähl dein Camp aus" selected disabled> Wähle dein Camp aus</option>
   <option value="SummerCamp">SummerCamp </option>
   <option value="WinterCamp">WinterCamp </option>
   </select>
   <br><br>
   <input type = "number" id='fjahr' name="fjahr"  placeholder="Teilnehmerjahr" class="login">
   </div>

   <label for="checkbox"> Datenschutzerklärung akzeptieren
   <input type="checkbox" class="checkbox" id='fdsgelesen' name="fdsgelesen" required>
   </label>
   <br>
   <br>
   <button type="submit">Registrieren</button>
   </form>
</div>
<br>
<?php
include './footer.php';
?>
</body>
</html>
