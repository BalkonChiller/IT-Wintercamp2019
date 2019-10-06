<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Beitrag erstellen </title>
    <link rel="stylesheet" type="text/css"  href="/css/stylesheet1.css">
  </head>
  <body>
<?php
include './header.php';

if ($_SESSION['angemeldet'] == 0) {
  header('location: ./logIn.php');
}
?>
    <br>
    <div class="row">
    <div class="col-3 col-s-3 menu"></div>
      <div class="aside">
        <h1>Beitrag erstellen</h1>
        <form method="post">
        <input type="text" name="titel" placeholder="Überschrift" required>
        <br>
        <input type="text" name="kategorie" placeholder="Kategorie" required>
        <br>
        <textarea rows="10" cols="70" name="inhalt" placeholder="Beitragsinhalt"></textarea>
        <br>
        <button type="submit" name="submit" value="">Beitrag abschicken</button>
        </form>
      </div>
    </div>
    <br>
<?php
if (isset($_POST["submit"])) {
	  $id = $_SESSION['nID'];
  	include '../php/datenbanklink.php';

  	$btitel = htmlspecialchars($_POST["titel"]); //Überschrift
  	$binhalt = htmlspecialchars($_POST["inhalt"]); //Text zu Beitrag
  	$bkategorie = htmlspecialchars($_POST["kategorie"]); //Kategorie
  	$sql = "INSERT INTO beitrag (nID, beitragstitel, beitraginhalt, kategorie) VALUES ('$id','$btitel','$binhalt','$bkategorie')";
  	$db_link->query($sql); //Eintragen des Beitrags in die db

  	$sql2 = "SELECT Count(bID) FROM beitrag";
  	$erg = mysqli_query($db_link, $sql2);
  	$erg2 = mysqli_fetch_array($erg, MYSQLI_NUM);
  	header('location: ../php/Beitrag_kommentieren.php?id='.$erg2[0]); //Weiterleitung
}

include './footer.php';
?>
  </body>
</html>
