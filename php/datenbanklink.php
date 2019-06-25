<?php
  // Das sind nur die Daten, die hier gebraucht werden, um bei der Entwicklung zu funktionieren. Auf der Server werden andere Verbindungsdaten gebraucht, weshalb dieses Datei existiert
  //Damit man die DB-Verbindung auslagert und Veränderungen nicht bei allen Datein durchführen muss, sondern zentral arbeiten kann.
	$db_link = mysqli_connect('localhost', 'root', '', 'wintercamp');

?>
