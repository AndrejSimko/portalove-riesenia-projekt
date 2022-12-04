<?php
    include_once "db_connect.php";
    if(isset($_POST['title'])) {
        $db = $GLOBALS['db'];
        $edit = $db->editListing($_POST['listing_id'], $_POST['title'], $_POST['price'], $_POST['details'], $_POST['detail1'], $_POST['detail2'], $_POST['category_id'], $_POST['image_id']);
        if($edit) {
            header("Location: my_listings.php");
        } else {
            echo "FATAL ERROR!!!!!";
        }
    } else {
        header("Location: my_listings.php");
    }
  ?>