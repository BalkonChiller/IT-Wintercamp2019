<!DOCTYPE html>
<html>
	<head>
		<title> Globaler Chat </title>
		<meta charset='utf-8' />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css"  href="../css/stylesheet1.css">
		<link rel="stylesheet" type="text/css"  href="../css/chat.css">
	</head>
	<body>
			<?php
				include './header.php';
				if ($_SESSION['angemeldet'] == 0) {
					header('location: ../php/logIn.php');
				}
				//$_POST = [];
			?>
		<br/>
		<div class="row">
			<div class="col-3 col-s-3 menu"></div>
				<div class="aside">
				<h2>Globaler Chat</h2>
					<div id="chat">
						<?php
							include '../php/datenbanklink.php';
							$bId=$_SESSION["nID"];

							//ausgabe
							$kommausgabe=$db_link->query("SELECT kommentar, benutzername, gcId FROM globalchat,nutzer WHERE nutzer.nId=globalchat.nId ");
							if ($kommausgabe == false) {
								echo "<script>alert('query failed. It could be the database aren`t connected to this script )</script>";
							}
							else {
								// echo "<ol style='list-style-type: none;'>";
								while ($kommausgabe2=$kommausgabe->fetch_array()) {
									$komm=$kommausgabe2['kommentar'];
									$bname=$kommausgabe2['benutzername'];
									$gcId=$kommausgabe2['gcId'];
									$next_gcId=$gcId+1;

									echo "
										<table class='kommentar' id='$gcId'>
											<tr class='kommentar2'>
												<td class='kommentar2' valign='top' align='left'>$bname:</td>
												<th class='kommentar2' align='left'>$komm</th>
											</tr>
										</table>";
									echo "
										<table class='kommentar'>
											<tr class='kommentar2'>
												<td class='kommentar2' valign='top' align='left'>$bId:</td>
												<td class='kommentar2' align='left'  id='$next_gcId'></td>
											</tr>
										</table>";


									// echo "
									// 	<li class='kommentar' id='$id'>
									// 		<div class='kommmentar2'>
									// 			<table>
									// 				<tr>
									// 					<td class='kommentar2' valign='top' align='left' style='width:35% !important;'>$bname:</td>
									// 					<td class='kommentar2' align='left'>$komm</td>
									// 				</tr>
									// 			</table>
									// 		</div>
									// 	</li>
									// ";
								}
								// echo "</ol>";
							}

						?>
					</div>

					<script type="text/javascript">
						var myDiv = document.getElementById('chat');
						myDiv.scrollTop = myDiv.scrollHeight;
					</script>
					<div>
						<form method="post">
							<input type="text" name="kommentar" id="kommentar">
							<button type="button" onclick="loadDoc()" name="submit" value="Posten">Posten</button>
						</form>
					</div>
				<br/><br/><br/>
			</div>
		</div>
		<br/>
		<!-- ajax part -->
		<script>
		function loadDoc() {
			var x = document.getElementById("kommentar").value;
			if (x != '') {
				document.getElementById("kommentar").value='';
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById(<?php echo $next_gcId; ?>).innerHTML = x;
						//this.responseText;
					}
				};
				xhttp.open("GET", "globalchat.php#chat", true);
				xhttp.send();
			}
		}
		</script>
		<?php
			if (isset( $_POST['submit'] )) {
				$zeit = time();
				$kommentar=$_POST["kommentar"];

				if ($kommentar!="") {
					$db_link->query("INSERT INTO globalchat (nId,  kommentar, zeit) VALUES ('$bid', '$kommentar', '$zeit')");
				}
			}
			$kommausgabe='';
			$kommentar='';
			include './footer.php';
		?>
		</body>
</html>
