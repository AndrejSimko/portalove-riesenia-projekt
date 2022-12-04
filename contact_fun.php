<?php
    include_once "db_connect.php";
    if(isset($_POST['name'])) {
        $db = $GLOBALS['db'];
        $insert = $db->insertMessage($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['message']);
        if($insert) {
            header("Location: contact.php");
        } else {
            echo "FATAL ERROR!!!!!";
        }
    } else {
        header("Location: contact.php");
    }
  ?>