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

  error_reporting(E_ALL);

  // Zum Aufbau der Verbindung zur Datenbank
  $db_link = mysqli_connect ('localhost' , 'root' , '' , 'wintercamp');

  mysqli_set_charset($db_link, 'utf8');

  $bid=$_GET["id"];
  $beitrag=$db_link->query("SELECT * FROM beitrag WHERE bId='$bid'");


  while($beitrag2=$beitrag->fetch_array()){

    $ueberschrift=$beitrag2['beitragstitel'];
    $binhalt=$beitrag2['beitragsinhalt'];
    $bkategorie=$beitrag2['kategorie'];
    $vorschlag="vorschlag";
    $zahl=2;


    echo "<div class=\"".$vorschlag."\"><table>";
    echo "<tr><th colspan=\"".$zahl."\"><h1>".$ueberschrift."</h1></th></tr>";
    echo "<tr><td><h3>Inhalt:</h3></td><td>".$binhalt."</td></tr>";
    echo "<tr><td colspan=\"".$zahl."\">Kategorie: ".$bkategorie."</td></tr>";
    echo "</table></div><br><hr>";
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

        $db_link->query("INSERT INTO kommentar (kommentar, bId) VALUES ('$kommentar', '$bid')");//Hochladen des Kommentars

        //$kId=$db_link->query("SELECT * FROM `kommentar` ORDER BY `kommentar`.`kId`  DESC limit 1");//Verküpfung von vorsclag und kommentar

        //$kId=$kId->fetch_array();
        //$kId=$kId["kId"];
        //echo $kId;


    }

//ausgabe


        $kommausgabe=$db_link->query("SELECT kommentar FROM kommentar WHERE $bid=kommentar.bId ORDER BY kId");
        while ($kommausgabe2=$kommausgabe->fetch_array()) {
          $kommausgabe2=$kommausgabe2['kommentar'];
          echo $kommausgabe2."<br>";
        }


?>
  <br>
  <a href="../php/forum.php">zurück zum Forum</a>
  </body>
</html>
