<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='../css/stylesheet1.css'>
  </head>
  <body>
<?php
include '../php/header.php';
if ($_SESSION['angemeldet'] == 0) {
  header('location: ../php/logIn.php');
}
$bname = $_SESSION['fbenutzername'];
$vname = $_SESSION['vorname'];
$nname = $_SESSION['nachname'];
$eMail = $_SESSION['eMail'];

echo "<br>
      <div class='row'>
      <div class='col-3 col-s-3 menu'></div>
      <div class='aside'>
      <h1>Profil</h1>
      <br>
      <table class='profil'>
        <tr>
          <td width='5%'></td>
          <td width='25%'><label for='vname'>Vorname:</label></td>
          <td><div>$vname</div></td>
        </tr>
        <tr><td colspan='3'><hr noshade></td></tr>
        <tr>
          <td width='5%'></td>
          <td width='25%'><label for='nname'>Nachname:</label></td>
          <td><div>$nname</div></td>
        </tr>
        <tr><td colspan='3'><hr noshade></td></tr>
        <tr>
          <td width='5%'></td>
          <td width='25%'><label for='bname'>Benutzername:</label></td>
          <td><div>$bname</div></td>
        </tr>
        <tr><td colspan='3'><hr noshade></td></tr>
        <tr>
          <td width='5%'></td>
          <td width='25%'><label for='email'>E-Mail:</label></td>
          <td><div>$eMail</div></td>
        </tr>
        <tr><td colspan='3'><hr noshade></td></tr>
        <tr>
          <td width='5%'></td>
          <td colspan='2'>
            <button onclick=';window.location.href=&quot;./profilbearbeiten.php&quot;'>Profil bearbeiten</button>
            <button onclick=';window.location.href=&quot;./passwort_aendern.php&quot;'>Passwort ändern</button>
          </td>
        </tr>
      </table>
      </div>
      </div>
      <br>";
include '../php/footer.php';
?>
  </body>
</hmtl>
