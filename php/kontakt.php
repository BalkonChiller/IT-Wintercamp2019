<!DOCTYPE html>
<html>
	<head>
	  <meta charset='utf-8' name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="../css/stylesheet1.css">
	</head>
	<body>
<?php
include './header.php';
?>
	<br>
	<div class="row">
   	<div class="col-3 col-s-3 menu"></div>
    <div class="aside">
  	<h1>Kontaktformular</h1>
		<h2>Wir freuen uns über Ihr Feedback</h2>
		<form id="form"  method="post">
			<input id="name" name="name" size="25" type="text" placeholder="Name" />
			<br>
			<input id="email" name="email" size="25" type="text" placeholder="E-Mail"/>
			<br>
			<input id="betreff" name="betreff" size="25" type="text" placeholder="Betreff"/>
			<br>
			<textarea id="nachricht" cols="50" rows="6" name="nachricht" placeholder="Nachricht"></textarea>
			<br>
			<button id="submit" name="submit" type="submit" class="btn btn-danger">Formular senden</button>
		</form>
	</div>
	</div>

<?php
// Ausführen wenn Formular gesendet
if (isset($_POST["submit"]))
{
// Sammeln der Formulardaten
$an = "max.weickert03@gmail.com";
$name = $_POST['name'];
$email = $_POST['email'];
$betreff = $_POST['betreff'];
$nachricht = nl2br($_POST['nachricht']);

if (($name!="") && ($email!="") && ($betreff!="") && ($nachricht!="")) {
// Mailheader UTF-8 fähig machen
$headers = "MIME-Version: 1.0\r\n";
$headers.= "From: Kontakt IT Wintercamp <$email>\r\n";
$headers.= "Content-Type: text/html; charset=utf-8\r\n";
// Nachrichtenlayout erstellen
$message = "Nachricht: $nachricht <br>
						Von: $name";
// Verschicken der Mail
mail($an, $betreff, $message, $headers);
}
};

echo '<br>';
include '../php/footer.php';
?>
	</body>
</html>
