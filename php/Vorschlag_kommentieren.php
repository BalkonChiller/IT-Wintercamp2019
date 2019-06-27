<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Vorschlag kommentieren </title>
    <link rel="stylesheet" type="text/css"  href="/css/stylesheet1.css">
  </head>
  <body>
<?php
      include './header.php';
?>

<div class="vorschlagallg" align="center">
<?php
if ($_SESSION['angemeldet']==1)
	{
	  error_reporting(E_ALL);
	  // Zum Aufbau der Verbindung zur Datenbank
	  //$benutzer='root';
	  //$adminpasswort='';
	  //$server='localhost';
	  //$datenbankname='wintercamp';
	  include '../php/datenbanklink.php';
		if(isset($_SESSION['nID'])) {
		$nID = $_SESSION['nID'];
		}
	  $bid=$_GET["id"];
	  $beitrag=$db_link->query("SELECT * FROM beitrag WHERE bId='$bid'");
		//Bereits Geliket?
		$sqli="SELECT Count(nID) AS anz FROM bewertung WHERE bID='".$bid."'";
		$erg1=mysqli_fetch_row(mysqli_query($db_link,$sqli))[0];
	  while($beitrag2=$beitrag->fetch_array()){
		$ueberschrift=$beitrag2['beitragstitel'];
		$binhalt=$beitrag2['beitraginhalt'];
		$bkategorie=$beitrag2['kategorie'];
		$vorschlag="vorschlag";
		$zahl=2;
		$sql2 = "SELECT Count(id) FROM bewertung WHERE bID='$bid'";
		$erg = mysqli_query($db_link, $sql2);
		$erg2 = mysqli_fetch_array($erg, MYSQLI_NUM);
		echo "<div class=\"".$vorschlag."\"><table>";
		echo "<tr><th colspan=\"".$zahl."\"><h1>".$ueberschrift."</h1></th></tr>";
		echo "<tr><td><h3>Inhalt:</h3></td><td>".$binhalt."</td></tr>";
		echo "<tr><td colspan=\"".$zahl."\">Kategorie: ".$bkategorie."</td></tr>";
		echo "</table></div><br><hr>";
	}
	}
	else {
		 header('location: login.php');
		 }
?>
</div>

<div class="kommentar">
      <form class="" align="center" action="" method="post">
          <label for="kommentar"></label>
          <input type="text" name="kommentar">
          <input type="submit" name="submit" value="Posten">
      </form>
</div>

<div class="bewertung">
	<form class="" action="" method="post">
		<?php
		if($erg1 == 0) {
		echo "<input type='submit' name='like' value='+'>";
		}
		else {
		echo "<input type='submit' name='like' value='+' disabled>";
		}
			echo $erg2[0];
		?>
	</form>
</div>
<br>
<?php
if (isset($_POST["submit"])) {
//eingabe
	$kommentar=$_POST["kommentar"];
	$sql = "INSERT INTO kommentar (nID, kommentar, bId) VALUES ('$nID','$kommentar','$bid')";
	$db_link->query($sql);
}
//ausgabe
	$kommausgabe=$db_link->query("SELECT kommentar FROM kommentar WHERE $bid=kommentar.bId");
	while ($kommausgabe2=$kommausgabe->fetch_array()) {
	  $kommausgabe2=$kommausgabe2['kommentar'];
	  echo $kommausgabe2."<br>";
	}
if (isset($_POST["like"])) {
	if($erg1 == 0)
    {
	$sql = "INSERT INTO bewertung (nID, bId) VALUES ('$nID','$bid')";
    $db_link->query($sql);
	}
}
?>
  <br>
  <a href="forum.php">Zurück zum Forum</a>
<?php
    include './footer.php';
?>
  </body>
</html>
