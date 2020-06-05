<?php
function test_input($data) 
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if(isset($_REQUEST['data']) && isset($_REQUEST['pass'])){

	$datas = base64_decode($_REQUEST['data']);
	$datas = explode("&", $datas);
	$email = $datas[1];
	$pass = $_REQUEST['pass'];
	
	$opt = [
      'cost' => 12,  
    ];
            
    $pass = password_hash($pass, PASSWORD_BCRYPT, $opt);
    $query = "UPDATE users SET u_password = '$pass' WHERE email = '$email'";
	require_once("../../Database/dbconnect_connect.php");
    
	if($conn->query($query)){
	    
	}
	else{
	    echo "Something went wrong";
	}
	
	
?>

<?php
}
else{
     header("Location:../logout"); 
}

?>
