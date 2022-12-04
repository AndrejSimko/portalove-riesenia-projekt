<?php
    include_once "db_connect.php";
    if(isset($_POST['title'])) {
        $db = $GLOBALS['db'];
        $insert = $db->insertListing($_POST['title'], $_POST['price'], $_POST['details'], $_POST['detail1'], $_POST['detail2'],  $_SESSION['user_id'], $_POST['category_id'], $_POST['image_id']);
        if($insert) {
            header("Location: listing.php");
        } else {
            echo "FATAL ERROR!!!!!";
        }
    } else {
        header("Location: listing_add.php");
    }
  ?>