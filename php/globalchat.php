<!DOCTYPE html>
<html>
	<head>
	  <meta charset='utf-8' name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="../css/stylesheet1.css">
    <link rel="stylesheet" type="text/css"  href="../css/chat.css">
	</head>
	<body>
<?php
include './header.php';
if ($_SESSION['angemeldet'] == 0) {
  header('location: ../php/logIn.php');
}
?>
    <br>
    <div class="row">
    <div class="col-3 col-s-3 menu"></div>
    <div class="aside">
      <h2>GlobalerChat</h2>
      <div id=chat>

<?php
  include '../php/datenbanklink.php';
  $bid=$_SESSION["nID"];

 //ausgabe
 $kommausgabe=$db_link->query("SELECT kommentar, benutzername FROM globalchat,nutzer WHERE nutzer.nId=globalchat.nId ");
 while ($kommausgabe2=$kommausgabe->fetch_array()) {
   $komm=$kommausgabe2['kommentar'];
   $bname=$kommausgabe2['benutzername'];

   echo "<table class='kommentar'>
         <tr class='kommentar2'>
           <td class='kommentar2' valign='top' align='left'>$bname:  </td>
           <th class='kommentar2' align='left'>$komm</th>
         </tr>
         </table>";
 }
?>
      </div>

<script type="text/javascript">
var myDiv = document.getElementById('chat');
myDiv.scrollTop = myDiv.scrollHeight;
</script>
    <div>
      <form method="post">
        <input type="text" name="kommentar">
        <input type="submit" name="submit" value="Posten">
      </form>
    </div>
		<br><br><br>
  </div>
  <br>
<?php
if (isset( $_POST['submit'] )) {
  $zeit = time();
  $kommentar=$_POST["kommentar"];

  if ($kommentar!="") {
    $db_link->query("INSERT INTO globalchat (nId,  kommentar, zeit) VALUES ('$bid', '$kommentar', '$zeit')");
  }
}
include './footer.php';
?>
  </body>
</html>
