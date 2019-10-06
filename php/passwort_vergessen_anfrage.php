<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html" charset="utf-8">
        <link rel="stylesheet" type="text/css"  href="../css/stylesheet1.css">
        <title>Passwort vergessen</title>
    </head>
    <body>
<?php
include '../php/header.php';
?>
        <br>
        <div class="row">
        <div class="col-3 col-s-3 menu"></div>
        <div class="aside">
          <form method="post"><br>
            <h1>Passwort vergessen</h1> <br>
              <input type="text" name="fbenutzername" placeholder="Benutzername" class="login">
              <br>
            <button type="submit" name="submit">Neues Passwort anfragen</button>
          </form>
        </div>
        </div>
        <br>
<?php
include '../php/datenbanklink.php';

if (isset($_POST["submit"])) {
    $fbenutzername = $_POST["fbenutzername"];

    $sql = "SELECT eMail FROM nutzer WHERE benutzername = '$fbenutzername'";
    if ($result = $db_link->query($sql)) {
        while ($row = $result->fetch_row()) {
            $email = implode($row);
        }
    }

    $sql2 = "SELECT vorname, nachname FROM nutzer WHERE benutzername = '$fbenutzername'";
    if ($result = $db_link->query($sql2)) {
        while ($row = $result->fetch_row()) {
            $name = implode(" ", $row);
        }
    }

    $sql2 = "SELECT nID FROM nutzer WHERE benutzername = '$fbenutzername'";
    if ($result = $db_link->query($sql2)) {
        while ($row = $result->fetch_row()) {
            $nID = implode($row);
        }
    }

    $bytes = random_bytes(16);
    $str = bin2hex($bytes);
    $zeit = time();

    #link noch anpassen
    $betreff = "Passwort vergessen";
    $nachricht = "Hallo $name,<br>
                  Sie haben angefordert, Ihr Passwort für die Website des <a href=http://winter2019.it-wintercamp-dd.de/>IT-Camps<a> zurückzusetzen, da Sie Ihr Passwort vergessen haben.<br>
                  Wenn Sie dies nicht angefordert haben, ignorieren Sie diese E-Mail bitte. Sie verfällt und wird innerhalb von 2 Stunden unbrauchbar.<br><br>
                  Um Ihr Passwort zurückzusetzen, besuchen Sie bitte die folgende Seite:<br>
                  http://winter2019.it-wintercamp-dd.de/php/passwort_zuruecksetzen.php?id=$nID&code=$str
                  <br><br>
                  Mit freundlichen Grüßen,<br>
                  Das IT-Wintercamp Team";
    $headers = "MIME-Version: 1.0\r\n";
    $headers.= "From: IT Wintercamp <noreply@IT-Camp-SAP.de>\r\n";
    $headers.= "Content-Type: text/html; charset=utf-8\r\n";
    mail($email, $betreff, $nachricht, $headers);

    $db_link->query("UPDATE nutzer SET passwortcode = '$str', passwortcode_zeit='$zeit' WHERE nID = '$nID'");
}

include '../php/footer.php';
?>
    </body>
</html>
