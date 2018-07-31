<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/server/config.php';

if(isset($_POST['common_submit'])){
    $text = trim(htmlspecialchars($_POST['common_text']));
    $id=$_SESSION['id'];

    $query5=mysqli_query($db, "INSERT INTO `commonmessages`(`userid`, `message`) 
                                                                  VALUES ('$id', '$text')");
    if($query5){
        header("Location:" . "/../index.php");
    }else{
        print "wrong send";
    }
}
?>