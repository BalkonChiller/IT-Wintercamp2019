<?php
    include './datenbanklink.php';
    $zeit = time();
    $kommentar = htmlspecialchars($_POST["comment"]);
    $bId = $_POST['userId'];
    if ($kommentar) {
        $db_link->query("INSERT INTO globalchat (nId,  kommentar, zeit) VALUES ('$bId', '$kommentar', '$zeit')");
    }
?>
