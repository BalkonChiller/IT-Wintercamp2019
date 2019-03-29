<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Vorschlag kommentieren </title>
    <link rel="stylesheet" href="forum.css">
  </head>
  <body>


<div class="vorschlagallg" align="center">
<?php
session_start();
if ($_SESSION['angemeldet']==1)
	{
	  error_reporting(E_ALL);

	  // Zum Aufbau der Verbindung zur Datenbank
	  $benutzer='root';
	  $adminpasswort='';
	  $server='localhost';
	  $datenbankname='wintercamp';

	  $db_link = mysqli_connect($server,$benutzer,$adminpasswort,$datenbankname);
	  
		session_start();
		if(isset($_SESSION['nID'])) {
		$nID = $_SESSION['nID'];
		}
		
	  $bid=$_GET["id"];
	  $beitrag=$db_link->query("SELECT * FROM beitrag WHERE bId='$bid'");


	  while($beitrag2=$beitrag->fetch_array()){

		$ueberschrift=$beitrag2['beitragstitel'];
		$binhalt=$beitrag2['beitraginhalt'];
		$bkategorie=$beitrag2['kategorie'];
		$vorschlag="vorschlag";
		$zahl=2;


		echo "<div class=\"".$vorschlag."\"><table>";
		echo "<tr><th colspan=\"".$zahl."\"><h1>".$ueberschrift."</h1></th></tr>";
		echo "<tr><td><h3>Inhalt:</h3></td><td>".$binhalt."</td></tr>";
		echo "<tr><td colspan=\"".$zahl."\">Kategorie: ".$bkategorie."</td></tr>";
		echo "</table></div><br><hr>";
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


?>
  <br>
  <a href="forum.php">Zurück zum Forum</a>
  </body>
</html>
