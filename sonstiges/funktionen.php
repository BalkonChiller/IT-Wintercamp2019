<?php
    function startedb()
    {
        error_reporting(E_ALL);

            // Zum Aufbau der Verbindung zur Datenbank
            //$db_link = mysqli_connect ('localhost' , 'root' , '' , 'd02bbde5');
            $db_link = mysqli_connect ('localhost','d02bbde5','Senkel2002','d02bbde5');
            mysqli_set_charset($db_link, 'utf8');

            return $db_link;
    }

    function nutzerid()
    {

            if (empty($_SESSION["nutzer"])) {
                $id=$_SESSION["nutzer"]='';
            }else{
                $id=$_SESSION['nutzer'];
            }
            return $id;
    }


  function sqlxss($wert)
  {
    //Ändern bestimmter Zeichen in deren HTML-Form
    $wert=str_replace("<","&lt;",$wert);$wert=str_replace(">","&gt;",$wert);
    $wert=str_replace('"',"&quot;",$wert);$wert=str_replace("'","&apos;",$wert);
    $wert=str_replace('=',"&equals;",$wert);

    return ($wert);
  }

  function hochladenbild($bildname,$extension,$erw_typ,$bildgroesse,$tmp_name)
  {
    $folder = 'bilder/'; //Das Upload-Verzeichnis

    //Überprüfung der Dateiendung
    $erlaubt = array('png', 'jpg', 'jpeg', 'gif');
    if(!in_array($extension, $erlaubt)) {
     die("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
    }

    //Überprüfung der Dateigröße
    $max_size = 500*1024; //500 KB
    if($bildgroesse > $max_size) {
     die();
    }

    //Überprüfung dass das Bild keine Fehler enthält
    if(function_exists('exif_imagetype')) {
     $erlaubt_typ = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);

     if(!in_array($erw_typ, $erlaubt_typ)) {
     die("Nur der Upload von Bilddateien ist gestattet");
     }
    }

    //Pfad zum Upload
    $pfad = $folder.$bildname.'.'.$extension;

    //Neuer Dateiname falls die Datei bereits existiert
    if(file_exists($pfad)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
     $id = 1;
     do {
     $pfad = $folder.$bildname.'_'.$id.'.'.$extension;
     $id++;
    } while(file_exists($pfad));
    }

    //Alles okay, verschiebe Datei an neuen Pfad
    move_uploaded_file($tmp_name, $pfad);
    return ($pfad);
  }
?>
