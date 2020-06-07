<?php

session_start();

if(isset($_SESSION['login_user_connect']) && isset($_REQUEST['name'])){
    
    $dts = explode("&",base64_decode($_SESSION['login_user_connect']));
    $id = $dts[0];
    $email = $dts[1];
    $name = $dts[2];
    
    require_once("../../../Database/dbconnect_connect.php");
    
    $theme_color = "blue";
    
    $qry = "SELECT theme FROM users WHERE u_id = $id";
    
    if($data = $conn->query($qry)){
        
        $result = $data->fetch_assoc();
        $theme_color = $result['theme'];
        
    }
    
    $q = "SELECT verified FROM users WHERE u_id = $id";
    
    if($d = $conn->query($q)){
        
        $rslt = $d->fetch_assoc();
        
        if($rslt['verified'] == '1'){
            
            define("TITLE", "Home | ToConnect");
            include("../Commen/header.php");
?>
<!-- Verified account area -->
<?php
            include("Parts/verifiedprofile.php");
        }
        else{
            define("TITLE", "Home | non verified ToConnect account");
            include("../Commen/headernvr.php");
?>
<!-- Notverified account area -->

<?php
            include("Parts/nonverifiedprofile.php");
        }
        
    }
    else{
        echo "Something went wrong, Please try again later"; 
    }
    
    
?>
<?php
    
    $conn->close();
}
else{
    header("Location:../logout"); 
}

?>
