<?php
    include_once "db_connect.php";
    $db = $GLOBALS['db'];

    if(isset($_POST['email'])) {
        $login = $db->login($_POST['email'], $_POST['password']);

        if($login) {
            if($_SESSION['is_admin']) {
                header('Location: index.php');
            }else {
                header('Location: listing.php');
            }
        } else {
            header('Location: login.php');
        }
    } else {
        header('Location: login.php');
    }
  ?>