<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="forum.css">
    <title>Forum</title>
  </head>
<body>
  <div class="oben" align="center">
      <h1>Forum</h1>
  </div>

      <form class="" action="Vorschlag_erstellen.php" align="right" method="post">
          <input type="submit" name="neubeitrag" value="Neuer Vorschlag">
      </form>
  <br>
  <div class="vorschlagallg" align="center">
<?php
            error_reporting(E_ALL);

            // Zum Aufbau der Verbindung zur Datenbank
            $db_link = mysqli_connect ('localhost' , 'root' , '' , 'wintercamp');

            mysqli_set_charset($db_link, 'utf8');

            $wertebeitrag=$db_link->query("SELECT * FROM beitrag");
            //$target = 'zum Vorschlag';    // Die ist die bereits existierende Datei

            while($wertebeitrag2=$wertebeitrag->fetch_array()){

              $ueberschrift=$wertebeitrag2['beitragstitel'];
              $beschreibung=$wertebeitrag2['beschreibung'];
              $id=$wertebeitrag2["bId"];
              $link="../php/Vorschlag_kommentieren.php?id=".$id;
              $vorschlag="vorschlag";


              echo "<div class=\"".$vorschlag."\"><table>";
              echo "<tr><th>".$ueberschrift."</th></tr>";
              echo "<tr><td>".$beschreibung."</td></tr>";
              echo "<tr><td><a href=\"".$link."\">zum Vorschlag</a></td></tr>";
              echo "</table></div><br><hr><br>";


            }



?>

    </div>
    <div class="unten">

    </div>

  </body>
</html>
