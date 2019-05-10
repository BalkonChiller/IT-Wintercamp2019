<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css"  href=> <!--stylesheet noch einfügen-->
    <title>Forum</title>
  </head>
<body>
<?php
      include './header.php';
?>
  <div class="oben" align="center">
      <h1>Forum</h1>
  </div>

      <form class="" action="Vorschlag_erstellen.php" align="right" method="post">
          <input type="submit" name="neubeitrag" value="Neuer Vorschlag">
      </form>
  <br>
  <div class="vorschlagallg" align="center">
<?php
if ($_SESSION['angemeldet']==1)
	{
		error_reporting(E_ALL);

		// Zum Aufbau der Verbindung zur Datenbank
		$benutzer='root';
		$adminpasswort='';
		$server='localhost';
		$datenbankname='wintercamp';

		$db_link = mysqli_connect($server,$benutzer,$adminpasswort,$datenbankname);
		mysqli_set_charset($db_link, 'utf8');

		$wertebeitrag=$db_link->query("SELECT * FROM beitrag");

		while($wertebeitrag2=$wertebeitrag->fetch_array()){

		  $ueberschrift=$wertebeitrag2['beitragstitel'];
		  $id=$wertebeitrag2["bId"];
		  $link="Vorschlag_kommentieren.php?id=".$id;
		  $vorschlag="vorschlag";


		  echo "<div class=\"".$vorschlag."\"><table>";
		  echo "<tr><th>".$ueberschrift."</th></tr>";
		  echo "<tr><td><a href=\"".$link."\">zum Vorschlag</a></td></tr>";
		  echo "</table></div><br><hr><br>";
		}
	}
	else {
		 header('location: login.php');
		 }
?>

    </div>
    <div class="unten">

    </div>
<?php
    include './footer.php';
?>
  </body>
</html>
