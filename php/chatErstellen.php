<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html" charset="utf-8">
  <link rel="stylesheet" type="text/css"  href="../css/stylesheet1.css">
</head>

<body>

<form action="./partnerAuswahl.php">
  <?php
    include './header.php';
    $id = $_SESSION['nID'];
  ?>

  <?php

  $con = mysqli_connect("localhost", "root", "", "wintercamp");
  $sql = "SELECT * from chatreferebz"




  ##################################################################

   ?>

  <br>


  <input type="submit" name="erstellen" value="Chat Erstellen">

</form>
<br>
<?php
  include './footer.php';
?>
</body>


</html>
