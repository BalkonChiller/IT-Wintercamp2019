<?php
  include 'header.php';
  include 'forumcss.php';
?>
<section class="features18 popup-btn-cards cid-rfxcj1XdF0" id="features18-p">
<br><br><br><br><br><br>

<div class="vorschlagallg" align="center">
<?php

  $bid=$_GET["id"];
  $beitrag=$db_link->query("SELECT * FROM beitrag WHERE bId='$bid'");

  while($beitrag2=$beitrag->fetch_array()){

    $ueberschrift=$beitrag2['beitragstitel'];
    $binhalt=$beitrag2['beitragsinhalt'];
    $bild=$beitrag2['bild'];
    $vorschlag="vorschlag";

    echo "<div class='$vorschlag'>
            <table class='standart'>
                <tr class='standart2'>
                    <td class='standart2' rowspan='2' width='45%' height='300px'><img src='".$bild."' style='max-width:99%; max-height: 99%;'></td>
                    <th class='standart2'><h3>$ueberschrift</h3></th>
                </tr>
                <tr class='standart2'>
                    <td class='standart2'>$binhalt</td>
                </tr>
            </table>
          </div><br><hr>";
  }

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
          if ($id!="") {
            $kommentar=sqlxss($kommentar);
            if ($kommentar!="") {
              $db_link->query("INSERT INTO kommentar (kommentar, bId, n_id, zeit) VALUES ('$kommentar', '$bid', '$id', '$zeit')");//Hochladen des Kommentars
            }
          }else {
            echo "Sie müssen sich zuerst Anmelden<br>";
          }
    }
  }else {
    //eingabe
        if ($id!="") {
          $kommentar=sqlxss($kommentar);
          if ($kommentar!="") {
            $db_link->query("INSERT INTO kommentar (kommentar, bId, n_id, zeit) VALUES ('$kommentar', '$bid', '$id', '$zeit')");//Hochladen des Kommentars
          }
        }else {
          echo "Sie müssen sich zuerst Anmelden<br>";
        }
  }
}
        //ausgabe
                $kommausgabe=$db_link->query("SELECT kommentar, Benutzername FROM kommentar,nutzer WHERE bId=$bid AND nutzer.n_id=kommentar.n_id");
                while ($kommausgabe2=$kommausgabe->fetch_array()) {
                  $komm=$kommausgabe2['kommentar'];
                  $bname=$kommausgabe2['Benutzername'];

                  echo "<table class='kommentar'>
                          <tr class='kommentar2'>
                              <td class='kommentar2' width='40%' valign='top' align='right'>$bname: </td>
                              <th class='kommentar2' width='60%' align='left'>$komm</th>
                          </tr>
                        </table>";
                }

      echo "<br>
            <a href='fundsachenforum.php'>zurück zum Forum</a>
            </center>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </section>";
      include 'footer.php';
 ?>
