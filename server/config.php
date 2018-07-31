<?php
/*-----------Server Config--------------------*/
$serverName = "localhost";
$userName = "root";
$password = "";
$nameDB = "new_db";
$siteURL = $_SERVER['HTTP_HOST'];
$db=mysqli_connect($serverName, $userName, $password, $nameDB);
