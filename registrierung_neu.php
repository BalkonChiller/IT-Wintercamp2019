<?php
$error = false;
  if(empty ($_POST['fbenutzername']) and empty($_POST['fpasswort1']) and empty( $_POST['fpasswort2']) and empty($_POST['femail']))
  {
    echo "fehlende Eingabe!";
    $error = true;
  }

  if (!empty ($_POST['fdsgelesen']))
  {
    echo "Datenschutzbestimmung akzeptieren!";
    $error = true;
  }
  if ($_POST['fpasswort1'] != $_POST['fpasswort2'])
  {
    echo "Passwörter stimmen nicht überein!";
    $error = true;
  }

  $anz=strlen($_POST['fpasswort1']);
  if ($anz<6)
  {
    echo "Passwort mit mindestens 6 Zeichen verwenden!";
    $error = true;
  }

  $vorname = $_POST["fvorname"];
  $nachname = $_POST["fnachname"];
  if (!preg_match("/^[a-zA-Z ]*$/",$vorname and $nachname))
  {
    echo "Gib bitte deinen richtigen Namen ein!"
    $error = true;
  }

  $benutzer='';
  $adminpasswort='root';
  $server='localhost';
  $datenbankname='wintercamp';

  $ok=mysqli_connect($benutzer,$adminpasswort,$server,$datenbankname);

    if (!$ok)
    {
      echo "Fehler bei der Verbindung zu Datenbank";
    }
    else echo "Verbindung zur Datenbank steht";

    $sqli="SELECT Count($datenbankname) AS anz FROM $benutzer WHERE benutzername='$benutzername'";
    $r=mysqli_query($sqli);
    $erg1=mysqli_fetch_array($r);

    if($erg1 != 0)
    {
      echo "Benutzername ist bereits vergeben!";
      $error = true;
    }

    $sqli="SELECT Count($datenbankname) AS anz FROM $benutzer WHERE eMail='$email'";
    $r=mysqli_query($sqli);
    $erg2=mysqli_fetch_array($r);

    if($erg2 != 0)
    {
      echo "Email wurde bereits verwendet!";
      $error = true;
    }

        $vorname=$_POST['fvorname'];
        $nachname=$_POST['fnachname'];
        $benutzername=$_POST['fbenutzername'];
        $passwort1=$_POST['fpasswort1'];
        $passwort2=$_POST['fpasswort2'];
        $email=strtolower($_POST['femail']);
        $dsgelesen=$_POST['fdsgelesen'];
        $teilnehmer=$_POST['fteilnehmer'];
        $campe=$_POST['fcamp'];
        $jahr=$_POST['fjahr'];

        $camp=$campe . " " .$jahr;
        if ($teilnehmer)
          {
            $rID=2;
          }
          else $rID=3;
        $userpasswort=hash("sha512",$passwort1);

        if (!$error)
        {
        $sql="INSERT INTO 'wintercamp'.'nutzer'";
          ('nID','nachname','vorname','benutzername','eMail','passwort','rID','teilnahme');
          VALUES(NULL,'$nachname','$vorname','$benutzername','$email','$userpasswort','$rID','$camp');
          mysqli_query=($ok,$sqli);
        header("Location: frontend.php");
        }
?>
