<?php
    include './datenbanklink.php';
    if (isset($_POST['check'])) {
        $sql_count = $db_link->query("SELECT * FROM globalchat")->num_rows;
        // return $sql_count;
        echo $sql_count;
    }
?>
