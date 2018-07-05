<?php
include("config.php");
//$mapAPI = "AIzaSyAHmOPA-pQYksFOFJy2qHZ8jOG83NmMMZI";
//*
$con = mysqli_connect('localhost', constant('MYSQL_USERNAME'), constant('MYSQL_PASSWORD'), constant('MYSQL_DBNAME'));
/*/
$con = mysqli_connect('localhost', 'root', 'root','oilitsme_db');
//*/

if (!$con) {
 die('Could not connect: ' . mysqli_error());
}
mysqli_query($con,"SET NAMES utf8");


?>