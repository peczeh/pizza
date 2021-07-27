<?php

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "pizza";

$connection = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
mysqli_set_charset($connection,"utf8");



?>