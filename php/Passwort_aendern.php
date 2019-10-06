<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html" charset="utf-8">
        <script language="javascript" type="text/javascript" src="../javascript/passwort_aendern.js"></script>
        <link rel="stylesheet" type="text/css"  href="../css/stylesheet1.css">
        <title>Passwort ändern</title>
    </head>
    <body>
<?php
include '../php/header.php';
if ($_SESSION['angemeldet'] == 0) {
  header('location: ../php/logIn.php');
}
?>
        <br>
        <div class="row">
        <div class="col-3 col-s-3 menu"></div>
        <div class="aside">
          <form method="post" onsubmit="return passwort_aendern();"><br>
            <h1>Passwort ändern</h1> <br>
              <input type="password" name="fpwalt" required placeholder="Altes Passwort" class="login">
              <br>
              <br>
              <input type='password' name='fpasswort1' id='fpasswort1' required placeholder='Neues Passwort' class='login'>
              <br>
              <input type='password' name='fpasswort2' id='fpasswort2' required placeholder='Passwort bestätigen' class='login'>
              <br>
            <button type="submit" name="submit">Passwort ändern</button>
          </form>
        </div>
        </div>
        <br>
<?php
include '../php/datenbanklink.php';

if (isset($_POST['submit'])) {
  $nID = $_SESSION['nID'];
  $pwalt = $_POST["fpwalt"];
  $pwalthash = hash("sha512", $pwalt);

  $sql = "SELECT passwort FROM nutzer WHERE nID = '$nID'";
  $res = mysqli_query($db_link, $sql);
  while ($ausgabe = mysqli_fetch_assoc($res)) {
    $pwdb = $ausgabe["passwort"];
  }

  if ($pwalthash == $pwdb) {
    $pwneu = $_POST['fpasswort1'];
    $pw = hash('sha512', $pwneu);
    $db_link->query("UPDATE nutzer SET passwort = '$pw' WHERE nID = '$nID'");
    mysqli_close($db_link);
    session_destroy();
    header('location: ./logIn.php');
  } else echo "<script>alert('Falsches Passwort!');</script>";
}

include '../php/footer.php';
?>
    </body>
</html>
