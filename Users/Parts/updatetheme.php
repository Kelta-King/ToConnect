<?php

session_start();

if(isset($_SESSION['login_user_connect']) && isset($_REQUEST['Color'])){
    
    require_once("../../../../Database/dbconnect_connect.php");
    $dts = explode("&",base64_decode($_SESSION['login_user_connect']));
    $id = $dts[0];
    $name = $dts[2];
    $color = $_REQUEST['Color'];
    
    $query = "UPDATE users SET theme = '$color' WHERE u_id = $id";
    
    if($conn->query($query)){
        
    }
    else{
        die("something went wrong1");
    }
    
    
    $conn->close();
    
}
else if(isset($_SESSION['login_user_connect'])){
    echo "Login first";
}
else{
    header("Location:../logout");   
}

?>
