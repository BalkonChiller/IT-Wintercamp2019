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
if (isset($_POST["submit"]))
{
	if ($_SESSION['angemeldet']==1)
	{
		error_reporting(E_ALL);
		if(isset($_SESSION['nID']))
		{
		$id = $_SESSION['nID'];
		}
		include '../php/datenbanklink.php';
		mysqli_set_charset($db_link, 'utf8');

		$btitel=$_POST["titel"];//Überschrift
		$binhalt=$_POST["inhalt"];//Text zu Beitrag
		$bkategorie=$_POST["kategorie"];//Kategorie
		$sql = "INSERT INTO beitrag (nID, beitragstitel, beitraginhalt, kategorie) VALUES ('$id','$btitel','$binhalt','$bkategorie')";
		$db_link->query($sql);
		$sql2 = "SELECT Count(bID) FROM beitrag";
		$erg = mysqli_query($db_link, $sql2);
		$erg2 = mysqli_fetch_array($erg, MYSQLI_NUM);
		header('location: ../php/Beitrag_kommentieren.php?id='.$erg2[0]);
	}
	else {
		 header('location: login.php');
		 }
}
include './footer.php';
?>
  </body>
</html>
