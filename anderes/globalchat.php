<!DOCTYPE html>
<link rel="stylesheet" type="text/css"  href="../css/chat.css">
<?php
if ($_SESSION['angemeldet'] == 0) {
     header('location: ../php/logIn.php');
 }
include '../php/header.php';
?>
<div id=ausgabe >
<h2>GlobalerChat</h2>
  <div id= chat>

<?php


  $db_link = mysqli_connect('localhost', 'root', '', 'wintercamp');
  $bid=$_SESSION["nID"];
 //ausgabe


 $kommausgabe=$db_link->query("SELECT kommentar, benutzername FROM globalchat,nutzer WHERE nutzer.nId=globalchat.nId ");
 while ($kommausgabe2=$kommausgabe->fetch_array()) {
   $komm=$kommausgabe2['kommentar'];
   $bname=$kommausgabe2['benutzername'];

   echo "
    <table class='kommentar'>
           <tr class='kommentar2'>
               <td class='kommentar2' valign='top' align='left'>$bname:  </td>
               <th class='kommentar2' align='left'>$komm</th>
           </tr>
           </table> ";
 }



?>
</div>

<div id=sendi >
      <form method="post">
          <input type="text" name="kommentar">
          <input type="submit" name="submit" value="Posten">
      </form>
</div>
<br>

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

 ?>
 </div>
 <body onload="setInterval('chat.update()', 1000)">
<?php
include 'footer.php';
?>
</body>
