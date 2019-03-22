<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<title>Galerieslider3</title>	
<link rel="stylesheet" href="slider3.css">
<link rel="stylesheet" href="slider3.js">
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
      <h2>Summercamp 2016</h2>
	  <div class="container">
		<div class="slider-wrapper">
			<div class="inner-wrapper">
				<ul class="slides">
					<?php
	$benutzer='root';
	$adminpasswort='';
	$server='localhost';
	$datenbankname='wintercamp';

  $ok=mysqli_connect($server, $benutzer, $adminpasswort, $datenbankname);

    /*if (!$ok)
    {
      echo "Fehler bei der Verbindung zu Datenbank";
    } 
    else 
	{
		echo "Verbindung zur Datenbank steht";
	}*/
	
	$sqli="SELECT bilderlink FROM galeriebild;";
    $r=mysqli_query($ok, $sqli);
    
	
	if (!empty($r))
	{
		while($erg2=mysqli_fetch_array($r, MYSQLI_NUM)) {
			echo "<li>";
			echo '<div class="slide"><img src="'.$erg2[0].'" ></div>';
			echo "</li>";
		}
	}
	#else {echo " kein Bild in der Datenbank vorhanden";}
					?>
				</ul>		
			</div>
		</div>
	
			<div class="button prev"></div>
			<div class="button next"></div>
		
	</div>
	
	<script src="jquery_lib.js"></script> 
	<script src="slider3.js"></script>
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
