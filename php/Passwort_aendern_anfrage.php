<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf8" />
        <link rel="stylesheet" type="text/css"  href="../css/stylesheet1.css">
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
          <form method="post">
            <br/>
            <h1>Passwort vergessen</h1> <br/>
              <input type="email" name="emailf" placeholder="E-Mail" class="login">
                <br/>
              <button type="submit" name="submit">Ändern</button>
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
        mysqli_set_charset($ok, 'utf8');

        $email=$_POST["emailf"];
        $hash= password_hash($email, PASSWORD_DEFAULT);
        #$time_old = time();
        #$krypt_time = '728346524x84365387645y'.$time_old.'y28946538767846';
        //echo $time_old;

        $ok->query("UPDATE nutzer SET hash='$hash' WHERE email='$email' LIMIT 1");


        //E-Mail an User
        echo "Dir wurde nun eine E-Mail mit weiterführenden Link zugestellt. ";
        $betreff="Passwort vergessen";
        $nachricht="Klicke auf den Link zum Ändern des Passworts: http://localhost/php/Passwort_aendern.php?hash=".$hash;#."&time=".$krypt_time;

        mail($_POST["emailf"], $betreff, $nachricht, "From: IT_Wintercamp <IT_Wintercamp@SAP.de>");
}

include '../php/footer.php';
?>


</body>
</html>
