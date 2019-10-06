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
<br>
  <div class="aside">
      <h1>Forum</h1>
      <form class="" action="Beitrag_erstellen.php" align="left" method="post">
          <input type="submit" name="neubeitrag" value="Neuer Beitrag">
      </form>
  </div>
  <div class="beitragallg" align="center">
<?php
if ($_SESSION['angemeldet']==1)
	{
		error_reporting(E_ALL);

		include '../php/datenbanklink.php';
		mysqli_set_charset($db_link, 'utf8');
		$wertebeitrag=$db_link->query("SELECT * FROM beitrag");

    echo '<table id="t01">';
		while($wertebeitrag2=$wertebeitrag->fetch_array()){
		  $ueberschrift=$wertebeitrag2['beitragstitel'];
		  $id=$wertebeitrag2["bId"];
		  $link="Beitrag_kommentieren.php?id=".$id;
      echo '<tr>
              <td>
                <hr/>
                <a href="'.$link.'">
                  <div align="center" text-align="center" class="beitrag"><br>'.$ueberschrift.'</div>
                </a>
              </td>
            </tr>';
		}
    echo '</table>';
	}
	else {
		 header('location: ./logIn.php');
		 }
?>
    </div>
    <div class="unten"> </div>
<?php
      echo '<br>';
      include './footer.php';
?>
  </body>
</html>
