<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/stylesheet1.css">
</head>
<body>
<img src="../homepagebilder/images/logox.png" width="100%" height="auto">
<div class="menu">
<table>
    <tr>
      <th><a href="index.php">Home</a></th>
      <th>Forum</th>
      <th>Chat</th>
      <th><div class="dropdown">
		<button class="dropbtn"><b>Galerie</b>
			<i class="fa fa-caret-down"></i>
		</button>

    <div class="dropdown-content">
			<a href="#">Winter 2019</a>
			<a href="#">Sommer 2018</a>
			<a href="#">Winter 2018</a>
			<a href="#">Sommer 2017</a>
			<a href="#">Sommer 2016</a>
	</div>
		</div>
		</div></th>
	  <th>
	 <?php
	 if(isset($_SESSION)) {

		if($_SESSION['angemeldet'] != 1)
		{
			echo "<a href='../html/logIn.html'> Login </a>";
		}
		else {
			echo "Profil";
		}
	 }
	 else {
		 echo "<a href='../html/logIn.html'> Login </a>";
	 }
		#<a href="logIn.php"> Login </a>if($isLoggedIn == 1)		$fpasswort1 == $passwort
	  ?>
	  </th>
    </tr>
</table>
</div>
<br>
<div class="row">
   <div class="col-3 col-s-3 menu">
   </div>

    <div class="aside">
      <h2>Informationen</h2>
      <div class="oben" align="center">
          <h1>Forum</h1>
      </div>

          <form class="" action="Vorschlag_erstellen.php" align="right" method="post">
              <input type="submit" name="neubeitrag" value="Neuer Vorschlag">
          </form>
      <br>
      <div class="vorschlagallg" align="center">
    <?php
                error_reporting(E_ALL);

                // Zum Aufbau der Verbindung zur Datenbank
                $db_link = mysqli_connect ('localhost' , 'root' , '' , 'wintercamp');

                mysqli_set_charset($db_link, 'utf8');

                $wertebeitrag=$db_link->query("SELECT * FROM beitrag");
                //$target = 'zum Vorschlag';    // Die ist die bereits existierende Datei

                while($wertebeitrag2=$wertebeitrag->fetch_array()){

                  $ueberschrift=$wertebeitrag2['beitragstitel'];
                  $beschreibung=$wertebeitrag2['beschreibung'];
                  $id=$wertebeitrag2["bId"];
                  $link="../php/Vorschlag_kommentieren.php?id=".$id;
                  $vorschlag="vorschlag";


                  echo "<div class=\"".$vorschlag."\"><table>";
                  echo "<tr><th>".$ueberschrift."</th></tr>";
                  echo "<tr><td>".$beschreibung."</td></tr>";
                  echo "<tr><td><a href=\"".$link."\">zum Vorschlag</a></td></tr>";
                  echo "</table></div><br><hr><br>";


                }



    ?>

        </div>
        <div class="unten">

        </div>
    </div>
</div>
<br>
<div class="footer">
<h2 class="widget-title">powered by</h2>
<br>
<a href="https://www.communardo.de/"><img src="../homepagebilder/images/communardo.png" srcset="../homepagebilder/images/communardoi.png 320w, ../homepagebilder/images/communardom.png 600w, ../homepagebilder/images/communardo.png 900w" alt="Communardo"></a>
<a href="https://www.sap.com/germany/index.html"><img src="../homepagebilder/images/sap.png" srcset="../homepagebilder/images/sapi.png 320w, ../homepagebilder/images/sapm.png 600w, ../homepagebilder/images/sap.png 900w" alt="SAP"></a>
<a href="https://www.t-systems-mms.com/"><img src="../homepagebilder/images/tsystems.png" srcset="../homepagebilder/images/tsystemsi.png 320w,../homepagebilder/images/tsystemsm.png 600w, ../homepagebilder/images/tsystems.png 900w" alt="T-Systems"></a>
</div>
</body>
</html>
