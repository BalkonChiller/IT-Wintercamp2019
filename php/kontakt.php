<html>
	<?php 
		include '../php/header.php';
	?>
	<head>
          		<meta charset='utf-8' name="viewport" content="width=device-width, initial-scale=1.0">
          		<link rel="stylesheet" content="text/css" href="../css/hpstyle.css">

       	</head>

	<body>

<div class="row">
   <div class="col-3 col-s-3 menu"></div>

    <div class="aside">
  <h1>Kontaktformular</h1>
<h2>Wir freuen uns &uumlber Ihr Feedback</h2>


		
<form id="form"  method="post">
	
	
	<input id="name" name="name" size="25" type="text" placeholder="Name" />
	<br>
	<input id="email" name="email" size="25" type="text" placeholder="EMail"/>
	<br>
	<input id="betreff" name="betreff" size="25" type="text" placeholder="Betreff" />
	<br>
	<textarea id="nachricht" cols="50" rows="6" name="nachricht"placeholder="Nachricht"></textarea>
	<br>
	<input id="submit" name="submit" type="submit" value="Formular senden" class="btn btn-danger"/>
</form>

</div>

<?php
// Ausführen wenn Formular gesendet
if (isset($_POST["submit"]))
{

// Sammeln der Formulardaten
$an = "johannes.f.peters@gmx.de";
$name = $_POST['name'];
$email = $_POST['email'];
$betreff = $_POST['betreff'];
$nachricht = $_POST['nachricht'];

// Mailheader UTF-8 fähig machen
$mail_header = 'From:' . $email . "n";
$mail_header .= 'Content-type: text/plain; charset=UTF-8' . "rn";

// Nachrichtenlayout erstellen
$message = "
Name:       $name
Email:      $email
Nachricht:  $nachricht
";

// Verschicken der Mail
mail($an, $betreff, $message, $mail_header );
};

?>
	
</body>

	
<?php
 
		include '../php/footer.php';
	?>



</html>
