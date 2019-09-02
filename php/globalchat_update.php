<table>
<?php
include './datenbanklink.php';
$kommausgabe=$db_link->query("SELECT kommentar, benutzername, gcId FROM globalchat,nutzer WHERE nutzer.nId=globalchat.nId ");
if ($kommausgabe) {
    while ($kommausgabe2=$kommausgabe->fetch_array()) {
        $komm=$kommausgabe2['kommentar'];
        $bname=$kommausgabe2['benutzername'];
        $gcId=$kommausgabe2['gcId'];

        echo "<tr class='kommentar' id='$gcId'>
              <td class='kommentar2' valign='top' align='left'>$bname:</td>
              <td class='kommentar2' align='left'>$komm</td>
              </tr>
                <script type='text/javascript'>
					         var myDiv = document.getElementById('chat');
					         myDiv.scrollTop = myDiv.scrollHeight;
				        </script>";
    }
}
$_POST['upload'] = '';
?>
</table>
