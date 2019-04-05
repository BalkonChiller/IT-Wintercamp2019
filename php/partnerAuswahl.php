<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html" charset="utf-8">
  <link rel="stylesheet" type="text/css"  href="../css/stylesheet1.css">
</head>

<body>
  <?php
    include './header.php';
  ?>

    <?php

      $con = mysqli_connect("localhost", "root", "", "wintercamp");
      $sql = 'SELECT benutzername from nutzer';

      $nutzer = $con -> query($sql);
      while($fetch = $nutzer->fetch_array()){
        $bname=$fetch["benutzername"];

        echo "<table class='chat'>
                  <tr>
                    <th>Nutzer</th>
                  </tr>
                  <tr>
                    <td>".$bname."</td>
                  </tr>
              </table>";

      }



    ?>


  <?php
    include './footer.php';
  ?>
</body>


</html>
