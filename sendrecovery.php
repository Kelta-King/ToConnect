<?php

session_start();

if(isset($_REQUEST['email'])){

    $email = $_REQUEST['email'];
    require_once("../../Database/dbconnect_connect.php");
    
    $query = "SELECT email FROM users WHERE email = '$email'";
    
    if($data = $conn->query($query)){
        
        if($data->num_rows <= 0){
            die("Please enter your registered email");
        }
        
    }
    else{
        die("Something went wrong");
    }

}
else{
    header("Location:../logout"); 
}

?>
