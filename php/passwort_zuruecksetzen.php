<html>
    <head>
        <meta http-equiv="content-type" content="text/html" charset="utf-8">
        <script language="javascript" type="text/javascript" src="../javascript/passwort_aendern.js"></script>
        <link rel="stylesheet" type="text/css"  href="../css/stylesheet1.css">
        <title>Passwort zurücksetzen</title>
    </head>
    <body>
<?php
include '../php/header.php';
?>
        <br>
        <div class="row">
        <div class="col-3 col-s-3 menu"></div>
        <div class="aside">
<?php
include '../php/datenbanklink.php';

$nID = $_GET['id'];

$sql = "SELECT passwortcode FROM nutzer WHERE nID = '$nID'";
if ($result = $db_link->query($sql)) {
    while ($row = $result->fetch_row()) {
        $passwortcode = implode($row);
    }
}

$sql = "SELECT passwortcode_zeit FROM nutzer WHERE nID = '$nID'";
if ($result = $db_link->query($sql)) {
    while ($row = $result->fetch_row()) {
        $codetime = implode($row);
    }
}

if (isset($codetime) && isset($passwortcode)) {
    $code = $_GET['code'];
    $time = time();

    if ($time - $codetime > 7200) {
        echo "<h1>Dein Code ist leider veraltet!</h1>
              <a href='./passwort_vergessen_anfrage.php'>Neuen Code anfragen</a>";
    } elseif ($code != $passwortcode) {
        echo "<h1>Dein Code ist leider nicht korrekt!</h1>
              <a href='./passwort_vergessen_anfrage.php'>Neuen Code anfragen</a>";
    } else {
        echo "<h1>Neues Passwort wählen</h1>
              <form method='post' onsubmit='return passwort_aendern()'>
              <input type='password' name='fpasswort1' id='fpasswort1' required placeholder='Passwort' class='login'> <br>
              <input type='password' name='fpasswort2' id='fpasswort2' required placeholder='Passwort bestätigen' class='login'> <br>
              <button type='submit' name='submit'>Passwort ändern</button>
              </form>";
    }
}

if (isset($_POST['submit'])) {
  $passwort = $_POST['fpasswort1'];
  $pw = hash('sha512', $passwort);

  $db_link->query("UPDATE nutzer SET passwort = '$pw' WHERE nID = '$nID'");
  header('location: ./logIn.php');
}
?>
        </div>
        </div>
        <br>
<?php
include './footer.php';
?>
    </body>
</html>
