<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
<body>
  <div class="Oben">
      <h1>Forum</h1>
  </div>
  <div class="mitte">
      <form class="" action="Vorschlag_erstellen.php" method="post">
          <input type="submit" name="neubeitrag" value="Neuer Vorschlag">
      </form>
  <br>
<?php
            error_reporting(E_ALL);

            // Zum Aufbau der Verbindung zur Datenbank
            $db_link = mysqli_connect ('localhost' , 'root' , '' , 'wintercamp');

            mysqli_set_charset($db_link, 'utf8');

            $wertebeitrag=$db_link->query("SELECT beitragstitel, beschreibung FROM beitrag");
            //$target = 'zum Vorschlag';    // Die ist die bereits existierende Datei

                  while ($row = $wertebeitrag->fetch_assoc()) {
                              //ergebniss ausgeben
                      echo "<div>";
                      foreach ($row as $field) {
                          echo $field."<br>";
                      }
                      //link($target, $link);
                      echo "</div><br>";

                      //$link   = ' // Dies ist der Dateiname, auf den verlinkt

                  }

?>

    </div>
    <div class="unten">

    </div>

  </body>
</html>
