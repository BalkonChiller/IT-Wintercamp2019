<html lang="de">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<title>Galerieslider3</title>	
	<link rel="stylesheet" href="slider3.css">
	<link rel="stylesheet" href="slider3.js">
</head>
<body>
<div class="title">
	<h1>Wintercamp 2019 </h1>
</div>	
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
</body>
</html>