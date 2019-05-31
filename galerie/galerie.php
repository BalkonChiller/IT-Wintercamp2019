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
<?php

include '../php/header.php';

?>
<br>
<div class="row">
   <div class="col-3 col-s-3 menu">
   </div>
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
	$id = $_GET['campid'];

	$sqli="SELECT bilderlink,galeriebezeichnung FROM galeriebild,galerie where campId= ".$id." and galerie.gId = galeriebild.campId ";

    $r=mysqli_query($ok, $sqli);

	$sTitel = "";
	while($erg3=mysqli_fetch_array($r, MYSQLI_NUM)) {

		$sTitel = $erg3['1'];
	}


    ?>
    <div class="aside">
      <h2><?php echo $sTitel ?></h2>
	  <div class="container">
		<div class="slider-wrapper">
			<div class="inner-wrapper">
				<ul class="slides">
					<?php

	$r2=mysqli_query($ok, $sqli);

	if (!empty($r2))
	{
		while($erg2=mysqli_fetch_array($r2, MYSQLI_NUM)) {

			echo "<li>";
			echo '<div class="slide"><img src="bilder/'.$erg2[0].'" ></div>';
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
<?php

include '../php/footer.php';

?>
</body>
</html>
