<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <script language="javascript" type="text/javascript" src="../javascript/profil.js"></script>
        <link rel="stylesheet" href="../css/stylesheet1.css">
    </head>
    <body>
<?php
include './header.php';

include './datenbanklink.php';

if ($_SESSION['angemeldet'] == 0) {
  header('location: ./logIn.php');
}
$nID = $_SESSION['nID'];
$bname = $_SESSION['fbenutzername'];
$vname = $_SESSION['vorname'];
$nname = $_SESSION['nachname'];
$eMail = $_SESSION['eMail'];

echo "<br>
      <div class='row'>
      <div class='col-3 col-s-3 menu'></div>
      <div class='aside'>
      <h1>Profil bearbeiten</h1>
      <br>
      <form method='post' onsubmit='return profil()'>
        <table class='profil'>
            <tr>
              <td width='5%'></td>
              <td width='25%'><label for='vname'>Vorname:</label></td>
              <td><input type='text' name='vname' id='fvorname' value='".$vname."' required></td>
            </tr>
            <tr><td colspan='3'><hr noshade></td></tr>
            <tr>
              <td width='5%'></td>
              <td width='25%'><label for='nname'>Nachname:</label></td>
              <td><input type='text' name='nname' id='fnachname' value='".$nname."' required></td>
            </tr>
            <tr><td colspan='3'><hr noshade></td></tr>
            <tr>
              <td width='5%'></td>
              <td width='25%'><label for='bname'>Benutzername:</label></td>
              <td><input type='text' name='bname' id='fbenutzername' value='".$bname."' required></td>
            </tr>
            <tr><td colspan='3'><hr noshade></td></tr>
            <tr>
              <td width='5%'></td>
              <td width='25%'><label for='email'>E-Mail:</label></td>
              <td><input type='email' name='email' id='femail' value='".$eMail."' required></td>
            </tr>
            <tr><td colspan='3'><hr noshade></td></tr>
            <tr>
              <td width='5%'></td>
              <td><button name='submit'>Änderungen speichern</button></td>
            </tr>
        </table>
      </form>
      </div>
      </div>
      <br>";

if (isset($_POST["submit"])) {
  if ($_POST["vname"] && $_POST["nname"] && $_POST["bname"] && $_POST["email"] != "") {
    $vname = htmlspecialchars($_POST["vname"]);
    $nname = htmlspecialchars($_POST["nname"]);
    $bname = htmlspecialchars($_POST["bname"]);
    $eMail = htmlspecialchars($_POST["email"]);
    $db_link->query("UPDATE nutzer SET vorname='$vname', nachname='$nname', benutzername = '$bname', eMail='$eMail' WHERE nID='$nID'");

    $_SESSION['fbenutzername'] = $bname;
    $_SESSION['vorname'] = $vname;
    $_SESSION['nachname'] = $nname;
    $_SESSION['eMail'] = $eMail;
    header('location: ./profil.php');
  } else {
      echo '<script type="text/javascript" language="javascript">
            alert("Fehlende Eingabe")
            </script>';
    }
}

include './footer.php';
?>
    </body>
</hmtl>
