<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
<body>
  <div class="Oben" align="center">
      <h1>Forum</h1>
  </div>

      <form class="" action="Vorschlag_erstellen.php" align="right" method="post">
          <input type="submit" name="neubeitrag" value="Neuer Vorschlag">
      </form>
  <br>
  <div class="mitte" align="center">
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
              $inhalt=$wertebeitrag2['beitragsinhalt'];
              $kategorie=$wertebeitrag2['kategorie'];

              echo "<div>";
              echo "<h3>".$ueberschrift."</h3>";
              echo $beschreibung;
              echo "</div>";


            }









?>

    </div>
    <div class="unten">

    </div>

  </body>
</html>
