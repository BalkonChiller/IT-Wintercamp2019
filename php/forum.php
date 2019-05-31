<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css"  href="/css/stylesheet1.css">
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

    echo '<table>';
		while($wertebeitrag2=$wertebeitrag->fetch_array()){

		  $ueberschrift=$wertebeitrag2['beitragstitel'];
		  $id=$wertebeitrag2["bId"];
		  $link="Vorschlag_kommentieren.php?id=".$id;
		  //$vorschlag="vorschlag";


      // echo "<hr>";
		  // echo "<table><a href=\"".$link."\"><div class=\"vorschlag\">";
		  // echo "<tr><th>".$ueberschrift."</th></tr>";
		  // //echo "<tr><td></td></tr></table>";
      // echo "<br><br></div></a></table>";
      echo '<tr>
              <td>
                <hr/>
                <a href="'.$link.'">
                  <div align="center" text-align="center" class="vorschlag">'.$ueberschrift.'</div>
                </a>
              </td>
            </tr>';
		}
    echo '</table>';
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
