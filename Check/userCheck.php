<?php

session_start();
if(isset($_SESSION['signup_login'])){
    
    $name = $_REQUEST['Name'];
    $email = $_REQUEST['Email'];
    $password = $_REQUEST['Pass'];
    $gender = $_REQUEST['Gender'];
    
    require_once("../../../Database/dbconnect_connect.php");
    
    $query = "SELECT u_name FROM users WHERE email = '$email'";
    
}
else{
    echo "Signup first";
}

?>
