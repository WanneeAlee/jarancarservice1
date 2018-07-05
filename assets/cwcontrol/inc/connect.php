<?php

//$con = mysqli_connect('localhost', 'raiprach_db', 'n@(rBsBpHoO@','raiprach_db');

$con = mysqli_connect('localhost', 'root', '','chiangma_db');


if (!$con) {
 die('Could not connect: ' . mysqli_error());
}
mysqli_query($con,"SET NAMES utf8");


?>