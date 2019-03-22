<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/hpstyle.css">
</head>
<body>
<?php

include '../php/header.php';

?>
	  </th>
    </tr>
</table>
</div>
<br>
<div class="row">
   <div class="col-3 col-s-3 menu">
   </div>

    <div class="aside">
      <h2>Informationen</h2>
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
    </div>
</div>
<br>
<?php

include '../php/footer.php';

?>
</body>
</html>
