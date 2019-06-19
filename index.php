<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="./css/stylesheet1.css">
	</head>
	<body>
		<?php
			$_SESSION['angemeldet'] = 0;
			include './php/header.php';
		?>
		<br>
		<div class="row">
	   		<div class="col-3 col-s-3 menu"></div>
			<div class="aside">
	      		<h2>Informationen</h2>
	      	<p>
							Du wolltest schon immer einmal in ein IT-Unternehmen schnuppern und dich ausprobieren? Im Sommer und im Winter hast du die Chance 3 Unternehmen in einer Woche kennenzulernen.
							<br>
							Nutze dazu eine Woche deiner Sommer- oder Winterferien und nimm Teil am IT-Camp in Dresden!
		  				<br>
		  				Im Team entwickelt Ihr eine eigene Software und durchlauft alle Positionen der Arbeitskette.
		  				<br>
		  				Schicke uns für das Sommercamp ab Mai und für das Wintercamp ab November deine Bewerbung via E-Mail an personal@communardo.de.
							<br>
							Für die genauen Infos kannst du unter den Internetseiten <a href="http://it-summercamp-dd.de/">http://it-summercamp-dd.de/</a> und <a href="http://it-wintercamp-dd.de/">http://it-wintercamp-dd.de/</a> mehr herausfinden.
							<br>
							Nutze die Möglichkeit deinen Traumberuf zu testen!
		  		</p>
	    		</div>
		</div>
		<br>

		<?php
			include './php/footer.php';
		?>
	</body>
</html>
