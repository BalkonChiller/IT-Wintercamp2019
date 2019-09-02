<?php
    $db = mysqli_connect('localhost', 'root', '', 'wintercamp');
    $zeit = time();
    $kommentar = $_POST["comment"];
    $bId = $_POST['userId'];
    if ($kommentar) {
        $db->query("INSERT INTO globalchat (nId,  kommentar, zeit) VALUES ('$bId', '$kommentar', '$zeit')");
    }
?>
