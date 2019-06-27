<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script language="javascript" type="text/javascript" src="slider3.js"></script>
		<link rel="stylesheet" type = "text/css" href="../css/stylesheet1.css">
		<link rel="stylesheet" type = "text/css" href="./slider3.css">
		<title>Galerie</title>
	</head>
	<body>
<?php
include '../php/header.php';
?>
	<br>
	<div class="row">
   	<div class="col-3 col-s-3 menu"></div>
	<div class="aside">
<?php
	//$benutzer='root';
	//$adminpasswort='';
	//$server='localhost';
	//$datenbankname='wintercamp';

  	include '../php/datenbanklink.php';
	$id = $_GET['campid'];

	$sqli="SELECT bilderlink,galeriebezeichnung FROM galeriebild,galerie where campId= ".$id." and galerie.gId = galeriebild.campId ";

    $r=mysqli_query($db_link, $sqli);

	$sTitel = "";
	while($erg3=mysqli_fetch_array($r, MYSQLI_NUM)) {
		$sTitel = $erg3['1'];
	}

?>
		<h2><?php echo $sTitel ?></h2>
	  		<div class="container">
			<div class="slider-wrapper">
			<div class="inner-wrapper">
				<ul class="slides">
<?php
	$r2=mysqli_query($db_link, $sqli);

	if (!empty($r2))
	{
		while($erg2=mysqli_fetch_array($r2, MYSQLI_NUM)) {
			echo "<li>";
			echo '<div class="slide"><img src="bilder/'.$erg2[0].'" ></div>';
			echo "</li>";
		}
	}
?>
				</ul>
			</div>
			</div>
			<div class="button prev"></div>
			<div class="button next"></div>
			</div>
	</div>
	</div>
	<br>
<?php
include '../php/footer.php';
?>
</body>
</html>
