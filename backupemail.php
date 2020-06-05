<?php

session_start();
	
function test_input($data) 
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
	
if(isset($_REQUEST['data'])){

	$datas = base64_decode($_REQUEST['data']);
	$datas = explode("&", $datas);
	$email = $datas[1];
?>

<!DOCTYPE html>
<html>
	<head>
	    <title>ToConnect | Forget password</title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" async>
		<link rel="stylesheet" href="CSS/kel.css">
		<link href="https://fonts.googleapis.com/css2?family=Literata&display=swap" rel="stylesheet"> 
		
		<style>
		
		</style>
	</head>
	<body class="w3-content w3-blue" style="max-width:700px">

<!-- First Grid: Logo & About -->
	
	<div class="w3-padding">
	    <div class="w3-center w3-xxlarge w3-padding-32">ToConnect | forget password</div>
	    <form id="forget" class="w3-margin w3-light-gray w3-padding-32 w3-card-4">
	        <center>
            <div class="loader" id="loader" style="display:none"></div>
            <div class="w3-text-red" id="error"></div>
            </center>
	        <div class="w3-padding">
	            Enter new password here.
	        </div>
	        <div class="w3-section w3-padding">
	            <input type="password" class="w3-input w3-border" name="pass" id="pass" placeholder="new password">
	        </div>
	        <div class="w3-section w3-margin-left">
	            <button type="button" class="w3-button w3-green kel-hover-2" onclick="send('<?php echo $_REQUEST['data'] ?>')">Send</button>
	        </div>
	    </form>
	</div>
<script src="Js/check.js"></script>
<script src="Js/backupemail.js"></script>

	</body>
</html>
<?php
}
else{
     header("Location:../logout"); 
}
?>
