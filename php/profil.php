<?php
      include '../php/header.php';
      echo '<head>
    		      <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    		      <link rel="stylesheet" href="../css/stylesheet1.css">
	         </head>';

      $db_link = mysqli_connect('localhost', 'root', '', 'wintercamp');
      $nID = $_SESSION['nID'];


      if (isset($_POST["speichern"])) {
      echo 'Deine Profileinstellungen wurde aktualisiert.';
      $vname=$_POST["vname"];

      $nname=$_POST["nname"];

      $bname=$_POST["bname"];

      $email=$_POST["email"];

      $db_link->query("UPDATE nutzer SET vorname='$vname', nachname='$nname', benutzername = '$bname', eMail='$email' WHERE nID='$nID'");

    }
    $infos=$db_link->query("SELECT * FROM nutzer WHERE nId='$nID'");

    while ($infos2=$infos->fetch_array()) {
        $vname=$infos2["vorname"];
        $nname=$infos2["nachname"];
        $bname=$infos2["benutzername"];
        $email=$infos2["eMail"];


        echo "<div style='margin-left:2%;'>
                <h1>Profil</h2><br><br>
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
                            <td><input type='email' name='email' value='".$email."'></td>
                        </tr>
                        <tr><td colspan='2'><hr></td></tr>
                        <tr>
                            <td><a href='https://trojato.de/Passwort_aendern_anfrage.php'>Passwort ändern</a></td>
                        </tr>

                        <tr><td colspan='2'><br></td></tr>
                        <tr>
                            <td><input type='submit' name='speichern' value='Änderungen speichern'></td>
                        </tr>
                    </table>
                </form>
              </div>";
    }
?>

<br><br><br><br>
<br><br><br><br>


</section>
<?php include '../php/footer.php'; ?>
