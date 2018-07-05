<?php

//$con = mysqli_connect('localhost', 'lilcatmak5_db', 'N2SBq6gz','lilcatmak5_db');
$con = mysqli_connect('localhost', 'stcthailand_db', '','');

//$con = mysqli_connect('localhost', 'root', 'root','lilcatmak5_db');


if (!$con) {
	die('Could not connect: ' . mysqli_error());
}
mysqli_query($con,"SET NAMES utf8");


?>