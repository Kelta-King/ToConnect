<?php

if(isset($_REQUEST['vkey'])){
    
    require_once("../../Database/dbconnect_connect.php");
    
    $vkey = $_REQUEST['vkey'];
    $query = "SELECT verified, u_name FROM users WHERE vkey = '$vkey'";
    $u_name = "";
    if($data = $conn->query($query)){
        
        if($data->num_rows <= 0){
            echo "<span style='color:red;'>Not verified. Please signup to verify</span>";
        }
        else if($data->num_rows == 1){
            
            $result = $data->fetch_assoc();
            $u_name = $result['u_name'];
            $qry = "UPDATE users SET verified = '1' WHERE vkey = '$vkey'";
            
            if($conn->query($qry)){
                
                echo "<span style='color:green;'>Your email address has been verified. Your usename is '$u_name'. You change it later after login.<a href='https://keltagoodlife.co/ToConnect/'>Click here to login</a></span>";
            }
            else{
                echo "<span style='color:red;'>Not verified. Please try again later</span>";
            }
            
        }
        else{
            echo "<span style='color:red;'>Not verified. Please signup to verify</span>";
        }
        
    }
    else{
        echo "<span style='color:red;'>Not verified. Please contact ToConnect</span>";
    }
    
    $conn->close();
    
}
else{
    header("Location:logout");
}

?>
