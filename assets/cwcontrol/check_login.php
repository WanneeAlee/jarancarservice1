<?php

@session_start();
include('inc/connect.php');

$strUsername = trim($_POST["Username"]);
$strPassword = trim($_POST["Password"]);
$md_pass = MD5("cwinth2017ch05@!");
$md_pass2 = MD5("cw774411");


	if(trim($strUsername) == "" || trim($strPassword) == "" )
	{
		echo "false";
		exit();
	}
	
	if($strUsername == "Administrator" && MD5($strPassword) == $md_pass || $strUsername == "admin" && MD5($strPassword) == $md_pass2)
	{
		if($_POST["remember_me"] == "on") { 
			setcookie("username_log",$strUsername,time()+3600*24*356);
			setcookie("password_log",$strPassword,time()+3600*24*356);
		}else{
			setcookie("username_log", "", time()-3600);
			setcookie("password_log", "", time()-3600);
		}
		echo "true";
		
		$_SESSION["user_username"] = $strUsername;
		
	

		session_write_close();
		

	}
	else
	{
		echo "false";
	}

	mysqli_close($con);
?>