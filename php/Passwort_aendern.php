<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css"  href="../css/hpstyle.css">
    <title>Passwort ändern</title>
    <script language="javascript" type="text/javascript" src="./passwort_aendern.js"></script>
  </head>
  <body>

<?php
include '../php/header.php';
?>
<br>
<div class="row">
   <div class="col-3 col-s-3 menu">
   </div>
    <div class="aside">
	<h1>Passwort ändern</h1>
    <form action="" method="post">
        <input type="email" id="emailf" name="emailf" placeholder="E-Mail" class="login" required><br>
        <input type="password" id="pw1" name="pw1" placeholder="Neues Passwort" class="login"required><br>
        <input type="password" id="pw2" name="pw2" placeholder="Neues Passwort wiederholen" class="login"required><br>
        <input type="submit" name="submit" value="Bestätigen" onclick="passwort_aendern()">
    </form>
    </div>
</div>
<br>


<?php
if (isset($_POST["submit"])) {

      error_reporting(E_ALL);

      //Zum Aufbau der Verbindung zur Datenbank
      $benutzer='root';
      $adminpasswort='';
      $server='localhost';
      $datenbankname='wintercamp';

      $ok=mysqli_connect($server,$benutzer,$adminpasswort,$datenbankname);
      mysqli_set_charset($db_link, 'utf8');

      $email=$_POST["emailf"];  //E-Mail
      $npw=$_POST["pw1"];     //neues Passwort
      $hash=$_GET["hash"];    //hash url

      $time_krpyt=$_GET["time"];   //time url
      $time_krpyt_split = explode('y', $time_krpyt);
      $time_old = intval($time_krpyt_split[1]);

      $hashdb=$db_link->query("SELECT hash FROM nutzer WHERE eMail='$email'"); //hash Datenbank
      #$hashdb=$hashdb->fetch_array();
      $hashend = $hashdb['hash'];

      $diff = time()-$time_old;
      if (strlen($npw)>=6 && $diff<=600) {
              $npw = hash("sha512", $npw);
              if ($_POST["pw1"]==$_POST["pw2"]) {//Überprüfung ob beide Passwörter gleich

                  if ($hash==$hashend) {//ob hashes gleich sind
                      $update=$db_link->query("UPDATE nutzer SET passwort= '$npw' WHERE eMail='$email' LIMIT 1");//Datenbank neues Passwort zuweisen
                      //var_dump($update);
                  }else {
                    echo "fehler";
                  }
              }else {
                echo "Passwörter stimmen nicht überein!";
              }
    }else {
      echo "mindestens 6 Zeichen oder Hash ausgelaufen";
    }
  }

include '../php/footer.php';
?>
</body>
</html
