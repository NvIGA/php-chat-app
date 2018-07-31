
<?php
session_start();

require $_SERVER['DOCUMENT_ROOT'] . '/server/config.php';

if(isset($_SESSION['id'])){
    header("Location:" . "/modules/feed.php");
}else{
    header("Location:" . "/modules/auth.php");
}