<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/stylesheet1.css">
    </head>
    <body>
<?php
include '../php/header.php';
/*
$db_link = mysqli_connect('localhost', 'root', '', 'wintercamp');
$nID = $_SESSION['nID'];

$infos=$db_link->query("SELECT * FROM nutzer WHERE nId='$nID'");

while ($infos2=$infos->fetch_array()) {
$vname=$infos2["vorname"];
$nname=$infos2["nachname"];
$bname=$infos2["benutzername"];
$eMail=$infos2["eMail"];
*/
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
            <table>
                <tr>
                    <td><label for='vname'>Vorname:</label></td>
                    <td><div>$vname</div></td>
                </tr>
                <tr><td colspan='2'><hr></td></tr>
                <tr>
                    <td><label for='nname'>Nachname:</label></td>
                    <td><div>$nname</div></td>
                </tr>
                <tr><td colspan='2'><hr></td></tr>
                <tr>
                    <td><label for='bname'>Benutzername:</label></td>
                    <td><div>$bname</div></td>
                </tr>
                <tr><td colspan='2'><hr></td></tr>
                <tr>
                    <td><label for='email'>E-Mail:</label></td>
                    <td><div>$eMail</div></td>
                </tr>
                <tr><td colspan='2'><hr></td></tr>
                <tr>
                    <td><a href='./Passwort_aendern_anfrage.php'><button>Passwort ändern</a></button></td>
                </tr>
                <tr><td colspan='2'><br></td></tr>
                <tr>
                    <td><a href='./profilbearbeiten.php'><button>Profil bearbeiten</a></button></td>
                </tr>
            </table>
        </div>
        </div>
        <br>";

include '../php/footer.php';
?>
    </body>
</hmtl>
