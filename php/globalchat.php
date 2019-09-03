<!DOCTYPE html>
<html>
	<head>
		<title> Globaler Chat </title>
		<meta charset='utf-8' name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css"  href="../css/stylesheet1.css">
		<link rel="stylesheet" type="text/css"  href="../css/chat.css">
		<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head>
	<body>
<?php
	include './header.php';
	include './datenbanklink.php';

	if ($_SESSION['angemeldet'] == 0) {
		header('location: ./logIn.php');
	}
	$bId=$_SESSION["nID"];
?>
		<script>
		var old_result = <?php echo $db_link->query("SELECT * FROM globalchat")->num_rows; ?>;
			var checkUpdate = function(freq=5000) {
				$.post('globalchat_check.php', {check: true}, function(result) {
					console.log(old_result);
					console.log(result);
					if(parseInt(old_result) !== parseInt(result)){
						updateChat();
						old_result = result;
    				}
				});
				setTimeout(checkUpdate, freq); // check again in a second
			}

			function upload() {
				var comm = $('#kommentar').val();
				$('#kommentar').val('');
				console.log(comm);
				$.post('globalchat_upload.php', {userId: <?php echo $_SESSION['nID'] ?>, comment: comm}, function (result) {
					console.log(result);
				});
				console.log('upload query');
			}

			function updateChat() {
				$(document).ready(function() {
					$('#chat').html('');
					$('#chat').load('globalchat_update.php');
				});
			}

			$(document).ready(function() {
				$("form").submit(function(event) {
					event.preventDefault();
					console.log('form submitted');
					upload();
					updateChat();
				});
				checkUpdate();
			});
		</script>
		<br/>
		<div class="row">
			<div class="col-3 col-s-3 menu"></div>
			<div class="aside">
				<h2>Globaler Chat</h2>
				<div id="chat">
					<script>updateChat();</script>
				</div>
				<div>
					<form method="post">
						<input type="text" name="kommentar" id="kommentar">
						<input type="submit" name="submit" id="submit">
						<!-- <button type="button" name="submit" id="submit">Post</button> -->
					</form>
				</div>
				<br/><br/><br/>
			</div>
		</div>
		<br/>
<?php include './footer.php'; ?>
	</body>
</html>
