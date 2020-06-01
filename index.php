<?php

session_start();
	
if(!isset($_SERVER['HTTPS'] ) )
{
    header("Location:https://keltagoodlife.co/Connect-Club");   
}
	
	$_SESSION['signup_login'] = "yes";
	
	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
?>
