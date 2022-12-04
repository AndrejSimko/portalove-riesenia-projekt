<?php
    include_once "db_connect.php";

    if(isset($_POST['email'])) {
        $db = $GLOBALS['db'];
        $insert = $db->createAccount($_POST['email'], $_POST['password']);

        if($insert) {
            header("Location: login.php");
        } else {
            echo "FATAL ERROR!!!!!";
        }
    } else {
        header("Location: signup.php");
    }
  ?>