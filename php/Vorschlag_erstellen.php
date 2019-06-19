<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Vorschlag erstellen </title>
    <link rel="stylesheet" type="text/css"  href="/css/stylesheet1.css">
  </head>
  <body>
<?php
      include './header.php';
?>

        <h2>Beitrag erstellen</h2>

        <form class="" action="" method="post">

        <label for="ueberschrift">Überschrift:</label><br>
        <input type="text" name="ue" required>

        <br><br>

        <label for="Beitraginhalt">Beitragsinhalt:</label><br>
        <textarea rows="10" cols="70" name="bi"></textarea>

        <br><br>

        <label for="Kategorie">Kategorie:</label><br>
        <input type="text" name="kt" required>

        <br><br>

        <input type="submit" name="submit" value="Vorschlag abschicken">
		</form>
<?php
if (isset($_POST["submit"]))
{
	if ($_SESSION['angemeldet']==1)
	{
		error_reporting(E_ALL);
		if(isset($_SESSION['nID']))
		{
		$id = $_SESSION['nID'];
		}
		// Zum Aufbau der Verbindung zur Datenbank
		$benutzer='root';
		$adminpasswort='';
		$server='localhost';
		$datenbankname='wintercamp';
		$db_link=mysqli_connect($server,$benutzer,$adminpasswort,$datenbankname);
		mysqli_set_charset($db_link, 'utf8');
		$btitel=$_POST["ue"];//Überschrift
		$binhalt=$_POST["bi"];//Text zu Vorschlag
		$bkategorie=$_POST["kt"];//Kategorie
		$sql = "INSERT INTO beitrag (nID, beitragstitel, beitraginhalt, kategorie) VALUES ('$id','$btitel','$binhalt','$bkategorie')";
		$db_link->query($sql);
		$sql2 = "SELECT Count(bID) FROM beitrag";
		$erg = mysqli_query($db_link, $sql2);
		$erg2 = mysqli_fetch_array($erg, MYSQLI_NUM);
		header('location: ../php/Vorschlag_kommentieren.php?id='.$erg2[0]);
	}
	else {
		 header('location: login.php');
		 }
}
?>
<?php
    include './footer.php';
?>
  </body>
</html>
