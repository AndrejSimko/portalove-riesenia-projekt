<?php
    include_once "db_connect.php";
    if(isset($_POST['listing_id'])) {
        $db = $GLOBALS['db'];
        $delete = $db->deleteListing($_POST['listing_id']);
        if($delete) {
            header("Location: my_listings.php");
        } else {
            echo "FATAL ERROR!!!!!";
        }
    } else {
        header("Location: my_listings.php");
    }
  ?>