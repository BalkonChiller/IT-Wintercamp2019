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
  <div class="logo">
   </div>

  <h1>IT-Camp</h1>
  <h2>Login</h2>
  <div class="kontainer1">

   <form action="../php/logIndata.php" method="post">


  <div class="container1">

<br>

<br>
<p for="text"> Benutzername
<input type="text" name="fbenutzername" placeholder="Email" required>
</p>

<br>

<p for="Passwort"> Passwort
<input type="Passwort" name="fpasswort1" placeholder="Passwort" required>
</p>


<br>


<input type = "submit" name = "login" value="Log In" style="height: 50px; width: 800px;" id = "bold" >




<a href="./registrierung.html">Registrieren</a>

<br>

<a href="./passwortvergessen.html">Passwort vergessen</a>


</form>

</div>
  </div>
</div>
<br>
<?php

include '../php/footer.php';

?>
</body>
</html>
