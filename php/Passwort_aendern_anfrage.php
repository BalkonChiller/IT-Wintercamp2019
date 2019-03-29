<!DOCTYPE html>
<html >
<head>
  <meta charset="utf8" />
</head>
<body>


<form action="" method="post">
  Email <br/>
    <input type="email" name="emailf">
    <input type="submit" name="submit" >
</form>


<?php
if (isset($_POST["submit"])) {

        error_reporting(E_ALL);

        //Zum Aufbau der Verbindung zur Datenbank
        define ( 'MYSQL_HOST',      'localhost' );
        define ( 'MYSQL_BENUTZER',  'root' );
        define ( 'MYSQL_KENNWORT',  '' );
        define ( 'MYSQL_DATENBANK', 'wintercamp' );

        $db_link = mysqli_connect ('localhost' , 'root' , '' , 'wintercamp');
        mysqli_set_charset($db_link, 'utf8');


        $email=$_POST["emailf"];
        $hash= password_hash($email, PASSWORD_DEFAULT);
        $time_old = time();
        $krypt_time = '728346524x84365387645y'.$time_old.'y28946538767846';
        //echo $time_old;

        $db_link->query("UPDATE nutzer SET hash='$hash' WHERE email='$email' LIMIT 1");


        //E-Mail an User
        echo "Dir wurde nun ein E-Mail mit weiterführenden Link zugestellt. ";
        $betreff="Passwort vergessen";
        $nachricht="Klicke auf den Link zum Ändern des Passworts: http://localhost/ProjektIT/passwort_vergessen_jan/Passwort_aendern.php?hash=".$hash."&time=".$krypt_time;

        mail($_POST["emailf"], $betreff, $nachricht, "From: IT_Wintercamp <IT_Wintercamp@SAP.de>");
}
?>


</body>
</html>
