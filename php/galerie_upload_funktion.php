<?php
		session_start();
		PRINT_r($_SESSION);

		$benutzername=$_SESSION['fbenutzername'];
		$angemeldet=$_SESSION['angemeldet'];
		$nID=$_SESSION['nID'];
		$vorname=$_SESSION['vorname'];
		$nachname=$_SESSION['nachname'];
		$eMail=$_SESSION['eMail'];




			//$benutzer='root';
			//$adminpasswort='';
			//$server='localhost';
			//$datenbankname='wintercamp_db';

			include '../php/datenbanklink.php';

			$rID="SELECT rId FROM nutzer WHERE $nID"
			if ($_SESSION['angemeldet']==1)
			{
				$uploadOk=0;
				header("Location: login.html");
			}
			if ($rID==2 OR $rID==3 AND $_SESSION['angemeldet']==1)
			{
			$target_dir = "../galeriebilder/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					echo "Datei ist ein Bild - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "Dabei ist kein Bild.";
					$uploadOk = 0;
				}
			}
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "Dein Bild existiert bereits.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
				echo "Dein Bild ist so groß.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				echo "Nur die gänige Bildtypen sind zugelassen: JPG, JPEG, PNG & GIF";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Deine Datei wurde nicht hochgeladen.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					echo "Dein Bild ". basename( $_FILES["fileToUpload"]["name"]). " wurde hochgeladen.";
				} else {
					echo "Dein Bilderupload wurde abgebrochen es gab eine Fehlermeldung.";
				}
			}

			$gId="SELECT teilnahme FROM nutzer WHERE $nID"
			$sqli="INSERT INTO galeriebild
				(nId, bilderlink, aktiviaet, gId)
				VALUES ($nId, $target_file, 0, $gId)";
			$send=mysqli_query($db_link, $sqli);
			}
			else echo"Sie sind nicht berechtigt Bilder hochzuladen!";
		?>
