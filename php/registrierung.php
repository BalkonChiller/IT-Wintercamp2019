<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script language="javascript" type="text/javascript" src="../javascript/registrierung.js"></script>
  <link rel="stylesheet" href="../css/hpstyle.css" type = "text/css">
  <title>IT-Camp/Registrieren</title>
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
      <form class="box" action="registrierung_neu.html"  method="post">
  <h1>IT-Camp Registrierung</h1>




   <form action="../php/registrierung.php" method="post">



   <input type="text" name="fvorname" required placeholder="Vorname">






<input type="text" name="fnachname" required placeholder="Nachname">




<input type="text" name="fbenutzername" required placeholder="Benutzername">




<input type="password" name="fpasswort1" required placeholder="Passwort">


<input type="password" name="fpasswort2" required placeholder="Passwort bestätigen">



<input type="email" id='femail' name="femail" required placeholder="E-Mail-Adresse">

<br>
<label for="checkbox"> Habe Teilgenommen
<input type="checkbox" id='fteilnehmer' name="fteilnehmer" onclick="sichtbarkeit()">

</label>
<br>

<div id="teilnehmerjahr" >&nbsp
<select id='fcamp' name="fcamp" size="1"  >

<option value ="Wähl dein Camp aus" selected> Wähl dein Camp aus</option>
<option value="SummerCamp">SummerCamp </option>
<option value="WinterCamp">WinterCamp </option>
</select>
<br><br>
<label for="number"> &nbsp;&nbsp;Teilnehmerjahr
<input type = "number" id='fjahr' name="fjahr">
</label>

</div>
<br>




<br>

<label for="checkbox"> Datenschutzerklärung akzeptieren
<input type="checkbox" id='fdsgelesen' name="fdsgelesen" required>
</label>

<br>
<br>
<button type="button" class="btn btn-danger" onclick="registrieren()" >Registrieren</button>
</form>
</form>
 </div>
</div>
<br>
<?php

include '../php/footer.php';

?>

</body>
</html>
