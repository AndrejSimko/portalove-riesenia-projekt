<?php
include_once "DB.php";

use projekt\DB;
$db = new DB('localhost', 'portalove-riesenia-projekt', 'root', '');

global $db;

session_start();
if($_SESSION) {
    $_SESSION['logged_in'];
    // $_SESSION['user_id'];
}