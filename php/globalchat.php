<?php
  include '../php/header.php';
  echo '<head>
          <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="../css/stylesheet1.css">
       </head>';

       if ($_SESSION['angemeldet'] == 0) {
       		header('location: ../php/logIn.php');
       	}

  include '../php/datenbanklink.php';
  $bid=$_SESSION["nID"];
?>
</div>

<div align='center'>
      <form method="post">
          <input type="text" name="kommentar">
          <input type="submit" name="submit" value="Posten">
      </form>
</div>
<br>
<center>
<?php
if (isset( $_POST['submit'] )) {
  $zeit = time();
  $dbkommzeit= $db_link->query("SELECT zeit,MAX(kId),kommentar FROM kommentar");
  $dbkommzeit2=$dbkommzeit->fetch_array();
  $dbzeit=$dbkommzeit2['zeit'];
  $dbkomm=$dbkommzeit2['kommentar'];
  $dauer=$zeit-$dbzeit;
  $kommentar=$_POST["kommentar"];
  if ($dbkomm==$kommentar) {
    if ($dauer<3) {
      echo "";
    }else {
      //eingabe
          if ($bid!="") {
            //$kommentar=sqlxss($kommentar);
            if ($kommentar!="") {
              $db_link->query("INSERT INTO globalchat (nId,  kommentar, zeit) VALUES ('$bid', '$kommentar', '$zeit')");//Hochladen des Kommentars
            }
          }else {
            echo "Sie müssen sich zuerst Anmelden<br>";
          }
    }
  }else {
    //eingabe
        if ($bid!="") {
          //$kommentar=sqlxss($kommentar);
          if ($kommentar!="") {
            $db_link->query("INSERT INTO globalchat (nId,  kommentar, zeit) VALUES ('$bid', '$kommentar', '$zeit')");//Hochladen des Kommentars
          }
        }else {
          echo "Sie müssen sich zuerst Anmelden<br>";
        }
  }
}
        //ausgabe
                $kommausgabe=$db_link->query("SELECT kommentar, benutzername FROM globalchat,nutzer WHERE nutzer.nId=globalchat.nId ");
                while ($kommausgabe2=$kommausgabe->fetch_array()) {
                  $komm=$kommausgabe2['kommentar'];
                  $bname=$kommausgabe2['benutzername'];

                  echo "<table class='kommentar'>
                          <tr class='kommentar2'>
                              <td class='kommentar2' width='40%' valign='top' align='right'>$bname: </td>
                              <th class='kommentar2' width='60%' align='left'>$komm</th>
                          </tr>
                        </table>";
                }

      echo "<br>
            <a href='../index.php'>zurück zur Startseite</a>
            </center>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </section>";
      include 'footer.php';
 ?>
