<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8">
<link rel="stylesheet" type="text/css"  href="../css/stylesheet1.css">
</head>
<body>
<?php

include '../php/header.php';

?><div class="row">
   <div class="col-3 col-s-3 menu">
   </div>

    <div class="aside">


  <form class="box" action="../php/logIn_funktion.php"  method="post">

<br>

    <h1>Login IT-Camp</h1> <br />

<input type="text" name="fbenutzername" placeholder="Benutzername" class="login">

<br>

<input type="password" name="fpasswort1" placeholder="Passwort" class="login">

<br>

<button type="submit">Login</button>

<br>

<a href="./registrierung.php">Registrieren</a>

<br>

<a href="./Passwortvergessen.php">Passwort vergessen</a>

</form>
  </div>
</div>
<br>
<?php

include '../php/footer.php';

?>
</body>
</html>
