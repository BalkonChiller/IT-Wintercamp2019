<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> Beitrag erstellen </title>
    <link rel="stylesheet" href="./.css">
  </head>
  <body>

        <h2>Beitrag erstellen</h2>

        <form class="" action="" method="post">

        <label for="ueberschrift">Überschrift:</label><br>
        <input type="text" name="ue" required>

        <br><br>

        <label for="beschreibung">Beschreibung:</label><br>
        <input type="text" name="be" required>

        <br><br>

        <label for="Beitraginhalt">Beitragsinhalt:</label><br>
        <textarea rows="10" cols="70" name="bi"></textarea>

        <br><br>

        <label for="Kategorie">Kategorie:</label><br>
        <input type="text" name="kt" required>

        <br><br>

        <input type="submit" name="submit" value="Vorschlag abschicken">

<?php
if (isset($_POST["submit"])) {
    error_reporting(E_ALL);

    // Zum Aufbau der Verbindung zur Datenbank
    $db_link = mysqli_connect ('localhost' , 'root' , '' , 'wintercamp');

    mysqli_set_charset($db_link, 'utf8');


    $btitel=$_POST["ue"];//Überschrift
    $bbeschreibung=$_POST["be"];//kurze Beschreibung
    $binhalt=$_POST["bi"];//Text zu Vorschlag
    $bkategorie=$_POST["kt"];//Kategorie

    $db_link->query("INSERT INTO beitrag ( beitragstitel, beschreibung, beitragsinhalt, kategorie) VALUES ( '$btitel', '$bbeschreibung','$binhalt', '$bkategorie')");//Hochladen des Beitrags



}
 ?>
  <br>
  <a href="https://trojato.de/forum.php">zurück zum Forum</a> <!--Link zum Forum-->
  </body>
</html>
