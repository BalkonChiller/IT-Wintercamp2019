<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/stylesheet1.css">
    </head>
    <body>
<?php
include '../php/header.php';

$db_link = mysqli_connect('localhost', 'root', '', 'wintercamp');

$nID = $_SESSION['nID'];
$bname = $_SESSION['fbenutzername'];
$vname = $_SESSION['vorname'];
$nname = $_SESSION['nachname'];
$eMail = $_SESSION['eMail'];

echo "<br>
     <!--<div class='row aside'>                    AUSKOMMENTIERT-->
     <div class='col-3 col-s-3 menu'></div>
     <div style='margin-left:2%;'>
        <h1>Profil</h1>
        <br><br>
        <form method='post'>
            <table>
                <tr>
                <td><label for='vname'>Vorname:</label></td>
                    <td><input type='text' name='vname' value='".$vname."'></td>
                </tr>
                <tr><td colspan='2'><hr></td></tr>
                <tr>
                    <td><label for='nname'>Nachname:</label></td>
                    <td><input type='text' name='nname' value='".$nname."'></td>
                </tr>
                <tr><td colspan='2'><hr></td></tr>
                <tr>
                    <td><label for='bname'>Benutzername:</label></td>
                    <td><input type='text' name='bname' value='".$bname."'></td>
                </tr>
                <tr><td colspan='2'><hr></td></tr>
                <tr>
                    <td><label for='email'>E-Mail:</label></td>
                    <td><input type='email' name='email' value='".$eMail."'></td>
                </tr>


                <tr><td colspan='2'><br></td></tr>
                <tr>
                    <td><input type='submit' name='speichern' value='Änderungen speichern'></td>
                </tr>
            </table>
        </form>
      </div>
      </div>
      <br>";

if (isset($_POST["speichern"])) {
$vname=$_POST["vname"];
$nname=$_POST["nname"];
$bname=$_POST["bname"];
$eMail=$_POST["email"];
$db_link->query("UPDATE nutzer SET vorname='$vname', nachname='$nname', benutzername = '$bname', eMail='$email' WHERE nID='$nID'");

$_SESSION['fbenutzername'] = $bname;
$_SESSION['vorname'] = $vname;
$_SESSION['nachname'] = $nname;
$_SESSION['eMail'] = $eMail;

header('location: ./profil.php');
}
include '../php/footer.php';
?>
</body>
</hmtl>
