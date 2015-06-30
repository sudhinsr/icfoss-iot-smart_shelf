<?php
 // DB name
$connection = mysqli_connect('localhost', 'root', 'raspberry') or die(mysqli_error()."Unable to connect");
$database = mysqli_select_db($connection ,'sudhin') or die( mysqli_error()."Unable to select database");
?>

