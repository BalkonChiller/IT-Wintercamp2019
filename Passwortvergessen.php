<?php
$betreff="Passwort ändern"
$nachricht="laber+ link";
mail($_POST["femail"], $betreff, $nachricht, "From: Absender <IT_Wintercamp@gurke.de>");

?>
