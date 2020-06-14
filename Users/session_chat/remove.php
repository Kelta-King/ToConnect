<?php
session_start();

if(isset($_SESSION['login_user_connect']) && isset($_SESSION['session_begin']) && isset($_REQUEST['s_id'])){
 
    $datas = base64_decode($_SESSION['session_begin']);
    $datas = explode("&",$datas);
    $doc = $datas[0];
    $s_id = $datas[1];
    //user id 
    $id = $datas[2];
    
    require_once("../../../../Database/dbconnect_connect.php");
    
    $query = "DELETE FROM sessions WHERE s_id = $s_id";
    
    if($conn->query($query)){
        unset($_SESSION['session_begin']);
    }
    else{
        echo "somehting went wrong";
    }
}
else{
    header("Location:../logout");
}

?>
